<?php
require_once("../module/connection/conn.php");

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendErrorResponse('Invalid request method', 405);
    exit;
}

// Set the Content-Type header to application/json
header('Content-Type: application/json');

// Read raw input data
$inputData = json_decode(file_get_contents("php://input"), true);

// Extract input data
$ID_BARANG = $inputData["id"] ?? null;
$PARAM = $inputData["param"] ?? null;
$ID_PERSEDIAAN = $inputData["url"] ?? null;
$TANGGAL = $inputData["tanggal"] ?? null;

// Validate if necessary data is provided
if (empty($ID_BARANG)) {
    sendErrorResponse('Missing or invalid ID_BARANG', 400);
    exit;
}

// Fetch Barang
try {
    $BARANG = fetchBarang($ID_BARANG);
} catch (Exception $e) {
    sendErrorResponse('Internal server error: ' . $e->getMessage(), 500);
    exit;
}

// Send success response
sendSuccessResponse(['Barang' => $BARANG]);

/**
 * Fetch Barang details based on category
 */
function fetchBarang($ID_BARANG) {
    global $PARAM, $ID_PERSEDIAAN, $TANGGAL;
    if ($PARAM == 'pemasukan') {
        $GetDetails = GetQuery2("SELECT *,CONCAT(RIGHT(YEAR(:TANGGAL), 2),CHAR(MONTH(:TANGGAL) + 64), SUBSTRING_INDEX(SUBSTRING_INDEX(ID_BARANG, '-', -1), '.', 1),LPAD(RIGHT(ID_BARANG, 3), 3, '0')  ) AS NO_BATCH FROM m_barang WHERE ID_BARANG = :ID_BARANG", [':ID_BARANG' => $ID_BARANG, ':TANGGAL' => $TANGGAL]);
    } else {
        if (empty($ID_PERSEDIAAN)) {
            
            $GetDetails = GetQuery2("SELECT NO_BATCH, b.SATUAN, SUM(QTY) AS TOTAL_QTY, EXPIRATION
            FROM t_persediaan p
            LEFT JOIN m_barang b on p.ID_BARANG = b.ID_BARANG
            WHERE p.STATUS = 1 
            AND p.ID_BARANG = :ID_BARANG
            GROUP BY NO_BATCH
            HAVING SUM(QTY) > 0
            ORDER BY NO_BATCH", [':ID_BARANG' => $ID_BARANG]);
        } else {
            $GetDetails = GetQuery2("SELECT NO_BATCH, b.SATUAN, SUM(QTY) AS TOTAL_QTY, EXPIRATION
            FROM t_persediaan p
            LEFT JOIN m_barang b on p.ID_BARANG = b.ID_BARANG
            WHERE p.STATUS = 1 
            AND p.ID_BARANG = :ID_BARANG
            AND ID_PERSEDIAAN IN (
                SELECT ID_PERSEDIAAN
                FROM t_persediaan
                WHERE COALESCE(ID_PERSEDIAAN, '') = '' OR ID_PERSEDIAAN < :ID_PERSEDIAAN
            )
            GROUP BY NO_BATCH
            HAVING SUM(QTY) > 0
            ORDER BY NO_BATCH", [':ID_BARANG' => $ID_BARANG, ':ID_PERSEDIAAN' => $ID_PERSEDIAAN]);
        }
    }
    if (!$GetDetails) {
        throw new Exception('Query execution failed');
    }

    if ($PARAM == 'pemasukan') {
        $details = [];
        while ($row = $GetDetails->fetch(PDO::FETCH_ASSOC)) {
            $ID_KATEGORI = $row['ID_KATEGORI'];
            $BATCH = createBatch('t_pemasukan', 'ID_PEMASUKAN', 3, $ID_KATEGORI, $TANGGAL);

            $details[] = [
                'SATUAN' => $row['SATUAN'],
                'NO_BATCH' => $BATCH,
            ];
        }
    } else {
        $details = [];
        while ($row = $GetDetails->fetch(PDO::FETCH_ASSOC)) {
            $details[] = [
                'SATUAN' => $row['SATUAN'],
                'NO_BATCH' => $row['NO_BATCH'],
                'TOTAL_QTY' => $row['TOTAL_QTY'],
                'EXPIRATION' => $row['EXPIRATION']
            ];
        }
    }
    
    $GetDetails->closeCursor();
    return $details;
}

/**
 * Send success response with data
 */
function sendSuccessResponse($data) {
    http_response_code(200);
    echo json_encode([
        'result' => [
            'message' => 'OK',
            'id' => bin2hex(random_bytes(16))
        ],
        'data' => $data
    ]);
}

/**
 * Send error response with message and status code
 */
function sendErrorResponse($message, $code) {
    http_response_code($code);
    echo json_encode([
        'result' => [
            'message' => $message,
            'id' => bin2hex(random_bytes(16))
        ],
        'data' => null
    ]);
}
?>
