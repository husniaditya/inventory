-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               11.3.2-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for inventory
CREATE DATABASE IF NOT EXISTS `inventory` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `inventory`;

-- Dumping structure for table inventory.m_barang
DROP TABLE IF EXISTS `m_barang`;
CREATE TABLE IF NOT EXISTS `m_barang` (
  `ID_BARANG` varchar(50) NOT NULL,
  `ID_KATEGORI` varchar(50) DEFAULT NULL,
  `NAMA_BARANG` varchar(100) DEFAULT NULL,
  `DESKRIPSI` varchar(150) DEFAULT NULL,
  `SATUAN` varchar(50) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT '1',
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `CREATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_BARANG`),
  KEY `ID_KATEGORI` (`ID_KATEGORI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventory.m_barang: ~52 rows (approximately)
REPLACE INTO `m_barang` (`ID_BARANG`, `ID_KATEGORI`, `NAMA_BARANG`, `DESKRIPSI`, `SATUAN`, `STATUS`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`) VALUES
	('BRG-202411-01.054', 'KAT-202411-001', 'SICKLE,HARVESTING,20 MM,1.5",700 MM,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:36:16', NULL, NULL),
	('BRG-202411-01.056', 'KAT-202411-001', 'CHISEL,HARVESTING,3",320XL.80MM,IRON', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:36:43', NULL, NULL),
	('BRG-202411-02.001', 'KAT-202411-002', 'INORGANIC MIXTURE,KIESERBOR 23-5,KG', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:18:59', NULL, NULL),
	('BRG-202411-02.002', 'KAT-202411-002', 'INORGANIC MIXTURE,NK2,KG (NK 8.4/36-40% SOA, 60% MOP)', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:19:18', NULL, NULL),
	('BRG-202411-02.003', 'KAT-202411-002', 'INORGANIC STRAIGHT,UREA,KG', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:19:30', NULL, NULL),
	('BRG-202411-02.004', 'KAT-202411-002', 'INORGANIC STRAIGHT,BORATE,KG', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:19:43', NULL, NULL),
	('BRG-202411-02.005', 'KAT-202411-002', 'INORGANIC STRAIGHT,MOP,KG', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:19:54', NULL, NULL),
	('BRG-202411-02.006', 'KAT-202411-002', 'INORGANIC STRAIGHT,ROCK PHOSPHATE,KG', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:20:06', NULL, NULL),
	('BRG-202411-02.007', 'KAT-202411-002', 'INORGANIC STRAIGHT,KIESERITE,KG', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:20:22', NULL, NULL),
	('BRG-202411-02.008', 'KAT-202411-002', 'INORGANIC COMPOUND,NPK,KG (10/6/24/5+0.96B)', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:20:33', NULL, NULL),
	('BRG-202411-02.009', 'KAT-202411-002', 'INORGANIC COMPOUND,NPK,KG (12/12/17/2+TE)', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:20:44', NULL, NULL),
	('BRG-202411-02.016', 'KAT-202411-002', 'INORGANIC STRAIGHT,DOLOMITE,KG', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:25:53', NULL, NULL),
	('BRG-202411-02.021', 'KAT-202411-002', 'HERBICIDE,IPA GLIFOSAT 480 G/L,L', '', 'Liter', '1', 'husniaditya', '2024-11-27 14:28:02', 'husniaditya', '2024-11-27 14:28:41'),
	('BRG-202411-02.037', 'KAT-202411-002', 'INORGANIC STRAIGHT,FERROUS SULFATE,KG', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:32:24', NULL, NULL),
	('BRG-202411-02.040', 'KAT-202411-002', 'LIBERO', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:33:01', NULL, NULL),
	('BRG-202411-02.041', 'KAT-202411-002', 'ORGANIC STRAIGHT,ENDOMIKORIZA ARBUSCULAR', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:33:13', NULL, NULL),
	('BRG-202411-02.042', 'KAT-202411-002', 'FUNGICIDE, TRICHODERMA KONINGII, KG', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:33:32', NULL, NULL),
	('BRG-202411-02.043', 'KAT-202411-002', 'BIOMASS SLUDGE,ANAEROBIC', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:33:45', NULL, NULL),
	('BRG-202411-02.044', 'KAT-202411-002', 'SUPER KIESERITE INORGANIC STRAIGHT', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:33:55', NULL, NULL),
	('BRG-202411-02.045', 'KAT-202411-002', 'INORGANIC STRAIGHT,DOLOMITE,KG', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:34:07', NULL, NULL),
	('BRG-202411-02.046', 'KAT-202411-002', 'INORGANIC STRAIGHT, CALCIPRILL', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:34:16', NULL, NULL),
	('BRG-202411-02.047', 'KAT-202411-002', 'INORGANIC STRAIGHT,BORAT', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:34:28', NULL, NULL),
	('BRG-202411-02.048', 'KAT-202411-002', 'STARSIL', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:34:53', NULL, NULL),
	('BRG-202411-02.049', 'KAT-202411-002', 'SUPER BAJA', '', 'Kg', '1', 'husniaditya', '2024-11-27 14:35:02', NULL, NULL),
	('BRG-202411-02.050', 'KAT-202411-002', 'LIQUID, TRADE NAME:KENFOLAN, COMPOSITION:N11%,P8%, K6%', '', 'Liter', '1', 'husniaditya', '2024-11-27 14:35:17', NULL, NULL),
	('BRG-202411-02.055', 'KAT-202411-002', 'SPRAYER,AGRICULTURAL,KNAPSACK,POLYPROPYL', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:36:30', NULL, NULL),
	('BRG-202411-03.010', 'KAT-202411-003', 'HAND GLOVE,COTTON,PAA', '', 'Pasang', '1', 'husniaditya', '2024-11-27 14:21:07', NULL, NULL),
	('BRG-202411-03.011', 'KAT-202411-003', 'HAND GLOVE,COTTON SEMI COATED RUBBER,PAA', '', 'Pasang', '1', 'husniaditya', '2024-11-27 14:21:18', NULL, NULL),
	('BRG-202411-03.017', 'KAT-202411-003', 'PROTECTION CLOTH,APRON,PVC,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:26:18', NULL, NULL),
	('BRG-202411-03.027', 'KAT-202411-003', 'SUSPENSION,SAFETY HAT,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:29:55', NULL, NULL),
	('BRG-202411-03.028', 'KAT-202411-003', 'SAFETY VEST,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:30:05', NULL, NULL),
	('BRG-202411-03.032', 'KAT-202411-003', 'HAND GLOVE,LEATHER,PAA', '', 'Pasang', '1', 'husniaditya', '2024-11-27 14:31:02', 'husniaditya', '2024-11-27 14:31:26'),
	('BRG-202411-03.033', 'KAT-202411-003', 'SAFETY GOGGLE,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:31:15', NULL, NULL),
	('BRG-202411-03.034', 'KAT-202411-003', 'SAFETY BOOT,PVC,PAA', '', 'Pasang', '1', 'husniaditya', '2024-11-27 14:31:44', NULL, NULL),
	('BRG-202411-03.035', 'KAT-202411-003', 'MASK,SINGLE CARTRIDGE HALF MASK,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:32:01', NULL, NULL),
	('BRG-202411-03.036', 'KAT-202411-003', 'SAFETY SHOE,LEATHER,PAA', '', 'Pasang', '1', 'husniaditya', '2024-11-27 14:32:13', NULL, NULL),
	('BRG-202411-03.038', 'KAT-202411-003', 'SAFETYGOGGLE,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:32:37', NULL, NULL),
	('BRG-202411-03.051', 'KAT-202411-003', 'HAND GLOVE,NITRILE,BOX', '', 'Box', '1', 'husniaditya', '2024-11-27 14:35:38', NULL, NULL),
	('BRG-202411-04.012', 'KAT-202411-004', 'HYDRAULIC,HOOKLIFT,6-8T,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:23:08', NULL, NULL),
	('BRG-202411-04.013', 'KAT-202411-004', 'SPIKE,LOADING,25 MM,102 CM,CAST IRON,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:23:36', NULL, NULL),
	('BRG-202411-04.015', 'KAT-202411-004', 'PIPE,LINE,1",CLASSA,GALVANIZEDSTEEL,ME', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:25:34', NULL, NULL),
	('BRG-202411-04.018', 'KAT-202411-004', 'COVER,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:26:42', NULL, NULL),
	('BRG-202411-04.019', 'KAT-202411-004', 'COVER,COVER,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:26:54', NULL, NULL),
	('BRG-202411-04.020', 'KAT-202411-004', 'BOWL,MILAMINE,520 ML,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:27:30', NULL, NULL),
	('BRG-202411-04.022', 'KAT-202411-004', 'BEARING,BALL,12MM,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:28:20', NULL, NULL),
	('BRG-202411-04.023', 'KAT-202411-004', 'POLE,ALUMINIUM 1.25" X 4M', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:28:58', NULL, NULL),
	('BRG-202411-04.024', 'KAT-202411-004', 'PROCESSED MILK,SWEETENED CONDENSED MILK', '', 'Kaleng', '1', 'husniaditya', '2024-11-27 14:29:13', NULL, NULL),
	('BRG-202411-04.025', 'KAT-202411-004', 'CULVERT, TYPE:PIPE, SIZE:300 X 1000 MM,', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:29:26', NULL, NULL),
	('BRG-202411-04.026', 'KAT-202411-004', 'BUCKET,BUCKET,PLASTIC,15L,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:29:41', NULL, NULL),
	('BRG-202411-04.029', 'KAT-202411-004', 'STONE,SHARPENING,3000/8000,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:30:26', NULL, NULL),
	('BRG-202411-04.030', 'KAT-202411-004', 'APRON,PLASTIC,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:30:37', NULL, NULL),
	('BRG-202411-04.031', 'KAT-202411-004', 'BEARING,BALL,10MM,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:30:51', NULL, NULL),
	('BRG-202411-04.039', 'KAT-202411-004', 'TROLLEY,TROLLEY,200 KG,UN', '', 'Unit', '1', 'husniaditya', '2024-11-27 14:32:49', NULL, NULL),
	('BRG-202411-04.052', 'KAT-202411-004', 'STONE,SHARPENING,3000/6000,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:35:50', NULL, NULL),
	('BRG-202411-04.053', 'KAT-202411-004', 'TUBE,TIRE,300-8,PC', '', 'Pcs', '1', 'husniaditya', '2024-11-27 14:36:04', NULL, NULL),
	('BRG-202411-05.014', 'KAT-202411-005', 'OPP TAPE,48 MM,45 MICRON,100 M,BLACK,RLL', '', 'Roll', '1', 'husniaditya', '2024-11-27 14:25:01', NULL, NULL);

-- Dumping structure for table inventory.m_kategori
DROP TABLE IF EXISTS `m_kategori`;
CREATE TABLE IF NOT EXISTS `m_kategori` (
  `ID_KATEGORI` varchar(50) NOT NULL,
  `NAMA_KATEGORI` varchar(50) DEFAULT NULL,
  `DESKRIPSI` varchar(150) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT '1',
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `CREATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_KATEGORI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventory.m_kategori: ~5 rows (approximately)
REPLACE INTO `m_kategori` (`ID_KATEGORI`, `NAMA_KATEGORI`, `DESKRIPSI`, `STATUS`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`) VALUES
	('KAT-202411-001', 'Barang Panen', 'Persediaan pembantu kegiatan panen', '1', 'husniaditya', '2024-11-17 19:45:33', 'husniaditya', '2024-11-21 21:06:09'),
	('KAT-202411-002', 'Barang Maintenance', 'Persediaan pembantu proses maintenance', '1', 'husniaditya', '2024-11-17 19:45:44', 'husniaditya', '2024-11-21 21:05:57'),
	('KAT-202411-003', 'Alat Pelindung Diri', '', '1', 'husniaditya', '2024-11-21 21:08:53', NULL, NULL),
	('KAT-202411-004', 'Alat Perlengkapan', '', '1', 'husniaditya', '2024-11-27 14:21:54', NULL, NULL),
	('KAT-202411-005', 'ATK', '', '1', 'husniaditya', '2024-11-27 14:24:45', NULL, NULL);

-- Dumping structure for table inventory.m_user
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE IF NOT EXISTS `m_user` (
  `ID_USER` varchar(50) NOT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `USERPASSWORD` text DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `AKSES` varchar(50) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `CREATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventory.m_user: ~4 rows (approximately)
REPLACE INTO `m_user` (`ID_USER`, `USERNAME`, `USERPASSWORD`, `NAMA`, `EMAIL`, `AKSES`, `STATUS`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`) VALUES
	('USR-202411-001', 'husniaditya', '$2y$12$NMxDXU77/MPLgD44nkvdB.jPdB.n5kJLWcYGe8lxBoBiGyk/Jeysu', 'Husni Aditya', 'mail@mail.com', 'KTU', '1', 'husniaditya', '2024-11-17 16:56:29', NULL, NULL),
	('USR-202411-002', 'ktu', '$2y$12$F0qtp9zUusLf6MidKuX4deuItKIu1h7PF3XNFyy8j4FK4U7qIZJU.', 'KTU', 'mail@mail.com', 'KTU', '1', 'husniaditya', '2024-11-17 16:56:29', 'husniaditya', '2024-11-27 15:52:50'),
	('USR-202411-003', 'manager', '$2y$12$4qp/3Jouz57razqxE7NdZO0HICxfIP0pZ00VbOOH9t6SfFJz.IdPS', 'Kepala Gudang', 'mail@mail.com', 'Manager', '1', 'husniaditya', '2024-11-17 16:56:29', 'husniaditya', '2024-11-27 15:53:00'),
	('USR-202411-004', 'admin', '$2y$12$RfFsPHOYlyrVMFkypOEiCOVJQ7CFnd2Gwf..96shD/iLym6fR19CW', 'Admin', 'mail@mail.com', 'Admin', '1', 'husniaditya', '2024-11-17 16:56:29', 'husniaditya', '2024-11-27 15:53:08');

-- Dumping structure for table inventory.t_pemasukan
DROP TABLE IF EXISTS `t_pemasukan`;
CREATE TABLE IF NOT EXISTS `t_pemasukan` (
  `ID_PEMASUKAN` varchar(50) NOT NULL,
  `NOMOR_PO` varchar(50) DEFAULT NULL,
  `TANGGAL_MASUK` date DEFAULT NULL,
  `KETERANGAN` varchar(100) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT '1',
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `CREATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_PEMASUKAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventory.t_pemasukan: ~3 rows (approximately)
REPLACE INTO `t_pemasukan` (`ID_PEMASUKAN`, `NOMOR_PO`, `TANGGAL_MASUK`, `KETERANGAN`, `STATUS`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`) VALUES
	('MSK-202411-001', 'PO-202410-0001', '2024-10-09', '', '1', 'husniaditya', '2024-11-27 14:43:26', NULL, NULL),
	('MSK-202411-002', 'PO-202410-0002', '2024-11-14', '', '1', 'husniaditya', '2024-11-27 14:45:18', NULL, NULL),
	('MSK-202411-003', 'PO-202408-0001', '2024-08-15', '', '1', 'husniaditya', '2024-11-27 14:45:56', NULL, NULL);

-- Dumping structure for table inventory.t_pengeluaran
DROP TABLE IF EXISTS `t_pengeluaran`;
CREATE TABLE IF NOT EXISTS `t_pengeluaran` (
  `ID_PENGELUARAN` varchar(50) NOT NULL,
  `NOMOR_MRIS` varchar(50) DEFAULT NULL,
  `TANGGAL_KELUAR` date DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `OPERATING_UNIT` varchar(50) DEFAULT NULL,
  `DIVISI` varchar(50) DEFAULT NULL,
  `BLOCK` varchar(50) DEFAULT NULL,
  `KETERANGAN` varchar(150) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT '1',
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `CREATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_PENGELUARAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventory.t_pengeluaran: ~3 rows (approximately)
REPLACE INTO `t_pengeluaran` (`ID_PENGELUARAN`, `NOMOR_MRIS`, `TANGGAL_KELUAR`, `NAMA`, `OPERATING_UNIT`, `DIVISI`, `BLOCK`, `KETERANGAN`, `STATUS`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`) VALUES
	('KLR-202411-001', 'MRIS-202411-0001', '2024-11-27', 'Husni Aditya', 'Regional', 'Technival Dev', NULL, '', '1', 'husniaditya', '2024-11-27 14:52:02', NULL, NULL),
	('KLR-202411-002', 'MRIS-202411-0002', '2024-11-27', 'Husni Aditya', 'Regional', 'Technival Dev', NULL, '', '1', 'husniaditya', '2024-11-27 14:52:21', NULL, NULL),
	('KLR-202411-003', 'MRIS-202411-0003', '2024-11-27', 'Husni Aditya', 'Regional', 'Technival Dev', NULL, '', '1', 'husniaditya', '2024-11-27 14:54:53', NULL, NULL);

-- Dumping structure for table inventory.t_persediaan
DROP TABLE IF EXISTS `t_persediaan`;
CREATE TABLE IF NOT EXISTS `t_persediaan` (
  `ID_PERSEDIAAN` varchar(50) NOT NULL,
  `ID_TRANSAKSI` varchar(50) DEFAULT NULL,
  `ID_BARANG` varchar(50) DEFAULT NULL,
  `NO_BATCH` varchar(50) DEFAULT NULL,
  `DK` varchar(50) DEFAULT NULL,
  `QTY` int(11) DEFAULT NULL,
  `EXPIRATION` date DEFAULT NULL,
  `KETERANGAN` varchar(200) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT '1',
  PRIMARY KEY (`ID_PERSEDIAAN`),
  KEY `ID_TRANSAKSI` (`ID_TRANSAKSI`),
  KEY `ID_BARANG` (`ID_BARANG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventory.t_persediaan: ~6 rows (approximately)
REPLACE INTO `t_persediaan` (`ID_PERSEDIAAN`, `ID_TRANSAKSI`, `ID_BARANG`, `NO_BATCH`, `DK`, `QTY`, `EXPIRATION`, `KETERANGAN`, `STATUS`) VALUES
	('PSD-202411-001', 'MSK-202411-001', 'BRG-202411-01.054', '24J01054', 'D', 10, NULL, '', '1'),
	('PSD-202411-002', 'MSK-202411-002', 'BRG-202411-01.054', '24K01054', 'D', 2, NULL, '', '1'),
	('PSD-202411-003', 'MSK-202411-003', 'BRG-202411-03.028', '24H03028', 'D', 20, NULL, '', '1'),
	('PSD-202411-004', 'KLR-202411-001', 'BRG-202411-03.028', '24H03028', 'K', -5, NULL, '', '1'),
	('PSD-202411-005', 'KLR-202411-002', 'BRG-202411-01.054', '24J01054', 'K', -5, NULL, '', '1'),
	('PSD-202411-006', 'KLR-202411-003', 'BRG-202411-01.054', '24K01054', 'K', -1, NULL, '', '1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
