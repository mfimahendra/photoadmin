/*
 Navicat Premium Data Transfer

 Source Server         : this_laptop
 Source Server Type    : MySQL
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : esokhari

 Target Server Type    : MySQL
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 07/02/2026 23:29:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cache
-- ----------------------------
INSERT INTO `cache` VALUES ('mfimahendra|::1', 'i:1;', 1740843763);
INSERT INTO `cache` VALUES ('mfimahendra|::1:timer', 'i:1740843763;', 1740843763);
INSERT INTO `cache` VALUES ('operator|127.0.0.1', 'i:1;', 1724581402);
INSERT INTO `cache` VALUES ('operator|127.0.0.1:timer', 'i:1724581402;', 1724581402);
INSERT INTO `cache` VALUES ('rora|::1', 'i:3;', 1740843705);
INSERT INTO `cache` VALUES ('rora|::1:timer', 'i:1740843705;', 1740843705);

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------

-- ----------------------------
-- Table structure for code_generators
-- ----------------------------
DROP TABLE IF EXISTS `code_generators`;
CREATE TABLE `code_generators`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `prefix` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `length` int NULL DEFAULT NULL,
  `index` bigint NULL DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of code_generators
-- ----------------------------
INSERT INTO `code_generators` VALUES (1, 'C', 5, 1, 'customer', 'mahendra', '2024-01-19 20:19:25', '2024-08-18 13:56:45');
INSERT INTO `code_generators` VALUES (5, 'INV', 5, 1, 'invoice', 'mahendra', '2024-05-23 09:30:28', '2024-09-13 12:29:11');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cancelled_at` int NULL DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of job_batches
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED NULL DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for m_additionals
-- ----------------------------
DROP TABLE IF EXISTS `m_additionals`;
CREATE TABLE `m_additionals`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `package` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price` decimal(10, 0) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 306 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_additionals
-- ----------------------------
INSERT INTO `m_additionals` VALUES (1, 'Surabaya', 'Extra (personal) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (2, 'Surabaya', 'Extra (duo/group) 30 mins', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (3, 'Surabaya', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (4, 'Surabaya', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (5, 'Surabaya', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (6, 'Surabaya', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (7, 'Surabaya', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (8, 'Surabaya', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (9, 'Surabaya', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (10, 'Surabaya', 'Couple Cinematic Video', 700000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (11, 'Surabaya', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (12, 'Surabaya', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (13, 'Surabaya', 'Group Cinematic Video', 450000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (14, 'Surabaya', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (15, 'Surabaya', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (16, 'Surabaya', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (17, 'Surabaya', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (18, 'Surabaya', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (19, 'Malang', 'Extra (personal) 30 mins', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (20, 'Malang', 'Extra (duo/group) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (21, 'Malang', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (22, 'Malang', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (23, 'Malang', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (24, 'Malang', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (25, 'Malang', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (26, 'Malang', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (27, 'Malang', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (28, 'Malang', 'Couple Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (29, 'Malang', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (30, 'Malang', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (31, 'Malang', 'Group Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (32, 'Malang', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (33, 'Malang', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (34, 'Malang', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (35, 'Malang', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (36, 'Malang', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (37, 'Kediri', 'Extra (personal) 30 mins', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (38, 'Kediri', 'Extra (duo/group) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (39, 'Kediri', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (40, 'Kediri', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (41, 'Kediri', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (42, 'Kediri', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (43, 'Kediri', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (44, 'Kediri', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (45, 'Kediri', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (46, 'Kediri', 'Couple Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (47, 'Kediri', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (48, 'Kediri', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (49, 'Kediri', 'Group Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (50, 'Kediri', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (51, 'Kediri', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (52, 'Kediri', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (53, 'Kediri', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (54, 'Kediri', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (55, 'Madura', 'Extra (personal) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (56, 'Madura', 'Extra (duo/group) 30 mins', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (57, 'Madura', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (58, 'Madura', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (59, 'Madura', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (60, 'Madura', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (61, 'Madura', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (62, 'Madura', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (63, 'Madura', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (64, 'Madura', 'Couple Cinematic Video', 700000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (65, 'Madura', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (66, 'Madura', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (67, 'Madura', 'Group Cinematic Video', 450000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (68, 'Madura', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (69, 'Madura', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (70, 'Madura', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (71, 'Madura', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (72, 'Madura', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (73, 'Tulungagung', 'Extra (personal) 30 mins', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (74, 'Tulungagung', 'Extra (duo/group) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (75, 'Tulungagung', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (76, 'Tulungagung', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (77, 'Tulungagung', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (78, 'Tulungagung', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (79, 'Tulungagung', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (80, 'Tulungagung', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (81, 'Tulungagung', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (82, 'Tulungagung', 'Couple Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (83, 'Tulungagung', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (84, 'Tulungagung', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (85, 'Tulungagung', 'Group Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (86, 'Tulungagung', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (87, 'Tulungagung', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (88, 'Tulungagung', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (89, 'Tulungagung', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (90, 'Tulungagung', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (91, 'Lamongan', 'Extra (personal) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (92, 'Lamongan', 'Extra (duo/group) 30 mins', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (93, 'Lamongan', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (94, 'Lamongan', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (95, 'Lamongan', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (96, 'Lamongan', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (97, 'Lamongan', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (98, 'Lamongan', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (99, 'Lamongan', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (100, 'Lamongan', 'Couple Cinematic Video', 700000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (101, 'Lamongan', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (102, 'Lamongan', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (103, 'Lamongan', 'Group Cinematic Video', 450000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (104, 'Lamongan', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (105, 'Lamongan', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (106, 'Lamongan', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (107, 'Lamongan', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (108, 'Lamongan', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (109, 'Gresik', 'Extra (personal) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (110, 'Gresik', 'Extra (duo/group) 30 mins', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (111, 'Gresik', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (112, 'Gresik', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (113, 'Gresik', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (114, 'Gresik', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (115, 'Gresik', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (116, 'Gresik', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (117, 'Gresik', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (118, 'Gresik', 'Couple Cinematic Video', 700000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (119, 'Gresik', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (120, 'Gresik', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (121, 'Gresik', 'Group Cinematic Video', 450000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (122, 'Gresik', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (123, 'Gresik', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (124, 'Gresik', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (125, 'Gresik', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (126, 'Gresik', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (127, 'Blitar', 'Extra (personal) 30 mins', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (128, 'Blitar', 'Extra (duo/group) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (129, 'Blitar', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (130, 'Blitar', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (131, 'Blitar', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (132, 'Blitar', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (133, 'Blitar', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (134, 'Blitar', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (135, 'Blitar', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (136, 'Blitar', 'Couple Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (137, 'Blitar', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (138, 'Blitar', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (139, 'Blitar', 'Group Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (140, 'Blitar', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (141, 'Blitar', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (142, 'Blitar', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (143, 'Blitar', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (144, 'Blitar', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (145, 'Pasuruan', 'Extra (personal) 30 mins', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (146, 'Pasuruan', 'Extra (duo/group) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (147, 'Pasuruan', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (148, 'Pasuruan', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (149, 'Pasuruan', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (150, 'Pasuruan', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (151, 'Pasuruan', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (152, 'Pasuruan', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (153, 'Pasuruan', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (154, 'Pasuruan', 'Couple Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (155, 'Pasuruan', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (156, 'Pasuruan', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (157, 'Pasuruan', 'Group Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (158, 'Pasuruan', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (159, 'Pasuruan', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (160, 'Pasuruan', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (161, 'Pasuruan', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (162, 'Pasuruan', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (163, 'Sidoarjo', 'Extra (personal) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (164, 'Sidoarjo', 'Extra (duo/group) 30 mins', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (165, 'Sidoarjo', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (166, 'Sidoarjo', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (167, 'Sidoarjo', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (168, 'Sidoarjo', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (169, 'Sidoarjo', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (170, 'Sidoarjo', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (171, 'Sidoarjo', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (172, 'Sidoarjo', 'Couple Cinematic Video', 700000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (173, 'Sidoarjo', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (174, 'Sidoarjo', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (175, 'Sidoarjo', 'Group Cinematic Video', 450000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (176, 'Sidoarjo', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (177, 'Sidoarjo', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (178, 'Sidoarjo', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (179, 'Sidoarjo', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (180, 'Sidoarjo', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (181, 'Jember', 'Extra (personal) 30 mins', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (182, 'Jember', 'Extra (duo/group) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (183, 'Jember', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (184, 'Jember', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (185, 'Jember', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (186, 'Jember', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (187, 'Jember', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (188, 'Jember', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (189, 'Jember', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (190, 'Jember', 'Couple Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (191, 'Jember', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (192, 'Jember', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (193, 'Jember', 'Group Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (194, 'Jember', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (195, 'Jember', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (196, 'Jember', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (197, 'Jember', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (198, 'Jember', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (199, 'Semarang', 'Extra (personal) 30 mins', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (200, 'Semarang', 'Extra (duo/group) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (201, 'Semarang', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (202, 'Semarang', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (203, 'Semarang', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (204, 'Semarang', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (205, 'Semarang', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (206, 'Semarang', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (207, 'Semarang', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (208, 'Semarang', 'Couple Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (209, 'Semarang', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (210, 'Semarang', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (211, 'Semarang', 'Group Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (212, 'Semarang', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (213, 'Semarang', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (214, 'Semarang', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (215, 'Semarang', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (216, 'Bandung', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (217, 'Bandung', 'Extra (personal) 30 mins', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (218, 'Bandung', 'Extra (duo/group) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (219, 'Bandung', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (220, 'Bandung', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (221, 'Bandung', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (222, 'Bandung', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (223, 'Bandung', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (224, 'Bandung', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (225, 'Bandung', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (226, 'Bandung', 'Couple Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (227, 'Bandung', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (228, 'Bandung', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (229, 'Bandung', 'Group Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (230, 'Bandung', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (231, 'Bandung', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (232, 'Bandung', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (233, 'Bandung', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (234, 'Jakarta', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (235, 'Jakarta', 'Extra (personal) 30 mins', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (236, 'Jakarta', 'Extra (duo/group) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (237, 'Jakarta', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (238, 'Jakarta', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (239, 'Jakarta', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (240, 'Jakarta', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (241, 'Jakarta', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (242, 'Jakarta', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (243, 'Jakarta', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (244, 'Jakarta', 'Couple Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (245, 'Jakarta', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (246, 'Jakarta', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (247, 'Jakarta', 'Group Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (248, 'Jakarta', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (249, 'Jakarta', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (250, 'Jakarta', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (251, 'Jakarta', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (252, 'Solo', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (253, 'Solo', 'Extra (personal) 30 mins', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (254, 'Solo', 'Extra (duo/group) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (255, 'Solo', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (256, 'Solo', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (257, 'Solo', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (258, 'Solo', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (259, 'Solo', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (260, 'Solo', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (261, 'Solo', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (262, 'Solo', 'Couple Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (263, 'Solo', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (264, 'Solo', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (265, 'Solo', 'Group Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (266, 'Solo', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (267, 'Solo', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (268, 'Solo', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (269, 'Solo', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (270, 'Jogja', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (271, 'Jogja', 'Extra (personal) 30 mins', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (272, 'Jogja', 'Extra (duo/group) 30 mins', 175000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (273, 'Jogja', 'Extra Edit (5 photos)', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (274, 'Jogja', 'Extra Edit (10 photos)', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (275, 'Jogja', 'Same Day Edit (photo)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (276, 'Jogja', 'Same Day Edit (video)', 300000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (277, 'Jogja', 'BG removal AI edit', 10000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (278, 'Jogja', 'Wood Premium Mini Box', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (279, 'Jogja', 'Leather Magazine', 500000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (280, 'Jogja', 'Couple Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (281, 'Jogja', 'Extra Member (1)', 75000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (282, 'Jogja', 'Extra Member (2)', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (283, 'Jogja', 'Group Cinematic Video', 650000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (284, 'Jogja', 'Hair Do', 150000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (285, 'Jogja', 'Transport fees 1', 15000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (286, 'Jogja', 'Transport fees 2', 25000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (287, 'Jogja', 'Transport fees 3', 35000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (288, 'Jogja', 'Transport fees 4', 50000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (289, 'Surabaya', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (290, 'Malang', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (291, 'Kediri', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (292, 'Madura', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (293, 'Tulungagung', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (294, 'Lamongan', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (295, 'Gresik', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (296, 'Blitar', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (297, 'Pasuruan', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (298, 'Sidoarjo', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (299, 'Jember', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (300, 'Semarang', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (301, 'Bandung', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (302, 'Jakarta', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (303, 'Solo', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (304, 'Jogja', 'All Files Edit', 200000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');
INSERT INTO `m_additionals` VALUES (305, 'Malang', 'Cinematic Video 30\'s', 450000, '2026-01-16 06:21:19', '2026-01-16 06:21:19');

-- ----------------------------
-- Table structure for m_cities
-- ----------------------------
DROP TABLE IF EXISTS `m_cities`;
CREATE TABLE `m_cities`  (
  `id` int NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_cities
-- ----------------------------

-- ----------------------------
-- Table structure for m_events
-- ----------------------------
DROP TABLE IF EXISTS `m_events`;
CREATE TABLE `m_events`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_events
-- ----------------------------
INSERT INTO `m_events` VALUES (1, 'Graduation');
INSERT INTO `m_events` VALUES (2, 'Pre-Graduation');
INSERT INTO `m_events` VALUES (3, 'Post-Graduation');
INSERT INTO `m_events` VALUES (4, 'Sumpah Dokter');
INSERT INTO `m_events` VALUES (5, 'Sumpah Dokter Gigi');
INSERT INTO `m_events` VALUES (6, 'Sumpah Apoteker');
INSERT INTO `m_events` VALUES (7, 'Pelantikan Ners');
INSERT INTO `m_events` VALUES (8, 'Pelantikan Bidan');
INSERT INTO `m_events` VALUES (9, 'Yudisium Pendidikan Profesi Guru');
INSERT INTO `m_events` VALUES (10, 'Sumpah Profesi Guru');

-- ----------------------------
-- Table structure for m_faculties
-- ----------------------------
DROP TABLE IF EXISTS `m_faculties`;
CREATE TABLE `m_faculties`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `faculty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 146 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_faculties
-- ----------------------------
INSERT INTO `m_faculties` VALUES (73, 'D3 Rekam Medis dan Informasi Kesehatan');
INSERT INTO `m_faculties` VALUES (74, 'Fakultas Bahasa dan Seni');
INSERT INTO `m_faculties` VALUES (75, 'Fakultas Ekonomi dan Bisnis');
INSERT INTO `m_faculties` VALUES (76, 'Fakultas Farmasi');
INSERT INTO `m_faculties` VALUES (77, 'Fakultas Hukum');
INSERT INTO `m_faculties` VALUES (78, 'Fakultas Ilmu Budaya');
INSERT INTO `m_faculties` VALUES (79, 'Fakultas Ilmu Keolahragaan');
INSERT INTO `m_faculties` VALUES (80, 'Fakultas Ilmu Kesehatan');
INSERT INTO `m_faculties` VALUES (81, 'Fakultas Ilmu Komputer');
INSERT INTO `m_faculties` VALUES (82, 'Fakultas Ilmu Komunikasi');
INSERT INTO `m_faculties` VALUES (83, 'Fakultas Ilmu Pendidikan');
INSERT INTO `m_faculties` VALUES (84, 'Fakultas Ilmu Sosial dan Ilmu Politik');
INSERT INTO `m_faculties` VALUES (85, 'Fakultas Keguruan dan Ilmu Pendidikan');
INSERT INTO `m_faculties` VALUES (86, 'Fakultas Kedokteran');
INSERT INTO `m_faculties` VALUES (87, 'Fakultas Kedokteran Gigi');
INSERT INTO `m_faculties` VALUES (88, 'Jurusan Kebidanan');
INSERT INTO `m_faculties` VALUES (89, 'Jurusan Keperawatan');
INSERT INTO `m_faculties` VALUES (90, 'Fakultas Keperawatan dan Kebidanan');
INSERT INTO `m_faculties` VALUES (91, 'Fakultas Kesehatan');
INSERT INTO `m_faculties` VALUES (92, 'Fakultas Kesehatan Masyarakat');
INSERT INTO `m_faculties` VALUES (93, 'Fakultas Matematika dan Ilmu Pendidikan Alam');
INSERT INTO `m_faculties` VALUES (94, 'Fakultas Pertanian');
INSERT INTO `m_faculties` VALUES (95, 'Fakultas Psikologi');
INSERT INTO `m_faculties` VALUES (96, 'Fakultas Robotika');
INSERT INTO `m_faculties` VALUES (97, 'Fakultas Sains dan Analitika Data');
INSERT INTO `m_faculties` VALUES (98, 'Fakultas Sains dan Teknologi');
INSERT INTO `m_faculties` VALUES (99, 'Fakultas Sosial dan Humaniora');
INSERT INTO `m_faculties` VALUES (100, 'Fakultas Tarbiyah dan Ilmu Keguruan');
INSERT INTO `m_faculties` VALUES (101, 'Fakultas Teknik');
INSERT INTO `m_faculties` VALUES (102, 'Fakultas Teknik Sipil Perencanaan dan Kebumian');
INSERT INTO `m_faculties` VALUES (103, 'Fakultas Teknologi Elektro dan Informatika Cerdas');
INSERT INTO `m_faculties` VALUES (104, 'Fakultas Teknologi Industri dan Rekayasa Sistem');
INSERT INTO `m_faculties` VALUES (105, 'Fakultas Teknologi Pertanian');
INSERT INTO `m_faculties` VALUES (106, 'Fakultas Ushuluddin Adab dan Dakwah');
INSERT INTO `m_faculties` VALUES (107, 'Fakultas Ushuluddin, Adab dan Dakwah');
INSERT INTO `m_faculties` VALUES (108, 'Fakultas Vokasi');
INSERT INTO `m_faculties` VALUES (109, 'Jurusan Manajemen');
INSERT INTO `m_faculties` VALUES (110, 'Komunikasi dan Penyiaran Islam');
INSERT INTO `m_faculties` VALUES (111, 'Prodi Kebidanan');
INSERT INTO `m_faculties` VALUES (112, 'Fakultas Gizi');
INSERT INTO `m_faculties` VALUES (113, 'Fakultas Teknik Kimia');
INSERT INTO `m_faculties` VALUES (114, 'Fakultas Ilmu Bahasa');
INSERT INTO `m_faculties` VALUES (115, 'Fakultas Ilmu Sosial');
INSERT INTO `m_faculties` VALUES (116, 'Jurusan Kesehatan Gigi');
INSERT INTO `m_faculties` VALUES (117, 'Fakultas Ilmu Administrasi');
INSERT INTO `m_faculties` VALUES (118, 'Jurusan Akuntansi');
INSERT INTO `m_faculties` VALUES (119, 'Fakultas Perikanan dan Ilmu Kelautan');
INSERT INTO `m_faculties` VALUES (120, 'Pendidikan Profesi Ners');
INSERT INTO `m_faculties` VALUES (121, 'Teknologi Laboratorium Medis');
INSERT INTO `m_faculties` VALUES (122, 'Teknik Bangunan Kapal');
INSERT INTO `m_faculties` VALUES (123, 'Jurusan Kebidanan');
INSERT INTO `m_faculties` VALUES (124, 'Pendidikan Profesi Bidan');
INSERT INTO `m_faculties` VALUES (125, 'Pascasarjana');
INSERT INTO `m_faculties` VALUES (126, 'Jurusan Teknik Elektro');
INSERT INTO `m_faculties` VALUES (127, 'Transportasi Laut');
INSERT INTO `m_faculties` VALUES (128, 'Fakultas Keperawatan');
INSERT INTO `m_faculties` VALUES (129, 'Profesi Fedokteran Gigi');
INSERT INTO `m_faculties` VALUES (130, 'Fakultas Dakwah dan Ushuluddin');
INSERT INTO `m_faculties` VALUES (131, 'Jurusan Rekam Medis dan Informasi Kesehatan');
INSERT INTO `m_faculties` VALUES (132, 'Jurusan Informatika');
INSERT INTO `m_faculties` VALUES (133, 'Fakultas Teknologi Manajemen Kesehatan');
INSERT INTO `m_faculties` VALUES (134, 'Pascasarjana Pendidikan Bahasa Indonesia');
INSERT INTO `m_faculties` VALUES (135, 'Kesehatan Lingkungan');
INSERT INTO `m_faculties` VALUES (136, 'Fakultas Dakwah');
INSERT INTO `m_faculties` VALUES (137, 'Fakultas Teknologi dan Manajemen Kesehatan');
INSERT INTO `m_faculties` VALUES (138, 'Prodi Gizi');
INSERT INTO `m_faculties` VALUES (139, 'Fakultas Pendidikan Agama Islam');
INSERT INTO `m_faculties` VALUES (140, 'Fakultas Teknik dan Sains');
INSERT INTO `m_faculties` VALUES (141, 'Fakultas Ekonomi');
INSERT INTO `m_faculties` VALUES (142, 'Pendidikan Bahasa Arab');
INSERT INTO `m_faculties` VALUES (143, 'Ekonomi dan Bisnis Islam');
INSERT INTO `m_faculties` VALUES (144, 'Fakultas Syariah');
INSERT INTO `m_faculties` VALUES (145, 'Fakultas Tes');

-- ----------------------------
-- Table structure for m_freelances
-- ----------------------------
DROP TABLE IF EXISTS `m_freelances`;
CREATE TABLE `m_freelances`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `domicile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bank_account_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bank_account_number` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 111 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_freelances
-- ----------------------------
INSERT INTO `m_freelances` VALUES (1, 'Abyan', 'Surabaya', 'Abyan Taufiiqul Hakim', 'BCA', '82408535', 'abyanjezone345@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (2, 'Adin', 'Pasuruan', 'Achmad Diya\' Addin', 'BCA', '8945294341', 'achmaddiyaaddin@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (3, 'Afis', 'Kediri', 'Muhammad Lafif Akhid', 'BCA', '0332860575', 'afisakhid@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (4, 'Akbar', 'Surabaya', 'Akbar Dika Pratama', 'BCA', '6750437506', 'klotunal@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (5, 'Akhdan', 'Malang', 'Akhdan Naufarrozi', 'BCA', '113456415', 'kokakhdancakep@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (6, 'Alfa', 'Pasuruan, Malang', 'Muhammad Alfa Alfarizi', 'BCA', '3680307554', 'malfaalfarizi@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (7, 'Alif', 'Kediri', 'Alif', 'BCA', '0332674143', 'hi.alfryz@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (8, 'Andika', 'Yogyakarta', 'Andika', 'Bank Jago', '101562123226', 'kloturnal@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (9, 'Andre', 'Surabaya', 'Andreas Yulianto', 'BCA', '6042073004', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (10, 'Anin', 'Surabaya, Semarang', 'Anindita Dyah Nurmalasari', 'BNI', '1279336796', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (11, 'Anta', 'Surabaya', 'Anta Maula Saniy', 'BCA', '1870504132', 'anta.ms123@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (12, 'Arga', 'Pasuruan', 'Arga Puguh Pratama', 'Seabank', '901874397338', 'argapratama845@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (13, 'Arif', 'Pasuruan', 'Arif Rusman Hakim', 'BCA', '8945994108', 'ariffrusmanhakim@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (14, 'Arifin', 'Malang', 'Nurul Arifin', 'BCA', '8161570931', 'arifinsiregar94@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (15, 'Arky', '', 'Arky Deprianto', 'BCA', '3250994108', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (16, 'Arup', 'Sidoarjo', 'Mochamad Aruf Maulana', 'Mandiri', '1410024319469', 'sayaboecin@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (17, 'Asep', 'Jember', 'Septian Hadi Pratama Sasmita', 'BSI', '7220829558', 'sasmitaseptian123@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (18, 'Asyam', 'Sidoarjo', 'Asyam Haq', 'BCA', '4720360000', 'achmadasyam@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (19, 'Atikah', 'Surabaya', 'Atikah Husni Joban', 'BCA', '886246956', 'atikah.j98@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (20, 'Awik', 'Jember', 'Dwi Wahyu Irwanto', 'Seabank', '901992424143', 'awikaw13@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (21, 'Azel', 'Sidoarjo', 'Reyhan Azel Bagastama', 'BCA', '4290812262', 'rere.azel@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (22, 'Azriel', 'Surabaya, Malang', 'Muhammad Razzan Azriel', 'BCA', '0113274694', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (23, 'Bayong', 'Pasuruan', 'Akhmad Fadilah', 'BCA', '1991524857', 'akhmadfadilah75@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (24, 'Bima', 'Jember', 'Bhimo Pringga Jaya M', 'BCA', '3320537478', 'beningfotoku@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (25, 'Bintang', 'Malang', 'Bintang Alif', 'BRI', '200101014686509', 'aliferdsyh@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (26, 'Bintang Alif', 'Malang', 'Bintang Alif', 'BRI', '200101014686509', 'aliferdsyh@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (27, 'Bondan', 'Malang', 'Dias Faturrohman', 'BRI', '200101014342', 'bondanaldyanza@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (28, 'Damar Bagas', 'Yogyakarta', 'Damar Bagas Prakoso', 'BCA', '3271053752', 'damarbagasprakoso@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (29, 'Danny', 'Kediri', 'Danny Eka Putra Prabandaru', 'Bank Jatim', '0068183010', 'ekadanny5@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (30, 'David', '', 'Muhammad David Iqbal Wahyudin', 'BSI', '7265836016', 'archivegraduation4@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (31, 'Dhanie', 'Malang', 'Dhanie Fandy', 'BCA', '4390466957', '', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (32, 'Difi', 'Lamongan', 'Difiyandi', 'BCA', '5610370642', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (33, 'Dika', 'Surabaya', 'Husni Rahmandika', 'OCBC', '693817871892', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (34, 'Dinar', 'Kediri', 'Mochamad Dinar Yoga Pratama', 'BRI', '628201015641538', 'dinaryogap@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (35, 'Dona', 'Malang', 'Alifia Dona Zuhaira', 'BCA', '3220506834', 'alifiadona@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (36, 'Dwiki', 'Pasuruan', 'Dwiki Rikus Darmawan', 'BCA', '1991577217', 'dwikirikus@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (37, 'Dyas Eka', 'Malang', 'Dyas Eka', 'BCA', '3310768684', 'dyas.stywt11@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (38, 'Fafa', 'Lamongan', 'Muhammad Faishol Fathoni', 'BCA', '2582698318', 'm.faeshol.fthni@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (39, 'Faisal Julian', 'Surabaya', 'Faisal Fathqurrachman Julian', 'BCA', '3890581233', 'faisalfathqurrachmanjulian@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (40, 'Fani', 'Kediri, Surabaya', 'Fani Kurniawan', 'Mandiri', '1710003917526', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (41, 'Farrekh', 'Malang', 'Farrekha Annanda Putra', 'Mandiri', '1360019471017', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (42, 'Farrel', 'Malang', 'Farrel Putra Wardhana', 'BCA', '3850895995', 'wardhanafarrelputra76@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (43, 'Ferdi', 'Malang', 'Moh. Fachruddin Ferdi', 'BCA', '3151684724', '', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (44, 'Habib', 'Surabaya', 'Achmad Habib Dwi Prakoso', 'BCA', '8725166288', 'achmadhabiib@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (45, 'Hagie', 'Malang', 'Mukhamad Haggi', 'BRI', '638001002578500', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (46, 'Hamdan', 'Malang', 'Moh. HamdanNafi\' Maula', 'BCA', '6295046663', 'hamdanbruizers@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (47, 'Hannan', 'Surabaya', 'Hannan Adnin Mushaffin', 'BCA', '2711470214', '', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (48, 'Hendra', 'Kediri', 'Hendra Dinarta', 'BCA', '902044289', 'hendradinarta29@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (49, 'Hilmi', 'Pasuruan', 'Misbahul Hilmi Ramadan', 'BRI', '0518 0102 3283 507', 'ramadanhilmi22@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (50, 'Hisyam', 'Malang', 'Muchammad Latiful Hisyam', 'BRI', '754901007128535', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (51, 'Husein', 'Blitar', 'Husein Ali Mahdawi', 'BCA', '901943680', 'huseinali.4713@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (52, 'Ilham M', 'Malang', 'Ilham Ma\'ruf Ramadhan', 'BCA', '4391120883', 'ilhamm332@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (53, 'Indra', 'Malang', 'Newindra Yearil Jidan', 'BSI', '7279647418', 'indraraharjaamerta@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (54, 'Irsyad', 'Surabaya', 'Irsyaad Akmal Robbaanii', 'BCA', '2711474724', 'bagusivandra@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (55, 'Ivan', 'Malang', 'Ivandra Bagus Pranata', 'BNI', '1397785545', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (56, 'Jetrip/Kiki', 'Surabaya', 'Mochamad Ilham Rifqi', 'Mandiri', '1420019062628', 'jetrip006@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (57, 'Joko', 'Jember', 'Sujoko', 'BCA', '0241648426', 'sujoko2507@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (58, 'Kania', 'Surabaya', 'Alma Kania', 'BCA', '3151252352', 'realsky9294@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (59, 'Krisna', 'Kediri', 'Krisna Diastama', 'BCA', '4610646510', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (60, 'Laras', 'Malang', 'Larasati Estetika Ramadhan', 'Bank Jago', '501263172034', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (61, 'Laskar', 'Pasuruan', 'Laskar Amaruta Al Fajri', 'BRI', '006501100509500', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (62, 'Lian', 'Pasuruan', 'Akhmad Haqqul Zulfikar', 'BCA', '1991495202', 'a910970@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (63, 'Lutfi (Upi)', 'Pasuruan', 'Muchamad Lutfi Hidayat', 'BCA', '1991448565', 'loetfie33@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (64, 'Mahendra', 'Pasuruan', 'Salaludin Ihza Mahendra', 'BCA', '1991456363', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (65, 'Mahi', 'Pasuruan', 'Yusuf Almahi', 'BCA', '0891545303', 'bestalmahi@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (66, 'Maisur', 'Kediri', 'Muhammad Shofiyulloh', 'BCA', '332450512', 'muhammadmaisur8@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (67, 'Meryta', 'Sidoarjo', 'Meryta Syane', 'BCA', '4290830341', 'fotoindongmei@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (68, 'Miqdad', 'Pasuruan', 'Salman Miqdad Al Mahdi', 'BCA', '1991424976', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (69, 'Nabilah', 'Malang', 'Harida Nabilah', 'BCA', '3151365637', 'haridanabilah08@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (70, 'Naufal', 'Surabaya', 'Muhammad Naufal Firdausy', 'BCA', '1880621315', 'naufalfirdaus25@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (71, 'Nicco', 'Mojokerto', 'Nicco Ryantino', 'BCA', '3151252352', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (72, 'Nivia', 'Malang', 'Nivia Widiastutik', 'Mandiri', '1440017318855', '', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (73, 'Pandu', 'Sidoarjo', 'Mochamad Pandu Wibisono', 'BCA', '1520599441', 'panduwibison@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (74, 'Qiqi', 'Malang', 'Rifqi Fadillah', 'BCA', '3151804894', 'hello.rifqifadillah@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (75, 'Rafidhan', 'Malang', 'Rafidhan Azmifalah Nurri', 'BCA', '1991616221', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (76, 'Ratih', 'Malang', 'Ratih Sukmaresi', 'BCA', '8610736531', 'raatiih88@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (77, 'Repo', 'Sidoarjo', 'Ferro Jala Satria', 'BCA', '0183165272', 'ferrojalasatria@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (78, 'Resti', 'Sidoarjo', 'Indira Resty Ardhana', 'BCA', '4650745863', 'restiardhanaa@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (79, 'Reyhan', 'Surabaya', 'Reyhan Afif Mahendra', 'BCA', '6720527063', 'reyhanafifm24@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (80, 'Rezza Abi', '', 'Rezza Abi Utomo', 'BCA', '4390937143', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (81, 'Rico', 'Kediri', 'Rico Yusmario', 'BCA', '1400990308', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (82, 'Ridho', 'Malang', 'Muhammad Ridho Ramadhan', 'BCA', '891868447', 'datajagat06@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (83, 'Rifki', 'Gresik', 'M. Rifki Firdani', 'BCA', '1501184247', 'muhammadrifkifirdani@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (84, 'Rifqi', 'Malang', 'Rifqi Wahyu Roziqin', 'BCA', '8160867524', 'rifqiwhy@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (85, 'Rika', 'Malang', 'Rika Farida', 'BCA', '0115154155', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (86, 'Rilo', 'Pasuruan', 'M. Zanuar Rilo Pambudi', 'BCA', '4111111787', 'rilopambudi503@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (87, 'Riqi', 'Pasuruan', 'Thoriqi Hidayah', 'BCA', '8945300074', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (88, 'Risyad', 'Malang', 'Muhammad Risyad Nuruddin', 'BCA', '5272010676', '', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (89, 'Riyan', '', 'Triyanto Jiwandono', 'Mandiri', '1780002996300', 'triyantojiwandono@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (90, 'Rizki Alifian', 'Kediri', 'Rizki Alifian S', 'BCA', '332657591', 'rizki.alifian46@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (91, 'Roby', 'Surabaya', 'Roby Fathoni', 'BCA', '7900817384', 'robyfathoni17@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (92, 'Sabiq', 'Jember', 'Imam Ibnu Sabiq', 'BCA', '241386740', 'kexiememories@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (93, 'Sandy', '', 'Sandy Yudha Masdharul W', 'BCA', '8161588091', '', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (94, 'Sechan', 'Kediri', 'Sechan El Arif', 'BRI', '320401004132507', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (95, 'Septa', 'Kediri', 'Septa Ady Putra Perd', 'Mandiri', '1710011064113', 'septaady@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (96, 'Shinta', 'Malang', 'Shinta Permata Sari', 'BRI', '648801039100', 'shintapermata301202@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (97, 'Syifa', 'Malang', 'Muhammad Syifa\'', 'BSI', '7310751892', 'syf.nrd@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (98, 'Trio', 'Gresik', 'Trio Saputra', 'BCA', '3301143573', 'trioputra250702@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (99, 'Tyo', 'Sidoarjo', 'R. Nityo Satwiko', 'BCA', '2711599039', 'memorabersama@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (100, 'Ulul', 'Lamongan', 'M. Ulul Azmi', 'BCA', '3301523945', 'ulula6637@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (101, 'Ulul', 'Lamongan', 'M. Ulul A', 'BCA', '3301523945', 'ulula6637@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (102, 'Vian', 'Jember', 'Moch. Aliefian Dwi P', 'BCA', '3320616211', 'mochammad.alifian@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (103, 'Wicahya', 'Malang', 'Luthfan Huda Wicakya', 'BRI', '028201058455504', 'luthfanzero2@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (104, 'Yanu', 'Pasuruan', 'Ahmad Yanuar Maulana', 'BCA', '8945141715', '-', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (105, 'Yori', 'Malang', 'Yori Garcia', 'BCA', '8600677242', '', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (106, 'Yusuf', 'Solo', 'Muhammad Yusuf Zakaria', 'BCA', '3931190324', 'yusuf.zakariazahir@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (107, 'Zalfa', 'Malang', 'Zalfa Rossana', 'Mandiri', '1440017953669', '', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (108, 'Yudha Jbr', 'Jember', '', '', '', '', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (109, 'Adil', 'Malang', 'Nibrasul Adil', 'BLU', '0028 6275 8967 ', 'adilnibrasul@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');
INSERT INTO `m_freelances` VALUES (110, 'Yahya', 'Malang', 'Lailatul Mufidayatus', 'BCA', '3310838488', 'yahzujks18@gmail.com', '2026-01-16 06:38:59', '2026-01-16 06:38:59');

-- ----------------------------
-- Table structure for m_services
-- ----------------------------
DROP TABLE IF EXISTS `m_services`;
CREATE TABLE `m_services`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `package` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `duration` double NULL DEFAULT NULL,
  `price` decimal(10, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 449 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_services
-- ----------------------------
INSERT INTO `m_services` VALUES (225, 'Surabaya', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (226, 'Surabaya', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (227, 'Surabaya', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (228, 'Surabaya', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (229, 'Surabaya', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (230, 'Surabaya', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (231, 'Surabaya', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (232, 'Surabaya', 'Couple B', 1.5, 600000);
INSERT INTO `m_services` VALUES (233, 'Surabaya', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (234, 'Surabaya', 'Group One', 1.5, 700000);
INSERT INTO `m_services` VALUES (235, 'Surabaya', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (236, 'Surabaya', 'Photo + Video', 1.5, 1100000);
INSERT INTO `m_services` VALUES (237, 'Surabaya', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (238, 'Surabaya', 'Photo + MUA', 1, 950000);
INSERT INTO `m_services` VALUES (239, 'Malang', 'Family A', 1, 375000);
INSERT INTO `m_services` VALUES (240, 'Malang', 'Family B', 1, 350000);
INSERT INTO `m_services` VALUES (241, 'Malang', 'Family C', 1, 300000);
INSERT INTO `m_services` VALUES (242, 'Malang', 'Exclusive One', 5, 2800000);
INSERT INTO `m_services` VALUES (243, 'Malang', 'Exclusive Two', 1, 550000);
INSERT INTO `m_services` VALUES (244, 'Malang', 'Exclusive Three', 1, 425000);
INSERT INTO `m_services` VALUES (245, 'Malang', 'Couple A', 2, 700000);
INSERT INTO `m_services` VALUES (246, 'Malang', 'Couple B', 1.5, 575000);
INSERT INTO `m_services` VALUES (247, 'Malang', 'Elite Group', 2, 1100000);
INSERT INTO `m_services` VALUES (248, 'Malang', 'Group One', 1.5, 675000);
INSERT INTO `m_services` VALUES (249, 'Malang', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (250, 'Malang', 'Photo + Video', 1.5, 1050000);
INSERT INTO `m_services` VALUES (251, 'Malang', 'Photo + Mini Box', 1, 500000);
INSERT INTO `m_services` VALUES (252, 'Malang', 'Photo + MUA', 1, 850000);
INSERT INTO `m_services` VALUES (253, 'Kediri', 'Family A', 1, 375000);
INSERT INTO `m_services` VALUES (254, 'Kediri', 'Family B', 1, 350000);
INSERT INTO `m_services` VALUES (255, 'Kediri', 'Family C', 1, 300000);
INSERT INTO `m_services` VALUES (256, 'Kediri', 'Exclusive One', 5, 2800000);
INSERT INTO `m_services` VALUES (257, 'Kediri', 'Exclusive Two', 1, 550000);
INSERT INTO `m_services` VALUES (258, 'Kediri', 'Exclusive Three', 1, 425000);
INSERT INTO `m_services` VALUES (259, 'Kediri', 'Couple A', 2, 700000);
INSERT INTO `m_services` VALUES (260, 'Kediri', 'Couple B', 1.5, 575000);
INSERT INTO `m_services` VALUES (261, 'Kediri', 'Elite Group', 2, 1100000);
INSERT INTO `m_services` VALUES (262, 'Kediri', 'Group One', 1.5, 675000);
INSERT INTO `m_services` VALUES (263, 'Kediri', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (264, 'Kediri', 'Photo + Video', 1.5, 1050000);
INSERT INTO `m_services` VALUES (265, 'Kediri', 'Photo + Mini Box', 1, 500000);
INSERT INTO `m_services` VALUES (266, 'Kediri', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (267, 'Madura', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (268, 'Madura', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (269, 'Madura', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (270, 'Madura', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (271, 'Madura', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (272, 'Madura', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (273, 'Madura', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (274, 'Madura', 'Couple B', 1.5, 600000);
INSERT INTO `m_services` VALUES (275, 'Madura', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (276, 'Madura', 'Group One', 1.5, 700000);
INSERT INTO `m_services` VALUES (277, 'Madura', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (278, 'Madura', 'Photo + Video', 1.5, 1100000);
INSERT INTO `m_services` VALUES (279, 'Madura', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (280, 'Madura', 'Photo + MUA', 1, 950000);
INSERT INTO `m_services` VALUES (281, 'Tulungagung', 'Family A', 1, 375000);
INSERT INTO `m_services` VALUES (282, 'Tulungagung', 'Family B', 1, 350000);
INSERT INTO `m_services` VALUES (283, 'Tulungagung', 'Family C', 1, 300000);
INSERT INTO `m_services` VALUES (284, 'Tulungagung', 'Exclusive One', 5, 2800000);
INSERT INTO `m_services` VALUES (285, 'Tulungagung', 'Exclusive Two', 1, 550000);
INSERT INTO `m_services` VALUES (286, 'Tulungagung', 'Exclusive Three', 1, 425000);
INSERT INTO `m_services` VALUES (287, 'Tulungagung', 'Couple A', 2, 700000);
INSERT INTO `m_services` VALUES (288, 'Tulungagung', 'Couple B', 1.5, 575000);
INSERT INTO `m_services` VALUES (289, 'Tulungagung', 'Elite Group', 2, 1100000);
INSERT INTO `m_services` VALUES (290, 'Tulungagung', 'Group One', 1.5, 675000);
INSERT INTO `m_services` VALUES (291, 'Tulungagung', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (292, 'Tulungagung', 'Photo + Video', 1.5, 1050000);
INSERT INTO `m_services` VALUES (293, 'Tulungagung', 'Photo + Mini Box', 1, 500000);
INSERT INTO `m_services` VALUES (294, 'Tulungagung', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (295, 'Lamongan', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (296, 'Lamongan', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (297, 'Lamongan', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (298, 'Lamongan', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (299, 'Lamongan', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (300, 'Lamongan', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (301, 'Lamongan', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (302, 'Lamongan', 'Couple B', 1.5, 600000);
INSERT INTO `m_services` VALUES (303, 'Lamongan', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (304, 'Lamongan', 'Group One', 1.5, 700000);
INSERT INTO `m_services` VALUES (305, 'Lamongan', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (306, 'Lamongan', 'Photo + Video', 1.5, 1100000);
INSERT INTO `m_services` VALUES (307, 'Lamongan', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (308, 'Lamongan', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (309, 'Gresik', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (310, 'Gresik', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (311, 'Gresik', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (312, 'Gresik', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (313, 'Gresik', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (314, 'Gresik', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (315, 'Gresik', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (316, 'Gresik', 'Couple B', 1.5, 600000);
INSERT INTO `m_services` VALUES (317, 'Gresik', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (318, 'Gresik', 'Group One', 1.5, 700000);
INSERT INTO `m_services` VALUES (319, 'Gresik', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (320, 'Gresik', 'Photo + Video', 1.5, 1100000);
INSERT INTO `m_services` VALUES (321, 'Gresik', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (322, 'Gresik', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (323, 'Blitar', 'Family A', 1, 375000);
INSERT INTO `m_services` VALUES (324, 'Blitar', 'Family B', 1, 350000);
INSERT INTO `m_services` VALUES (325, 'Blitar', 'Family C', 1, 300000);
INSERT INTO `m_services` VALUES (326, 'Blitar', 'Exclusive One', 5, 2800000);
INSERT INTO `m_services` VALUES (327, 'Blitar', 'Exclusive Two', 1, 550000);
INSERT INTO `m_services` VALUES (328, 'Blitar', 'Exclusive Three', 1, 425000);
INSERT INTO `m_services` VALUES (329, 'Blitar', 'Couple A', 2, 700000);
INSERT INTO `m_services` VALUES (330, 'Blitar', 'Couple B', 1.5, 575000);
INSERT INTO `m_services` VALUES (331, 'Blitar', 'Elite Group', 2, 1100000);
INSERT INTO `m_services` VALUES (332, 'Blitar', 'Group One', 1.5, 675000);
INSERT INTO `m_services` VALUES (333, 'Blitar', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (334, 'Blitar', 'Photo + Video', 1.5, 1050000);
INSERT INTO `m_services` VALUES (335, 'Blitar', 'Photo + Mini Box', 1, 500000);
INSERT INTO `m_services` VALUES (336, 'Blitar', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (337, 'Pasuruan', 'Family A', 1, 375000);
INSERT INTO `m_services` VALUES (338, 'Pasuruan', 'Family B', 1, 350000);
INSERT INTO `m_services` VALUES (339, 'Pasuruan', 'Family C', 1, 300000);
INSERT INTO `m_services` VALUES (340, 'Pasuruan', 'Exclusive One', 5, 2800000);
INSERT INTO `m_services` VALUES (341, 'Pasuruan', 'Exclusive Two', 1, 550000);
INSERT INTO `m_services` VALUES (342, 'Pasuruan', 'Exclusive Three', 1, 425000);
INSERT INTO `m_services` VALUES (343, 'Pasuruan', 'Couple A', 2, 700000);
INSERT INTO `m_services` VALUES (344, 'Pasuruan', 'Couple B', 1.5, 575000);
INSERT INTO `m_services` VALUES (345, 'Pasuruan', 'Elite Group', 2, 1100000);
INSERT INTO `m_services` VALUES (346, 'Pasuruan', 'Group One', 1.5, 675000);
INSERT INTO `m_services` VALUES (347, 'Pasuruan', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (348, 'Pasuruan', 'Photo + Video', 1.5, 1050000);
INSERT INTO `m_services` VALUES (349, 'Pasuruan', 'Photo + Mini Box', 1, 500000);
INSERT INTO `m_services` VALUES (350, 'Pasuruan', 'Photo + MUA', 1, 850000);
INSERT INTO `m_services` VALUES (351, 'Sidoarjo', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (352, 'Sidoarjo', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (353, 'Sidoarjo', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (354, 'Sidoarjo', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (355, 'Sidoarjo', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (356, 'Sidoarjo', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (357, 'Sidoarjo', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (358, 'Sidoarjo', 'Couple B', 1.5, 600000);
INSERT INTO `m_services` VALUES (359, 'Sidoarjo', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (360, 'Sidoarjo', 'Group One', 1.5, 700000);
INSERT INTO `m_services` VALUES (361, 'Sidoarjo', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (362, 'Sidoarjo', 'Photo + Video', 1.5, 1100000);
INSERT INTO `m_services` VALUES (363, 'Sidoarjo', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (364, 'Sidoarjo', 'Photo + MUA', 1, 950000);
INSERT INTO `m_services` VALUES (365, 'Jember', 'Family A', 1, 375000);
INSERT INTO `m_services` VALUES (366, 'Jember', 'Family B', 1, 350000);
INSERT INTO `m_services` VALUES (367, 'Jember', 'Family C', 1, 300000);
INSERT INTO `m_services` VALUES (368, 'Jember', 'Exclusive One', 5, 2800000);
INSERT INTO `m_services` VALUES (369, 'Jember', 'Exclusive Two', 1, 550000);
INSERT INTO `m_services` VALUES (370, 'Jember', 'Exclusive Three', 1, 425000);
INSERT INTO `m_services` VALUES (371, 'Jember', 'Couple A', 2, 700000);
INSERT INTO `m_services` VALUES (372, 'Jember', 'Couple B', 1.5, 575000);
INSERT INTO `m_services` VALUES (373, 'Jember', 'Elite Group', 2, 1100000);
INSERT INTO `m_services` VALUES (374, 'Jember', 'Group One', 1.5, 675000);
INSERT INTO `m_services` VALUES (375, 'Jember', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (376, 'Jember', 'Photo + Video', 1.5, 1050000);
INSERT INTO `m_services` VALUES (377, 'Jember', 'Photo + Mini Box', 1, 500000);
INSERT INTO `m_services` VALUES (378, 'Jember', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (379, 'Semarang', 'Family A', 1, 375000);
INSERT INTO `m_services` VALUES (380, 'Semarang', 'Family B', 1, 350000);
INSERT INTO `m_services` VALUES (381, 'Semarang', 'Family C', 1, 300000);
INSERT INTO `m_services` VALUES (382, 'Semarang', 'Exclusive One', 5, 2800000);
INSERT INTO `m_services` VALUES (383, 'Semarang', 'Exclusive Two', 1, 550000);
INSERT INTO `m_services` VALUES (384, 'Semarang', 'Exclusive Three', 1, 425000);
INSERT INTO `m_services` VALUES (385, 'Semarang', 'Couple A', 2, 700000);
INSERT INTO `m_services` VALUES (386, 'Semarang', 'Couple B', 1.5, 575000);
INSERT INTO `m_services` VALUES (387, 'Semarang', 'Elite Group', 2, 1100000);
INSERT INTO `m_services` VALUES (388, 'Semarang', 'Group One', 1.5, 675000);
INSERT INTO `m_services` VALUES (389, 'Semarang', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (390, 'Semarang', 'Photo + Video', 1.5, 1050000);
INSERT INTO `m_services` VALUES (391, 'Semarang', 'Photo + Mini Box', 1, 500000);
INSERT INTO `m_services` VALUES (392, 'Semarang', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (393, 'Bandung', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (394, 'Bandung', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (395, 'Bandung', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (396, 'Bandung', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (397, 'Bandung', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (398, 'Bandung', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (399, 'Bandung', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (400, 'Bandung', 'Couple B', 1.5, 600000);
INSERT INTO `m_services` VALUES (401, 'Bandung', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (402, 'Bandung', 'Group One', 1.5, 700000);
INSERT INTO `m_services` VALUES (403, 'Bandung', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (404, 'Bandung', 'Photo + Video', 1.5, 1100000);
INSERT INTO `m_services` VALUES (405, 'Bandung', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (406, 'Bandung', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (407, 'Jakarta', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (408, 'Jakarta', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (409, 'Jakarta', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (410, 'Jakarta', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (411, 'Jakarta', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (412, 'Jakarta', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (413, 'Jakarta', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (414, 'Jakarta', 'Couple B', 1.5, 600000);
INSERT INTO `m_services` VALUES (415, 'Jakarta', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (416, 'Jakarta', 'Group One', 1.5, 700000);
INSERT INTO `m_services` VALUES (417, 'Jakarta', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (418, 'Jakarta', 'Photo + Video', 1.5, 1100000);
INSERT INTO `m_services` VALUES (419, 'Jakarta', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (420, 'Jakarta', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (421, 'Solo', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (422, 'Solo', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (423, 'Solo', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (424, 'Solo', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (425, 'Solo', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (426, 'Solo', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (427, 'Solo', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (428, 'Solo', 'Couple B', 1.5, 600000);
INSERT INTO `m_services` VALUES (429, 'Solo', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (430, 'Solo', 'Group One', 1.5, 700000);
INSERT INTO `m_services` VALUES (431, 'Solo', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (432, 'Solo', 'Photo + Video', 1.5, 1100000);
INSERT INTO `m_services` VALUES (433, 'Solo', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (434, 'Solo', 'Photo + MUA', 1, 950000);
INSERT INTO `m_services` VALUES (435, 'Jogja', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (436, 'Jogja', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (437, 'Jogja', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (438, 'Jogja', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (439, 'Jogja', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (440, 'Jogja', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (441, 'Jogja', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (442, 'Jogja', 'Couple B', 1.5, 600000);
INSERT INTO `m_services` VALUES (443, 'Jogja', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (444, 'Jogja', 'Group One', 1.5, 700000);
INSERT INTO `m_services` VALUES (445, 'Jogja', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (446, 'Jogja', 'Photo + Video', 1.5, 1100000);
INSERT INTO `m_services` VALUES (447, 'Jogja', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (448, 'Jogja', 'Photo + MUA', 1, 950000);

-- ----------------------------
-- Table structure for m_universities
-- ----------------------------
DROP TABLE IF EXISTS `m_universities`;
CREATE TABLE `m_universities`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `university` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 165 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_universities
-- ----------------------------
INSERT INTO `m_universities` VALUES (83, 'ITB', 'Bandung');
INSERT INTO `m_universities` VALUES (84, 'UMG', 'Gresik');
INSERT INTO `m_universities` VALUES (85, 'UI', 'Jakarta');
INSERT INTO `m_universities` VALUES (86, 'POLIJE', 'Jember');
INSERT INTO `m_universities` VALUES (87, 'UINKHAS', 'Jember');
INSERT INTO `m_universities` VALUES (88, 'UNEJ', 'Jember');
INSERT INTO `m_universities` VALUES (89, 'Universitas dr Soebandi', 'Jember');
INSERT INTO `m_universities` VALUES (90, 'UNMUH', 'Jember');
INSERT INTO `m_universities` VALUES (91, 'UT JBR', 'Jember');
INSERT INTO `m_universities` VALUES (92, 'IAIN KDR', 'Kediri');
INSERT INTO `m_universities` VALUES (93, 'IIK BW', 'Kediri');
INSERT INTO `m_universities` VALUES (94, 'STIKES Karya Husada Kediri', 'Kediri');
INSERT INTO `m_universities` VALUES (95, 'UINSW', 'Kediri');
INSERT INTO `m_universities` VALUES (96, 'UNISKA', 'Kediri');
INSERT INTO `m_universities` VALUES (97, 'Universitas Islam Tribakti Lirboyo', 'Kediri');
INSERT INTO `m_universities` VALUES (98, 'UNIWA', 'Kediri');
INSERT INTO `m_universities` VALUES (99, 'UNP KEDIRI', 'Kediri');
INSERT INTO `m_universities` VALUES (100, 'UTM', 'Madura');
INSERT INTO `m_universities` VALUES (101, 'Intitut Teknologi dan Bisnis Asia Malang', 'Malang');
INSERT INTO `m_universities` VALUES (102, 'ITN MLG', 'Malang');
INSERT INTO `m_universities` VALUES (103, 'MACHUNG', 'Malang');
INSERT INTO `m_universities` VALUES (104, 'POLINEMA', 'Malang');
INSERT INTO `m_universities` VALUES (105, 'POLKESMA', 'Malang');
INSERT INTO `m_universities` VALUES (106, 'POLTEKBANG', 'Malang');
INSERT INTO `m_universities` VALUES (107, 'STIE Indonesia Malang', 'Malang');
INSERT INTO `m_universities` VALUES (108, 'STIE Malangkucecwara', 'Malang');
INSERT INTO `m_universities` VALUES (109, 'UB', 'Malang');
INSERT INTO `m_universities` VALUES (110, 'UINMA', 'Malang');
INSERT INTO `m_universities` VALUES (111, 'UM', 'Malang');
INSERT INTO `m_universities` VALUES (112, 'UMM', 'Malang');
INSERT INTO `m_universities` VALUES (113, 'UMSU', 'Malang');
INSERT INTO `m_universities` VALUES (114, 'UNISMA', 'Malang');
INSERT INTO `m_universities` VALUES (115, 'Universitas Widyagama Malang', 'Malang');
INSERT INTO `m_universities` VALUES (116, 'Universitas Wisnuwardhana Malang', 'Malang');
INSERT INTO `m_universities` VALUES (117, 'UNMER', 'Malang');
INSERT INTO `m_universities` VALUES (118, 'UT MLG', 'Malang');
INSERT INTO `m_universities` VALUES (119, 'STIE Gempol', 'Pasuruan');
INSERT INTO `m_universities` VALUES (120, 'STIKES Ar Rahma Pasuruan', 'Pasuruan');
INSERT INTO `m_universities` VALUES (121, 'UNDIP', 'Semarang');
INSERT INTO `m_universities` VALUES (122, 'UNNES', 'Semarang');
INSERT INTO `m_universities` VALUES (123, 'UMSIDA', 'Sidoarjo');
INSERT INTO `m_universities` VALUES (124, 'AKFAR SBY', 'Surabaya');
INSERT INTO `m_universities` VALUES (125, 'IKBIS', 'Surabaya');
INSERT INTO `m_universities` VALUES (126, 'ITS', 'Surabaya');
INSERT INTO `m_universities` VALUES (127, 'NAROTAMA', 'Surabaya');
INSERT INTO `m_universities` VALUES (128, 'PENS', 'Surabaya');
INSERT INTO `m_universities` VALUES (129, 'POLKESBAYA', 'Surabaya');
INSERT INTO `m_universities` VALUES (130, 'POLTEKPEL', 'Surabaya');
INSERT INTO `m_universities` VALUES (131, 'PPNS', 'Surabaya');
INSERT INTO `m_universities` VALUES (132, 'STIE IBMT', 'Surabaya');
INSERT INTO `m_universities` VALUES (133, 'STIE Indonesia Surabaya', 'Surabaya');
INSERT INTO `m_universities` VALUES (134, 'STIE MAHARDHIKA', 'Surabaya');
INSERT INTO `m_universities` VALUES (135, 'STIE PERBANAS', 'Surabaya');
INSERT INTO `m_universities` VALUES (136, 'STIKES Hang Tuah Surabaya', 'Surabaya');
INSERT INTO `m_universities` VALUES (137, 'STIKES Katolik St. Vincentius A Paulo Surabaya', 'Surabaya');
INSERT INTO `m_universities` VALUES (138, 'STIKES YRSDS', 'Surabaya');
INSERT INTO `m_universities` VALUES (139, 'TELYU', 'Surabaya');
INSERT INTO `m_universities` VALUES (140, 'UBAYA', 'Surabaya');
INSERT INTO `m_universities` VALUES (141, 'UBHARA', 'Surabaya');
INSERT INTO `m_universities` VALUES (142, 'UC', 'Surabaya');
INSERT INTO `m_universities` VALUES (143, 'UHT', 'Surabaya');
INSERT INTO `m_universities` VALUES (144, 'UINSA', 'Surabaya');
INSERT INTO `m_universities` VALUES (145, 'UKP', 'Surabaya');
INSERT INTO `m_universities` VALUES (146, 'UKWMS', 'Surabaya');
INSERT INTO `m_universities` VALUES (147, 'UMSU', 'Surabaya');
INSERT INTO `m_universities` VALUES (148, 'UNAIR', 'Surabaya');
INSERT INTO `m_universities` VALUES (149, 'UNESA', 'Surabaya');
INSERT INTO `m_universities` VALUES (150, 'UNIPA', 'Surabaya');
INSERT INTO `m_universities` VALUES (151, 'UNITOMO', 'Surabaya');
INSERT INTO `m_universities` VALUES (152, 'Universitas Widya Kartika Surabaya', 'Surabaya');
INSERT INTO `m_universities` VALUES (153, 'Universitas WR Supratman Surabaya', 'Surabaya');
INSERT INTO `m_universities` VALUES (154, 'UNMER', 'Surabaya');
INSERT INTO `m_universities` VALUES (155, 'UNSURI', 'Surabaya');
INSERT INTO `m_universities` VALUES (156, 'UNTAG', 'Surabaya');
INSERT INTO `m_universities` VALUES (157, 'UNUSA', 'Surabaya');
INSERT INTO `m_universities` VALUES (158, 'UPH', 'Surabaya');
INSERT INTO `m_universities` VALUES (159, 'UPNVJT', 'Surabaya');
INSERT INTO `m_universities` VALUES (160, 'UT SBY', 'Surabaya');
INSERT INTO `m_universities` VALUES (161, 'UWKS', 'Surabaya');
INSERT INTO `m_universities` VALUES (162, 'UWP', 'Surabaya');
INSERT INTO `m_universities` VALUES (163, 'UINSATU', 'Tulungagung');
INSERT INTO `m_universities` VALUES (164, 'Universitas Bhinneka PGRI', 'Tulungagung');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` VALUES (3, '0001_01_01_000002_create_jobs_table', 1);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `permission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for project_status_logs
-- ----------------------------
DROP TABLE IF EXISTS `project_status_logs`;
CREATE TABLE `project_status_logs`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NULL DEFAULT NULL,
  `old_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `new_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `changed_by` int NULL DEFAULT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of project_status_logs
-- ----------------------------

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id`) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('3EAdYzEfdKbRXuxuxopaPuy8b2As8OuHJcwfGp62', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:147.0) Gecko/20100101 Firefox/147.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoid0p1aEFMcnozN3hrSHBra0tyc2hFODkxRUhYZENnR2lhemhjcUJKNiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjczOiJodHRwOi8vbG9jYWxob3N0L3Bob3RvYWRtaW4vcHVibGljL292ZXJ2aWV3L3Bob3RvZ3JhcGhlci1ldmVudHM/eWVhcj0yMDI2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NzAzODM2ODU7fX0=', 1770383685);
INSERT INTO `sessions` VALUES ('AfB76VOLhxqVhRuGo17Mjd0kBBRelg6qgisW6qDX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:147.0) Gecko/20100101 Firefox/147.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUGVqQzl0R1lpeFp2NGVrNWxOYTBvRjI3dDRySGZKTzhLbUxScEJDSiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MzoiaHR0cDovL2xvY2FsaG9zdC9waG90b2FkbWluL3B1YmxpYy9wcm9qZWN0cyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vbG9jYWxob3N0L3Bob3RvYWRtaW4vcHVibGljL3Byb2plY3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1770383672);
INSERT INTO `sessions` VALUES ('Bcq2BjMNNntSz8Ii2LbsmaO3LOv4kD0YGtJ4G8M6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:147.0) Gecko/20100101 Firefox/147.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoickhHNGRzc0ZyenhmaVpmbDdkWmpyQzBhQTBTZjZhaUdoNWdYTFhzcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly9sb2NhbGhvc3QvcGhvdG9hZG1pbi9wdWJsaWMvZXNva2hhcmkvMjAyNjAyMjcvaGVuZHJhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1770386179);
INSERT INTO `sessions` VALUES ('CfznauxvakFOKTnvfrzSurYrEQUgLdyXy7kkaCDl', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:147.0) Gecko/20100101 Firefox/147.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoib0dmYU1HWUVFZFBrVzV0dWdaQkRMRWJhQUhWeHBUZlNFNEM0NzFqeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3QvcGhvdG9hZG1pbi9wdWJsaWMvcHJvamVjdHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc3MDM4MzcwNzt9fQ==', 1770389626);
INSERT INTO `sessions` VALUES ('xkBUXMiF0oH7hLnR7D9xyjO0ktemdaCtUFIR7Xvp', 35, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:147.0) Gecko/20100101 Firefox/147.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiT214M2ZDQnhuUndzRFVQNE9maWhEdVZWTTNUQUJ5Q2J4Z01zajk4TiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3QvcGhvdG9hZG1pbi9wdWJsaWMvcHJvamVjdHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozNTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NzAzODQ1MjI7fX0=', 1770390559);

-- ----------------------------
-- Table structure for t_clients
-- ----------------------------
DROP TABLE IF EXISTS `t_clients`;
CREATE TABLE `t_clients`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `shortname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_clients
-- ----------------------------
INSERT INTO `t_clients` VALUES (3, 'Mahendra', 'Hendra', '082111414954', NULL, 'UB', NULL, NULL, '2026-01-12 15:38:03', '2026-01-12 15:38:03');
INSERT INTO `t_clients` VALUES (5, 'Mukhammad Fakhriza Ihza Mahendra', 'Hendra', '082111454214', 'mfimahendra', NULL, NULL, NULL, '2026-01-16 03:54:58', '2026-01-16 03:54:58');
INSERT INTO `t_clients` VALUES (6, 'Salwa Zhafira', 'Salwa', '08156155', 'salwazpw', NULL, NULL, NULL, '2026-01-19 14:29:17', '2026-02-01 12:08:12');
INSERT INTO `t_clients` VALUES (11, 'tes', 'test', '156161', 'tes', NULL, NULL, NULL, '2026-01-19 14:42:03', '2026-01-19 14:42:03');
INSERT INTO `t_clients` VALUES (12, 'Salwa Zhafira', 'salwa', '21312412', 'salwazpw', NULL, NULL, NULL, '2026-01-29 14:17:08', '2026-01-29 14:17:08');
INSERT INTO `t_clients` VALUES (13, 'Salwa Zhafira', 'salwa', '123214124', 'salwazpw', NULL, NULL, NULL, '2026-01-29 14:20:25', '2026-01-29 14:20:25');
INSERT INTO `t_clients` VALUES (14, 'testing', 'testing', '123214', 'dwadwa', NULL, NULL, NULL, '2026-01-29 14:27:52', '2026-01-29 14:27:52');
INSERT INTO `t_clients` VALUES (15, 'tawdawwd', 'tawdawwd', 'dwqed123', 'test', NULL, NULL, NULL, '2026-01-29 14:28:41', '2026-01-29 14:28:41');
INSERT INTO `t_clients` VALUES (16, 'awdawdaw', 'awdawdaw', '214314214', 'testawd', NULL, NULL, NULL, '2026-01-29 14:33:17', '2026-01-29 14:33:17');
INSERT INTO `t_clients` VALUES (17, 'Arga Puguh Pratama', 'Arga', '08990000190', '_argatama', NULL, NULL, NULL, '2026-01-30 13:56:14', '2026-01-30 13:56:14');
INSERT INTO `t_clients` VALUES (19, 'Mukhammad Fakhriza Ihza Mahendra', 'Hendra', '6282111414954', 'mfimahendra_', NULL, NULL, NULL, '2026-02-01 02:35:52', '2026-02-06 13:25:12');
INSERT INTO `t_clients` VALUES (20, 'Arga Pratama', 'Arga', '62123456789', 'argazz', NULL, NULL, NULL, '2026-02-01 02:38:41', '2026-02-01 08:07:35');
INSERT INTO `t_clients` VALUES (21, 'arga tes', 'arga', '082111414954', 'wdarwad', NULL, NULL, NULL, '2026-02-01 02:45:26', '2026-02-01 09:39:01');
INSERT INTO `t_clients` VALUES (22, 'Hentong Markitong', 'Hentong', '6285126125', 'mfahentong', NULL, NULL, NULL, '2026-02-01 08:46:47', '2026-02-01 08:50:20');

-- ----------------------------
-- Table structure for t_invoices
-- ----------------------------
DROP TABLE IF EXISTS `t_invoices`;
CREATE TABLE `t_invoices`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NULL DEFAULT NULL,
  `invoice_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `issue_date` date NULL DEFAULT NULL,
  `due_date` date NULL DEFAULT NULL,
  `subtotal` decimal(10, 2) NULL DEFAULT NULL,
  `discount` float NULL DEFAULT NULL,
  `tax` decimal(10, 2) NULL DEFAULT NULL,
  `total_amount` decimal(10, 2) NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_invoices
-- ----------------------------

-- ----------------------------
-- Table structure for t_payments
-- ----------------------------
DROP TABLE IF EXISTS `t_payments`;
CREATE TABLE `t_payments`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice_id` int NULL DEFAULT NULL,
  `payment_date` date NULL DEFAULT NULL,
  `amount` decimal(10, 2) NULL DEFAULT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `reference_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_payments
-- ----------------------------

-- ----------------------------
-- Table structure for t_project_additionals
-- ----------------------------
DROP TABLE IF EXISTS `t_project_additionals`;
CREATE TABLE `t_project_additionals`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NULL DEFAULT NULL,
  `additional_id` int NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price` decimal(10, 0) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_project_additionals
-- ----------------------------
INSERT INTO `t_project_additionals` VALUES (1, 8, 2, 'Extra (duo/group) 30 mins', 200000, '2026-01-19 14:42:03');
INSERT INTO `t_project_additionals` VALUES (2, 8, 3, 'Extra Edit (5 photos)', 25000, '2026-01-19 14:42:03');
INSERT INTO `t_project_additionals` VALUES (3, 8, 47, 'Extra Member (1)', 75000, '2026-01-19 14:42:03');
INSERT INTO `t_project_additionals` VALUES (4, 15, 1, 'Extra (personal) 30 mins', 175000, '2026-01-30 13:56:14');
INSERT INTO `t_project_additionals` VALUES (19, 17, 4, 'Extra Edit (10 photos)', 50000, '2026-02-01 08:07:35');
INSERT INTO `t_project_additionals` VALUES (23, 18, 2, 'Extra (duo/group) 30 mins', 200000, '2026-02-01 09:39:01');
INSERT INTO `t_project_additionals` VALUES (25, 20, 21, 'Extra Edit (5 photos)', 25000, '2026-02-01 12:08:12');
INSERT INTO `t_project_additionals` VALUES (26, 16, 3, 'Extra Edit (5 photos)', 25000, '2026-02-06 13:25:12');
INSERT INTO `t_project_additionals` VALUES (27, 16, 4, 'Extra Edit (10 photos)', 50000, '2026-02-06 13:25:12');

-- ----------------------------
-- Table structure for t_project_files
-- ----------------------------
DROP TABLE IF EXISTS `t_project_files`;
CREATE TABLE `t_project_files`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NULL DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_project_files
-- ----------------------------
INSERT INTO `t_project_files` VALUES (2, 16, 'all_files', 'Iki Gasido dit', '2026-02-04 14:15:53', '2026-02-04 14:15:53');
INSERT INTO `t_project_files` VALUES (3, 16, NULL, 'Iki Gasido dit', '2026-02-05 13:19:30', '2026-02-05 13:29:57');
INSERT INTO `t_project_files` VALUES (4, 17, NULL, 'Iki Gasido dit', '2026-02-05 13:28:52', '2026-02-05 13:28:52');
INSERT INTO `t_project_files` VALUES (6, 18, 'all_files', 'Iki Gasido dit tak ganti nang t_projects', '2026-02-06 13:41:37', '2026-02-06 13:44:33');
INSERT INTO `t_project_files` VALUES (7, NULL, NULL, 'Iki Gasido dit', NULL, NULL);

-- ----------------------------
-- Table structure for t_projects
-- ----------------------------
DROP TABLE IF EXISTS `t_projects`;
CREATE TABLE `t_projects`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_date` date NULL DEFAULT NULL,
  `event_time` time NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL COMMENT 'photographer',
  `client_id` int NULL DEFAULT NULL,
  `service_id` int NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `university` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `faculty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `downpayment_at` timestamp NULL DEFAULT NULL,
  `invoiced_at` timestamp NULL DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `all_filled_at` timestamp NULL DEFAULT NULL,
  `all_done_at` timestamp NULL DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_projects
-- ----------------------------
INSERT INTO `t_projects` VALUES (16, '2026-02-27', '09:00:00', 35, 19, 227, 'Surabaya', 'ITS', 'Fakultas Ilmu Komputer', 'Graduation', 'Ruang IT', 'tambah kecap', '2026-02-01 08:04:24', '2026-02-01 03:33:02', '2026-02-01 03:36:40', '2026-02-01 11:32:04', '2026-02-06 13:40:57', NULL, NULL, '2026-02-01 02:35:52', '2026-02-06 13:40:57');
INSERT INTO `t_projects` VALUES (17, '2026-02-27', '10:00:00', NULL, 20, 225, 'Surabaya', 'CINO', 'Fakultas Ilmu Komputer', 'Graduation', 'Perpus', NULL, '2026-02-01 03:47:10', '2026-02-01 03:36:42', '2026-02-01 03:36:42', NULL, NULL, NULL, NULL, '2026-02-01 02:38:41', '2026-02-06 14:12:49');
INSERT INTO `t_projects` VALUES (18, '2026-02-20', '13:00:00', 54, 21, 225, 'Surabaya', 'PENS', 'Fakultas Bahasa dan Seni', 'Graduation', 'WC Kantor', 'yepp', '2026-02-06 13:16:44', '2026-02-06 13:16:59', '2026-02-06 13:33:44', '2026-02-06 13:41:04', '2026-02-06 13:45:29', NULL, NULL, '2026-02-01 02:45:26', '2026-02-06 13:45:29');
INSERT INTO `t_projects` VALUES (19, '2026-03-25', '13:00:00', NULL, 22, 239, 'Malang', 'UB', 'Fakultas Teknik', 'Graduation', 'Pinggire Rektor', NULL, NULL, NULL, NULL, NULL, NULL, '2026-02-01 10:50:41', NULL, '2026-02-01 08:46:47', '2026-02-01 10:50:41');
INSERT INTO `t_projects` VALUES (20, '2026-04-04', '13:00:00', 35, 6, 239, 'Malang', 'POLINEMA', 'Jurusan Informatika', 'Graduation', 'Depan Gedung Rektorat', NULL, '2026-02-01 12:07:47', NULL, NULL, NULL, NULL, NULL, NULL, '2026-02-01 12:05:50', '2026-02-06 15:09:19');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'admin,photographer,editor',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 105 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'mahendra', 'mahendra', 'mfimahendra@gmail.com', '6282111414954', 'admin', '$2y$12$Na7KU0wff9hYt29kmalZd.rgoytzozawKYoZLkYf8PN4XpPO5WMCe', NULL, NULL, '2024-05-12 05:26:39', '2024-05-12 05:26:39');
INSERT INTO `users` VALUES (4, 'admin', 'admin', 'admin@admin', '6282111414954', 'admin', '$2y$12$GmRwZX1xB5vFIoaE13Tw.uPeG.D3limVO5ogY1UmzOZn3eKR2gDOe', NULL, NULL, '2024-08-25 10:27:43', '2024-08-25 10:27:43');
INSERT INTO `users` VALUES (6, 'thomi', 'thomi', 'adwawdaw@dawda', '123124514', 'admin', '$2y$12$CH5YhQuwC132Q5uDLWmK5ecWb2qaGLanjiMhX7ptOwQYFh7fQ6QJy', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (26, 'Abyan', 'Abyan Taufiiqul Hakim', 'abyanjezone345@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (27, 'Adin', 'Achmad Diya\' Addin', 'achmaddiyaaddin@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (28, 'Afis', 'Muhammad Lafif Akhid', 'afisakhid@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (29, 'Akbar', 'Akbar Dika Pratama', 'klotunal@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (30, 'Akhdan', 'Akhdan Naufarrozi', 'kokakhdancakep@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (31, 'Alfa', 'Muhammad Alfa Alfarizi', 'malfaalfarizi@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (32, 'Alif', 'Alif', 'hi.alfryz@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (33, 'Andika', 'Andika', 'kloturnal@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (34, 'Anta', 'Anta Maula Saniy', 'anta.ms123@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (35, 'Arga', 'Arga Puguh Pratama', 'argapratama845@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (36, 'Arif', 'Arif Rusman Hakim', 'ariffrusmanhakim@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (37, 'Arifin', 'Nurul Arifin', 'arifinsiregar94@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (38, 'Arup', 'Mochamad Aruf Maulana', 'sayaboecin@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (39, 'Asep', 'Septian Hadi Pratama Sasmita', 'sasmitaseptian123@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (40, 'Asyam', 'Asyam Haq', 'achmadasyam@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (41, 'Atikah', 'Atikah Husni Joban', 'atikah.j98@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (42, 'Awik', 'Dwi Wahyu Irwanto', 'awikaw13@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (43, 'Azel', 'Reyhan Azel Bagastama', 'rere.azel@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (44, 'Bayong', 'Akhmad Fadilah', 'akhmadfadilah75@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (45, 'Bima', 'Bhimo Pringga Jaya M', 'beningfotoku@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (46, 'Bintang', 'Bintang Alif', 'aliferdsyh@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (48, 'Bondan', 'Dias Faturrohman', 'bondanaldyanza@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (49, 'Damar Bagas', 'Damar Bagas Prakoso', 'damarbagasprakoso@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (50, 'Danny', 'Danny Eka Putra Prabandaru', 'ekadanny5@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (51, 'David', 'Muhammad David Iqbal Wahyudin', 'archivegraduation4@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (52, 'Dinar', 'Mochamad Dinar Yoga Pratama', 'dinaryogap@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (53, 'Dona', 'Alifia Dona Zuhaira', 'alifiadona@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (54, 'Dwiki', 'Dwiki Rikus Darmawan', 'dwikirikus@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (55, 'Dyas Eka', 'Dyas Eka', 'dyas.stywt11@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (56, 'Fafa', 'Muhammad Faishol Fathoni', 'm.faeshol.fthni@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (57, 'Faisal Julian', 'Faisal Fathqurrachman Julian', 'faisalfathqurrachmanjulian@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (58, 'Farrel', 'Farrel Putra Wardhana', 'wardhanafarrelputra76@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (59, 'Habib', 'Achmad Habib Dwi Prakoso', 'achmadhabiib@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (60, 'Hamdan', 'Moh. HamdanNafi\' Maula', 'hamdanbruizers@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (61, 'Hendra', 'Hendra Dinarta', 'hendradinarta29@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (62, 'Hilmi', 'Misbahul Hilmi Ramadan', 'ramadanhilmi22@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (63, 'Husein', 'Husein Ali Mahdawi', 'huseinali.4713@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (64, 'Ilham M', 'Ilham Ma\'ruf Ramadhan', 'ilhamm332@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (65, 'Indra', 'Newindra Yearil Jidan', 'indraraharjaamerta@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (66, 'Irsyad', 'Irsyaad Akmal Robbaanii', 'bagusivandra@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (67, 'Jetrip/Kiki', 'Mochamad Ilham Rifqi', 'jetrip006@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (68, 'Joko', 'Sujoko', 'sujoko2507@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (69, 'Kania', 'Alma Kania', 'realsky9294@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (70, 'Lian', 'Akhmad Haqqul Zulfikar', 'a910970@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (71, 'Lutfi (Upi)', 'Muchamad Lutfi Hidayat', 'loetfie33@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (72, 'Mahi', 'Yusuf Almahi', 'bestalmahi@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (73, 'Maisur', 'Muhammad Shofiyulloh', 'muhammadmaisur8@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (74, 'Meryta', 'Meryta Syane', 'fotoindongmei@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (75, 'Nabilah', 'Harida Nabilah', 'haridanabilah08@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (76, 'Naufal', 'Muhammad Naufal Firdausy', 'naufalfirdaus25@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (77, 'Pandu', 'Mochamad Pandu Wibisono', 'panduwibison@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (78, 'Qiqi', 'Rifqi Fadillah', 'hello.rifqifadillah@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (79, 'Ratih', 'Ratih Sukmaresi', 'raatiih88@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (80, 'Repo', 'Ferro Jala Satria', 'ferrojalasatria@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (81, 'Resti', 'Indira Resty Ardhana', 'restiardhanaa@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (82, 'Reyhan', 'Reyhan Afif Mahendra', 'reyhanafifm24@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (83, 'Ridho', 'Muhammad Ridho Ramadhan', 'datajagat06@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (84, 'Rifki', 'M. Rifki Firdani', 'muhammadrifkifirdani@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (85, 'Rifqi', 'Rifqi Wahyu Roziqin', 'rifqiwhy@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (86, 'Rilo', 'M. Zanuar Rilo Pambudi', 'rilopambudi503@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (87, 'Riyan', 'Triyanto Jiwandono', 'triyantojiwandono@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (88, 'Rizki Alifian', 'Rizki Alifian S', 'rizki.alifian46@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (89, 'Roby', 'Roby Fathoni', 'robyfathoni17@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (90, 'Sabiq', 'Imam Ibnu Sabiq', 'kexiememories@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (91, 'Septa', 'Septa Ady Putra Perd', 'septaady@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (92, 'Shinta', 'Shinta Permata Sari', 'shintapermata301202@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (93, 'Syifa', 'Muhammad Syifa\'', 'syf.nrd@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (94, 'Trio', 'Trio Saputra', 'trioputra250702@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (95, 'Tyo', 'R. Nityo Satwiko', 'memorabersama@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (96, 'Ulul', 'M. Ulul Azmi', 'ulula6637@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (100, 'Vian', 'Moch. Aliefian Dwi P', 'mochammad.alifian@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (101, 'Wicahya', 'Luthfan Huda Wicakya', 'luthfanzero2@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (102, 'Yusuf', 'Muhammad Yusuf Zakaria', 'yusuf.zakariazahir@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (103, 'Adil', 'Nibrasul Adil', 'adilnibrasul@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (104, 'Yahya', 'Lailatul Mufidayatus', 'yahzujks18@gmail.com', NULL, 'photographer', '$2y$12$j.IgaMAgJU/muk./4ulnGuzu8AopS4nO6fEtuUqYCHfu4r83BqgHu', NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
