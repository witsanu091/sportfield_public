-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 06:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportfield_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `backup_repairs`
--

CREATE TABLE `backup_repairs` (
  `id` int(11) NOT NULL,
  `notify_id` varchar(45) DEFAULT NULL,
  `repair_light` varchar(45) DEFAULT NULL,
  `repair_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('pa0tlkrasuc3subpnj6ub2dgr6p8f29t', '::1', 1582885521, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323838353532313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('1jtsdhlfg1p8ddo3tg1gqp2vkk0md2k4', '::1', 1582888180, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323838383138303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('r62rh6su3k3q8ajh43lkpsejhljr4j1a', '::1', 1582888691, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323838383639313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('t2uqot73n26ap69babbcd4plgnnv8rvp', '::1', 1582889011, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323838393031313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('c6r29ir5mkd66c107n0i66e8p26tl2b1', '::1', 1582889834, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323838393833343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('h2so21as33hnb376nd757r40rvohlpla', '::1', 1582890447, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323839303434373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('0l69lqsl2kud5c527f03ase5etb4aqde', '::1', 1582890829, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323839303832393b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('76e24nbufrkvj2peioq8trvq0jbf50fn', '::1', 1582891190, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323839313139303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('o0b3oegtt6vj8p0clm9pouicn0tofghi', '::1', 1582891551, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323839313535313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('8hu7lgfj0g2o15vtpofbdu7a34qhh8n3', '::1', 1582891868, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323839313836383b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('6lno2cg3c3n27alsdm0fgst1d4920qq9', '::1', 1582892169, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323839323136393b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('j8gdvp84rmfh65iqobl7ad2vh5bqj57l', '::1', 1582892477, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323839323437373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('tk35ptrs8m8jsld93qaopki4ofri60a6', '::1', 1582892556, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323839323437373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('qjfcv3170vbg1cuon51tnh1076d6imml', '::1', 1582909219, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323930393231393b),
('hfekcbhhh7ictce4un1trude4govapr3', '::1', 1582909544, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323930393534343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('0mejj8npt1suehh5mjqhauqop4g9niit', '::1', 1582909877, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323930393837373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('mallu885sci89v45tf7u39hp7rv4qeh7', '::1', 1582910233, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931303233333b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('8ipvnhni6k6f64un3d554lrmqllcpvu9', '::1', 1582910602, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931303630323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('ol7mgr247l06s8rvgcoqc9c4ggnl8or1', '::1', 1582910906, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931303930363b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('t52mruijjdtsh6m9tbs236mq1sate12i', '::1', 1582911214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931313231343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('6qifam49dhvud635crjeugmc9nbp9lgb', '::1', 1582911532, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931313533323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('rhk0kcb0v0t0975fpjto23ebujm4scc5', '::1', 1582911841, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931313834313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('2b8qdmu2mn66v3f7mo3i45kpr74r22l0', '::1', 1582912190, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931323139303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('j48nf4kl37qvvr8nnhu4abelmfuipiik', '::1', 1582912547, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931323534373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('ir3302chsaf85d855nuagrif15hi6kq1', '::1', 1582914249, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931343234393b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('6pcjdjhf2j80vgcav2e06n325oqh1ht6', '::1', 1582914575, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931343537353b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('vog6h0fugi5fe9r9b1h86m8a17cq5o34', '::1', 1582914900, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931343930303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('mo0s637v33tlnv0e1pmvs1sulullc8sk', '::1', 1582915228, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931353232383b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('ahf3g17hlv06mnb1r0f2r6383ggon9s0', '::1', 1582915578, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931353537383b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('mrbri4vht02opm39l60detlcv39gp1sp', '::1', 1582916057, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931363035373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('1ik6ahhvkr1pms2honr0e2mcij5u952b', '::1', 1582916443, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931363434333b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a32343a22e0b887e0b8b2e0b899e0b984e0b89fe0b89fe0b989e0b8b2223b),
('lmijgdm5trns826vdtkcguuh5q8bni09', '::1', 1582916360, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931363336303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('g3htfejhflucoqn9ihac6q9crevsbrr6', '::1', 1582916710, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931363731303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('7km8ml9r29qklatha6n2235i4bli71i8', '::1', 1582916761, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931363736313b69647c733a313a2234223b757365726e616d657c733a353a2264656d6f31223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('2nag2bv8c3oel2m057mit8h307tknbqu', '::1', 1582917343, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931373334333b),
('93mlsghv4se7ta46f756vajso7unamqo', '::1', 1582917085, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931373038353b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a32343a22e0b887e0b8b2e0b899e0b984e0b89fe0b89fe0b989e0b8b2223b),
('ftf35dsaael94c3ku83bkcnkbt27ltul', '::1', 1582917334, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931373038353b69647c733a313a2234223b757365726e616d657c733a353a2264656d6f31223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('b2bq7cs3umfhsnom8r798ortjf8s9bu4', '::1', 1582917644, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931373634343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a32343a22e0b887e0b8b2e0b899e0b984e0b89fe0b89fe0b989e0b8b2223b),
('0887f0dd621usn0bnn28p88bi4j3vp8h', '::1', 1582917955, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931373935353b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a32343a22e0b887e0b8b2e0b899e0b984e0b89fe0b89fe0b989e0b8b2223b),
('uomkrlekugdsn6elee9mm4tqqnv6esk9', '::1', 1582918274, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931383237343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a32343a22e0b887e0b8b2e0b899e0b984e0b89fe0b89fe0b989e0b8b2223b),
('nnc23jo31fl38ai30jt7pmgoeh8r31bf', '::1', 1582918699, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931383639393b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a32343a22e0b887e0b8b2e0b899e0b984e0b89fe0b89fe0b989e0b8b2223b),
('7tip6c4s9t5pjo2ept0gcbrlboeavd6t', '::1', 1582919002, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931393030323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a32343a22e0b887e0b8b2e0b899e0b984e0b89fe0b89fe0b989e0b8b2223b),
('kciqg73s98fl851e0v0kdjr0mm91cio5', '::1', 1582919320, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931393332303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a32343a22e0b887e0b8b2e0b899e0b984e0b89fe0b89fe0b989e0b8b2223b),
('g456i3kd4jns2f6u6rmo7iu5r5609sc8', '::1', 1582919722, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323931393732323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a32343a22e0b887e0b8b2e0b899e0b984e0b89fe0b89fe0b989e0b8b2223b),
('f9rv7d67ullv5c51k51oue2b0gkf85cn', '::1', 1582920041, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932303034313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a32343a22e0b887e0b8b2e0b899e0b984e0b89fe0b89fe0b989e0b8b2223b),
('ae6hq14n9p8afuep7tqe9ctkuo4lrb8m', '::1', 1582920347, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932303334373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a32343a22e0b887e0b8b2e0b899e0b984e0b89fe0b89fe0b989e0b8b2223b),
('d68gidcfqhc86pk5m0e0ln4tr7qvl3qr', '::1', 1582920648, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932303634383b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a32343a22e0b887e0b8b2e0b899e0b984e0b89fe0b89fe0b989e0b8b2223b),
('kbsa5vtbci94nteadcfjt6fadaldke8r', '::1', 1582920977, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932303937373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a32343a22e0b887e0b8b2e0b899e0b984e0b89fe0b89fe0b989e0b8b2223b),
('gneo0vpfpmb0raf4kef7gultsnmvhi49', '::1', 1582921288, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932313238383b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('qnlvb6ivp58lb2621uspqhfe4n9culge', '::1', 1582921652, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932313635323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('8cludjskpm525qc622g9u3los2d95q6f', '::1', 1582921554, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932313431373b69647c733a313a2234223b757365726e616d657c733a353a2264656d6f31223b7374617475737c733a32343a22e0b887e0b8b2e0b899e0b984e0b89fe0b89fe0b989e0b8b2223b),
('t60duc2f7qnc8iphg00vc60m4jt1fhn8', '::1', 1582922039, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932323033393b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('2mn1qi0c4rp85vjvj694ohrgkft4di1v', '::1', 1582922360, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932323336303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('njeb4l7lv5bf808vt0i6v7bpehjjcgqd', '::1', 1582922715, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932323731353b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('l2hv64nc8mbaora6fkueje52qfc2gcqt', '::1', 1582923093, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932333039333b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('mmqk553d44od5sj4c97jkepfvi1ngm55', '::1', 1582925121, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932353132313b),
('qbg93c2dou07nrg2pm6hmmik53vqdln5', '::1', 1582923519, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932333531393b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('9qk0dt65ee3s5ddsmqm83f6fop9kp2c6', '::1', 1582923823, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932333832333b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('nosi7hgf1sseop3413h41pshncma8tjn', '::1', 1582924127, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932343132373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('abjj7h1umd1iic5oat5lldn9qc2m9phh', '::1', 1582924578, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932343537383b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('bo93m6o2122nhtp53h71bhg8bd22mb75', '::1', 1582924932, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932343933323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('4pr6uep8a83grn6bg1jge27rd3h93um9', '::1', 1582925711, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932353731313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('sslf3niboba8jblrk1mb9pq79dr1vt3p', '::1', 1582925502, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932353530323b),
('nbng4p8bne662nlf8sk0d3i4lhumpguf', '::1', 1582925584, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932353530323b),
('dv2fqig3hfq73ookcomurvkk0ck83l5f', '::1', 1582926384, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932363338343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('818iqoef5vctkkgfub96t58ptue9s095', '::1', 1582926871, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932363837313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('df73jillesk7sk30fectvn4afshrktk6', '::1', 1582927207, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932373230373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('vg8dc3ujt260j24ust5tf1as5s790kj2', '::1', 1582927515, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932373531353b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('t075he9a6054oj1kffnreveerbeh07f5', '::1', 1582927539, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323932373531353b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b7374617475737c733a33333a22e0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b),
('joumldlsgsr01b9k848hiv10tamleo4u', '::1', 1617206852, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373230363736323b),
('kkleirp76du91qqk6mrags89gvd18jrp', '::1', 1617207157, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373230373135373b),
('79jujf97gokjmoba79drae9mkp06mcb0', '::1', 1617209479, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373230393437393b),
('6ero582e46a05h86utvm7o44pegno44j', '::1', 1617209883, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373230393838333b),
('hetl7ahc68iqqb30tuur6v2cm7h8r8is', '127.0.0.1', 1617209908, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373230393838333b);

-- --------------------------------------------------------

--
-- Table structure for table `notify_repairs`
--

CREATE TABLE `notify_repairs` (
  `id` int(11) NOT NULL,
  `notify_status` enum('กำลังดำเนินการ','ดำเนินการเสร็จสิ้น') DEFAULT NULL,
  `notify_date` date DEFAULT NULL,
  `notify_end_date` date DEFAULT NULL,
  `repair_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notify_repairs`
--

INSERT INTO `notify_repairs` (`id`, `notify_status`, `notify_date`, `notify_end_date`, `repair_price`) VALUES
(6, 'ดำเนินการเสร็จสิ้น', '2020-02-29', '2020-02-29', 10000),
(7, 'กำลังดำเนินการ', '2020-03-12', NULL, NULL),
(20, 'กำลังดำเนินการ', '2020-02-29', NULL, NULL),
(21, 'กำลังดำเนินการ', '2020-02-29', NULL, NULL),
(22, 'กำลังดำเนินการ', '2020-02-29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `repair_orders`
--

CREATE TABLE `repair_orders` (
  `id` int(11) NOT NULL,
  `repair_light` int(11) DEFAULT NULL,
  `repair_status` enum('แจ้งข้อมูล','กำลังดำเนินการ','ดำเนินการเสร็จสิ้น','ยกเลิก') DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `sportfield_id` int(11) DEFAULT NULL,
  `notifyrepair_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repair_orders`
--

INSERT INTO `repair_orders` (`id`, `repair_light`, `repair_status`, `report_date`, `sportfield_id`, `notifyrepair_id`) VALUES
(10, 4, 'ดำเนินการเสร็จสิ้น', '2020-02-29', 4, 6),
(11, 17, 'ดำเนินการเสร็จสิ้น', '2020-02-29', 4, 6),
(12, 18, 'ดำเนินการเสร็จสิ้น', '2020-02-29', 6, 6),
(13, 15, 'กำลังดำเนินการ', '2020-02-29', 4, 7),
(14, 16, 'กำลังดำเนินการ', '2020-02-29', 6, 7),
(15, 19, 'กำลังดำเนินการ', '2020-02-29', 6, 7),
(31, 6, 'กำลังดำเนินการ', '2020-02-29', 4, 22),
(32, 18, 'กำลังดำเนินการ', '2020-02-29', 4, 22),
(33, 19, 'แจ้งข้อมูล', '2020-02-29', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sport_fields`
--

CREATE TABLE `sport_fields` (
  `id` int(11) NOT NULL,
  `sportfield_name` varchar(255) DEFAULT NULL,
  `sportfield_light_amount` int(11) DEFAULT NULL,
  `sportfield_detail` text DEFAULT NULL,
  `sportfield_image` varchar(255) DEFAULT NULL,
  `sportfield_sturture_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sport_fields`
--

INSERT INTO `sport_fields` (`id`, `sportfield_name`, `sportfield_light_amount`, `sportfield_detail`, `sportfield_image`, `sportfield_sturture_image`) VALUES
(4, 'สนาม 1 edited', 25, 'this is description for stadium. with test edit', 'a71c3b0c124eac853852284f8dba6f07.jpg', 'af832cb36b75079b805235d0ac7c0124.jpg'),
(6, 'O365', 8, 'รายละเอียดสนาม', '7bb1d696f099e86f313c74c4f9a259dc.jpg', 'a8297b7775cbce8bba23dd21ef225bad.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status` enum('ผู้ดูแลระบบ','งานไฟฟ้า','','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'ผู้ดูแลระบบ'),
(2, 'user', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'ผู้ดูแลระบบ'),
(4, 'demo1', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'งานไฟฟ้า');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backup_repairs`
--
ALTER TABLE `backup_repairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `notify_repairs`
--
ALTER TABLE `notify_repairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair_orders`
--
ALTER TABLE `repair_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sportfield_id` (`sportfield_id`),
  ADD KEY `notifyrepair_id` (`notifyrepair_id`);

--
-- Indexes for table `sport_fields`
--
ALTER TABLE `sport_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backup_repairs`
--
ALTER TABLE `backup_repairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notify_repairs`
--
ALTER TABLE `notify_repairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `repair_orders`
--
ALTER TABLE `repair_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sport_fields`
--
ALTER TABLE `sport_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `repair_orders`
--
ALTER TABLE `repair_orders`
  ADD CONSTRAINT `notifyrepair_id` FOREIGN KEY (`notifyrepair_id`) REFERENCES `notify_repairs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sportfield_id` FOREIGN KEY (`sportfield_id`) REFERENCES `sport_fields` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;