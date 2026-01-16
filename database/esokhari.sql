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

 Date: 16/01/2026 11:26:56
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
) ENGINE = InnoDB AUTO_INCREMENT = 73 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_faculties
-- ----------------------------
INSERT INTO `m_faculties` VALUES (1, 'D3 Rekam Medis dan Informasi Kesehatan');
INSERT INTO `m_faculties` VALUES (2, 'Fakultas Bahasa dan Seni');
INSERT INTO `m_faculties` VALUES (3, 'Fakultas Ekonomi dan Bisnis');
INSERT INTO `m_faculties` VALUES (4, 'Fakultas Farmasi');
INSERT INTO `m_faculties` VALUES (5, 'Fakultas Hukum');
INSERT INTO `m_faculties` VALUES (6, 'Fakultas Ilmu Budaya');
INSERT INTO `m_faculties` VALUES (7, 'Fakultas Ilmu Keolahragaan');
INSERT INTO `m_faculties` VALUES (8, 'Fakultas Ilmu Kesehatan');
INSERT INTO `m_faculties` VALUES (9, 'Fakultas Ilmu Komputer');
INSERT INTO `m_faculties` VALUES (10, 'Fakultas Ilmu Komunikasi');
INSERT INTO `m_faculties` VALUES (11, 'Fakultas Ilmu Pendidikan');
INSERT INTO `m_faculties` VALUES (12, 'Fakultas Ilmu Sosial dan Ilmu Politik');
INSERT INTO `m_faculties` VALUES (13, 'Fakultas Keguruan dan Ilmu Pendidikan');
INSERT INTO `m_faculties` VALUES (14, 'Fakultas Kedokteran');
INSERT INTO `m_faculties` VALUES (15, 'Fakultas Kedokteran Gigi');
INSERT INTO `m_faculties` VALUES (16, 'Jurusan Kebidanan');
INSERT INTO `m_faculties` VALUES (17, 'Jurusan Keperawatan');
INSERT INTO `m_faculties` VALUES (18, 'Fakultas Keperawatan dan Kebidanan');
INSERT INTO `m_faculties` VALUES (19, 'Fakultas Kesehatan');
INSERT INTO `m_faculties` VALUES (20, 'Fakultas Kesehatan Masyarakat');
INSERT INTO `m_faculties` VALUES (21, 'Fakultas Matematika dan Ilmu Pendidikan Alam');
INSERT INTO `m_faculties` VALUES (22, 'Fakultas Pertanian');
INSERT INTO `m_faculties` VALUES (23, 'Fakultas Psikologi');
INSERT INTO `m_faculties` VALUES (24, 'Fakultas Robotika');
INSERT INTO `m_faculties` VALUES (25, 'Fakultas Sains dan Analitika Data');
INSERT INTO `m_faculties` VALUES (26, 'Fakultas Sains dan Teknologi');
INSERT INTO `m_faculties` VALUES (27, 'Fakultas Sosial dan Humaniora');
INSERT INTO `m_faculties` VALUES (28, 'Fakultas Tarbiyah dan Ilmu Keguruan');
INSERT INTO `m_faculties` VALUES (29, 'Fakultas Teknik');
INSERT INTO `m_faculties` VALUES (30, 'Fakultas Teknik Sipil Perencanaan dan Kebumian');
INSERT INTO `m_faculties` VALUES (31, 'Fakultas Teknologi Elektro dan Informatika Cerdas');
INSERT INTO `m_faculties` VALUES (32, 'Fakultas Teknologi Industri dan Rekayasa Sistem');
INSERT INTO `m_faculties` VALUES (33, 'Fakultas Teknologi Pertanian');
INSERT INTO `m_faculties` VALUES (34, 'Fakultas Ushuluddin Adab dan Dakwah');
INSERT INTO `m_faculties` VALUES (35, 'Fakultas Ushuluddin, Adab dan Dakwah');
INSERT INTO `m_faculties` VALUES (36, 'Fakultas Vokasi');
INSERT INTO `m_faculties` VALUES (37, 'Jurusan Manajemen');
INSERT INTO `m_faculties` VALUES (38, 'Komunikasi dan Penyiaran Islam');
INSERT INTO `m_faculties` VALUES (39, 'Prodi Kebidanan');
INSERT INTO `m_faculties` VALUES (40, 'Fakultas Gizi');
INSERT INTO `m_faculties` VALUES (41, 'Fakultas Teknik Kimia');
INSERT INTO `m_faculties` VALUES (42, 'Fakultas Ilmu Bahasa');
INSERT INTO `m_faculties` VALUES (43, 'Fakultas Ilmu Sosial');
INSERT INTO `m_faculties` VALUES (44, 'Jurusan Kesehatan Gigi');
INSERT INTO `m_faculties` VALUES (45, 'Fakultas Ilmu Administrasi');
INSERT INTO `m_faculties` VALUES (46, 'Jurusan Akuntansi');
INSERT INTO `m_faculties` VALUES (47, 'Fakultas Perikanan dan Ilmu Kelautan');
INSERT INTO `m_faculties` VALUES (48, 'Pendidikan Profesi Ners');
INSERT INTO `m_faculties` VALUES (49, 'Teknologi Laboratorium Medis');
INSERT INTO `m_faculties` VALUES (50, 'Teknik Bangunan Kapal');
INSERT INTO `m_faculties` VALUES (51, 'Jurusan Kebidanan');
INSERT INTO `m_faculties` VALUES (52, 'Pendidikan Profesi Bidan');
INSERT INTO `m_faculties` VALUES (53, 'Pascasarjana');
INSERT INTO `m_faculties` VALUES (54, 'Jurusan Teknik Elektro');
INSERT INTO `m_faculties` VALUES (55, 'Transportasi Laut');
INSERT INTO `m_faculties` VALUES (56, 'Fakultas Keperawatan');
INSERT INTO `m_faculties` VALUES (57, 'Profesi Fedokteran Gigi');
INSERT INTO `m_faculties` VALUES (58, 'Fakultas Dakwah dan Ushuluddin');
INSERT INTO `m_faculties` VALUES (59, 'Jurusan Rekam Medis dan Informasi Kesehatan');
INSERT INTO `m_faculties` VALUES (60, 'Jurusan Informatika');
INSERT INTO `m_faculties` VALUES (61, 'Fakultas Teknologi Manajemen Kesehatan');
INSERT INTO `m_faculties` VALUES (62, 'Pascasarjana Pendidikan Bahasa Indonesia');
INSERT INTO `m_faculties` VALUES (63, 'Kesehatan Lingkungan');
INSERT INTO `m_faculties` VALUES (64, 'Fakultas Dakwah');
INSERT INTO `m_faculties` VALUES (65, 'Fakultas Teknologi dan Manajemen Kesehatan');
INSERT INTO `m_faculties` VALUES (66, 'Prodi Gizi');
INSERT INTO `m_faculties` VALUES (67, 'Fakultas Pendidikan Agama Islam');
INSERT INTO `m_faculties` VALUES (68, 'Fakultas Teknik dan Sains');
INSERT INTO `m_faculties` VALUES (69, 'Fakultas Ekonomi');
INSERT INTO `m_faculties` VALUES (70, 'Pendidikan Bahasa Arab');
INSERT INTO `m_faculties` VALUES (71, 'Ekonomi dan Bisnis Islam');
INSERT INTO `m_faculties` VALUES (72, 'Fakultas Syariah');

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
  `duration` float NULL DEFAULT NULL,
  `price` decimal(10, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 225 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_services
-- ----------------------------
INSERT INTO `m_services` VALUES (1, 'Surabaya', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (2, 'Surabaya', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (3, 'Surabaya', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (4, 'Surabaya', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (5, 'Surabaya', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (6, 'Surabaya', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (7, 'Surabaya', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (8, 'Surabaya', 'Couple B', 1, 600000);
INSERT INTO `m_services` VALUES (9, 'Surabaya', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (10, 'Surabaya', 'Group One', 1, 700000);
INSERT INTO `m_services` VALUES (11, 'Surabaya', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (12, 'Surabaya', 'Photo + Video', 1, 1100000);
INSERT INTO `m_services` VALUES (13, 'Surabaya', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (14, 'Surabaya', 'Photo + MUA', 1, 950000);
INSERT INTO `m_services` VALUES (15, 'Malang', 'Family A', 1, 375000);
INSERT INTO `m_services` VALUES (16, 'Malang', 'Family B', 1, 350000);
INSERT INTO `m_services` VALUES (17, 'Malang', 'Family C', 1, 300000);
INSERT INTO `m_services` VALUES (18, 'Malang', 'Exclusive One', 5, 2800000);
INSERT INTO `m_services` VALUES (19, 'Malang', 'Exclusive Two', 1, 550000);
INSERT INTO `m_services` VALUES (20, 'Malang', 'Exclusive Three', 1, 425000);
INSERT INTO `m_services` VALUES (21, 'Malang', 'Couple A', 2, 700000);
INSERT INTO `m_services` VALUES (22, 'Malang', 'Couple B', 1, 575000);
INSERT INTO `m_services` VALUES (23, 'Malang', 'Elite Group', 2, 1100000);
INSERT INTO `m_services` VALUES (24, 'Malang', 'Group One', 1, 675000);
INSERT INTO `m_services` VALUES (25, 'Malang', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (26, 'Malang', 'Photo + Video', 1, 1050000);
INSERT INTO `m_services` VALUES (27, 'Malang', 'Photo + Mini Box', 1, 500000);
INSERT INTO `m_services` VALUES (28, 'Malang', 'Photo + MUA', 1, 850000);
INSERT INTO `m_services` VALUES (29, 'Kediri', 'Family A', 1, 375000);
INSERT INTO `m_services` VALUES (30, 'Kediri', 'Family B', 1, 350000);
INSERT INTO `m_services` VALUES (31, 'Kediri', 'Family C', 1, 300000);
INSERT INTO `m_services` VALUES (32, 'Kediri', 'Exclusive One', 5, 2800000);
INSERT INTO `m_services` VALUES (33, 'Kediri', 'Exclusive Two', 1, 550000);
INSERT INTO `m_services` VALUES (34, 'Kediri', 'Exclusive Three', 1, 425000);
INSERT INTO `m_services` VALUES (35, 'Kediri', 'Couple A', 2, 700000);
INSERT INTO `m_services` VALUES (36, 'Kediri', 'Couple B', 1, 575000);
INSERT INTO `m_services` VALUES (37, 'Kediri', 'Elite Group', 2, 1100000);
INSERT INTO `m_services` VALUES (38, 'Kediri', 'Group One', 1, 675000);
INSERT INTO `m_services` VALUES (39, 'Kediri', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (40, 'Kediri', 'Photo + Video', 1, 1050000);
INSERT INTO `m_services` VALUES (41, 'Kediri', 'Photo + Mini Box', 1, 500000);
INSERT INTO `m_services` VALUES (42, 'Kediri', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (43, 'Madura', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (44, 'Madura', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (45, 'Madura', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (46, 'Madura', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (47, 'Madura', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (48, 'Madura', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (49, 'Madura', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (50, 'Madura', 'Couple B', 1, 600000);
INSERT INTO `m_services` VALUES (51, 'Madura', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (52, 'Madura', 'Group One', 1, 700000);
INSERT INTO `m_services` VALUES (53, 'Madura', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (54, 'Madura', 'Photo + Video', 1, 1100000);
INSERT INTO `m_services` VALUES (55, 'Madura', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (56, 'Madura', 'Photo + MUA', 1, 950000);
INSERT INTO `m_services` VALUES (57, 'Tulungagung', 'Family A', 1, 375000);
INSERT INTO `m_services` VALUES (58, 'Tulungagung', 'Family B', 1, 350000);
INSERT INTO `m_services` VALUES (59, 'Tulungagung', 'Family C', 1, 300000);
INSERT INTO `m_services` VALUES (60, 'Tulungagung', 'Exclusive One', 5, 2800000);
INSERT INTO `m_services` VALUES (61, 'Tulungagung', 'Exclusive Two', 1, 550000);
INSERT INTO `m_services` VALUES (62, 'Tulungagung', 'Exclusive Three', 1, 425000);
INSERT INTO `m_services` VALUES (63, 'Tulungagung', 'Couple A', 2, 700000);
INSERT INTO `m_services` VALUES (64, 'Tulungagung', 'Couple B', 1, 575000);
INSERT INTO `m_services` VALUES (65, 'Tulungagung', 'Elite Group', 2, 1100000);
INSERT INTO `m_services` VALUES (66, 'Tulungagung', 'Group One', 1, 675000);
INSERT INTO `m_services` VALUES (67, 'Tulungagung', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (68, 'Tulungagung', 'Photo + Video', 1, 1050000);
INSERT INTO `m_services` VALUES (69, 'Tulungagung', 'Photo + Mini Box', 1, 500000);
INSERT INTO `m_services` VALUES (70, 'Tulungagung', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (71, 'Lamongan', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (72, 'Lamongan', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (73, 'Lamongan', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (74, 'Lamongan', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (75, 'Lamongan', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (76, 'Lamongan', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (77, 'Lamongan', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (78, 'Lamongan', 'Couple B', 1, 600000);
INSERT INTO `m_services` VALUES (79, 'Lamongan', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (80, 'Lamongan', 'Group One', 1, 700000);
INSERT INTO `m_services` VALUES (81, 'Lamongan', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (82, 'Lamongan', 'Photo + Video', 1, 1100000);
INSERT INTO `m_services` VALUES (83, 'Lamongan', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (84, 'Lamongan', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (85, 'Gresik', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (86, 'Gresik', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (87, 'Gresik', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (88, 'Gresik', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (89, 'Gresik', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (90, 'Gresik', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (91, 'Gresik', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (92, 'Gresik', 'Couple B', 1, 600000);
INSERT INTO `m_services` VALUES (93, 'Gresik', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (94, 'Gresik', 'Group One', 1, 700000);
INSERT INTO `m_services` VALUES (95, 'Gresik', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (96, 'Gresik', 'Photo + Video', 1, 1100000);
INSERT INTO `m_services` VALUES (97, 'Gresik', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (98, 'Gresik', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (99, 'Blitar', 'Family A', 1, 375000);
INSERT INTO `m_services` VALUES (100, 'Blitar', 'Family B', 1, 350000);
INSERT INTO `m_services` VALUES (101, 'Blitar', 'Family C', 1, 300000);
INSERT INTO `m_services` VALUES (102, 'Blitar', 'Exclusive One', 5, 2800000);
INSERT INTO `m_services` VALUES (103, 'Blitar', 'Exclusive Two', 1, 550000);
INSERT INTO `m_services` VALUES (104, 'Blitar', 'Exclusive Three', 1, 425000);
INSERT INTO `m_services` VALUES (105, 'Blitar', 'Couple A', 2, 700000);
INSERT INTO `m_services` VALUES (106, 'Blitar', 'Couple B', 1, 575000);
INSERT INTO `m_services` VALUES (107, 'Blitar', 'Elite Group', 2, 1100000);
INSERT INTO `m_services` VALUES (108, 'Blitar', 'Group One', 1, 675000);
INSERT INTO `m_services` VALUES (109, 'Blitar', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (110, 'Blitar', 'Photo + Video', 1, 1050000);
INSERT INTO `m_services` VALUES (111, 'Blitar', 'Photo + Mini Box', 1, 500000);
INSERT INTO `m_services` VALUES (112, 'Blitar', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (113, 'Pasuruan', 'Family A', 1, 375000);
INSERT INTO `m_services` VALUES (114, 'Pasuruan', 'Family B', 1, 350000);
INSERT INTO `m_services` VALUES (115, 'Pasuruan', 'Family C', 1, 300000);
INSERT INTO `m_services` VALUES (116, 'Pasuruan', 'Exclusive One', 5, 2800000);
INSERT INTO `m_services` VALUES (117, 'Pasuruan', 'Exclusive Two', 1, 550000);
INSERT INTO `m_services` VALUES (118, 'Pasuruan', 'Exclusive Three', 1, 425000);
INSERT INTO `m_services` VALUES (119, 'Pasuruan', 'Couple A', 2, 700000);
INSERT INTO `m_services` VALUES (120, 'Pasuruan', 'Couple B', 1, 575000);
INSERT INTO `m_services` VALUES (121, 'Pasuruan', 'Elite Group', 2, 1100000);
INSERT INTO `m_services` VALUES (122, 'Pasuruan', 'Group One', 1, 675000);
INSERT INTO `m_services` VALUES (123, 'Pasuruan', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (124, 'Pasuruan', 'Photo + Video', 1, 1050000);
INSERT INTO `m_services` VALUES (125, 'Pasuruan', 'Photo + Mini Box', 1, 500000);
INSERT INTO `m_services` VALUES (126, 'Pasuruan', 'Photo + MUA', 1, 850000);
INSERT INTO `m_services` VALUES (127, 'Sidoarjo', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (128, 'Sidoarjo', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (129, 'Sidoarjo', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (130, 'Sidoarjo', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (131, 'Sidoarjo', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (132, 'Sidoarjo', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (133, 'Sidoarjo', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (134, 'Sidoarjo', 'Couple B', 1, 600000);
INSERT INTO `m_services` VALUES (135, 'Sidoarjo', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (136, 'Sidoarjo', 'Group One', 1, 700000);
INSERT INTO `m_services` VALUES (137, 'Sidoarjo', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (138, 'Sidoarjo', 'Photo + Video', 1, 1100000);
INSERT INTO `m_services` VALUES (139, 'Sidoarjo', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (140, 'Sidoarjo', 'Photo + MUA', 1, 950000);
INSERT INTO `m_services` VALUES (141, 'Jember', 'Family A', 1, 375000);
INSERT INTO `m_services` VALUES (142, 'Jember', 'Family B', 1, 350000);
INSERT INTO `m_services` VALUES (143, 'Jember', 'Family C', 1, 300000);
INSERT INTO `m_services` VALUES (144, 'Jember', 'Exclusive One', 5, 2800000);
INSERT INTO `m_services` VALUES (145, 'Jember', 'Exclusive Two', 1, 550000);
INSERT INTO `m_services` VALUES (146, 'Jember', 'Exclusive Three', 1, 425000);
INSERT INTO `m_services` VALUES (147, 'Jember', 'Couple A', 2, 700000);
INSERT INTO `m_services` VALUES (148, 'Jember', 'Couple B', 1, 575000);
INSERT INTO `m_services` VALUES (149, 'Jember', 'Elite Group', 2, 1100000);
INSERT INTO `m_services` VALUES (150, 'Jember', 'Group One', 1, 675000);
INSERT INTO `m_services` VALUES (151, 'Jember', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (152, 'Jember', 'Photo + Video', 1, 1050000);
INSERT INTO `m_services` VALUES (153, 'Jember', 'Photo + Mini Box', 1, 500000);
INSERT INTO `m_services` VALUES (154, 'Jember', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (155, 'Semarang', 'Family A', 1, 375000);
INSERT INTO `m_services` VALUES (156, 'Semarang', 'Family B', 1, 350000);
INSERT INTO `m_services` VALUES (157, 'Semarang', 'Family C', 1, 300000);
INSERT INTO `m_services` VALUES (158, 'Semarang', 'Exclusive One', 5, 2800000);
INSERT INTO `m_services` VALUES (159, 'Semarang', 'Exclusive Two', 1, 550000);
INSERT INTO `m_services` VALUES (160, 'Semarang', 'Exclusive Three', 1, 425000);
INSERT INTO `m_services` VALUES (161, 'Semarang', 'Couple A', 2, 700000);
INSERT INTO `m_services` VALUES (162, 'Semarang', 'Couple B', 1, 575000);
INSERT INTO `m_services` VALUES (163, 'Semarang', 'Elite Group', 2, 1100000);
INSERT INTO `m_services` VALUES (164, 'Semarang', 'Group One', 1, 675000);
INSERT INTO `m_services` VALUES (165, 'Semarang', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (166, 'Semarang', 'Photo + Video', 1, 1050000);
INSERT INTO `m_services` VALUES (167, 'Semarang', 'Photo + Mini Box', 1, 500000);
INSERT INTO `m_services` VALUES (168, 'Semarang', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (169, 'Bandung', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (170, 'Bandung', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (171, 'Bandung', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (172, 'Bandung', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (173, 'Bandung', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (174, 'Bandung', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (175, 'Bandung', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (176, 'Bandung', 'Couple B', 1, 600000);
INSERT INTO `m_services` VALUES (177, 'Bandung', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (178, 'Bandung', 'Group One', 1, 700000);
INSERT INTO `m_services` VALUES (179, 'Bandung', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (180, 'Bandung', 'Photo + Video', 1, 1100000);
INSERT INTO `m_services` VALUES (181, 'Bandung', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (182, 'Bandung', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (183, 'Jakarta', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (184, 'Jakarta', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (185, 'Jakarta', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (186, 'Jakarta', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (187, 'Jakarta', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (188, 'Jakarta', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (189, 'Jakarta', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (190, 'Jakarta', 'Couple B', 1, 600000);
INSERT INTO `m_services` VALUES (191, 'Jakarta', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (192, 'Jakarta', 'Group One', 1, 700000);
INSERT INTO `m_services` VALUES (193, 'Jakarta', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (194, 'Jakarta', 'Photo + Video', 1, 1100000);
INSERT INTO `m_services` VALUES (195, 'Jakarta', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (196, 'Jakarta', 'Photo + MUA', 1, NULL);
INSERT INTO `m_services` VALUES (197, 'Solo', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (198, 'Solo', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (199, 'Solo', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (200, 'Solo', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (201, 'Solo', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (202, 'Solo', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (203, 'Solo', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (204, 'Solo', 'Couple B', 1, 600000);
INSERT INTO `m_services` VALUES (205, 'Solo', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (206, 'Solo', 'Group One', 1, 700000);
INSERT INTO `m_services` VALUES (207, 'Solo', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (208, 'Solo', 'Photo + Video', 1, 1100000);
INSERT INTO `m_services` VALUES (209, 'Solo', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (210, 'Solo', 'Photo + MUA', 1, 950000);
INSERT INTO `m_services` VALUES (211, 'Jogja', 'Family A', 1, 400000);
INSERT INTO `m_services` VALUES (212, 'Jogja', 'Family B', 1, 375000);
INSERT INTO `m_services` VALUES (213, 'Jogja', 'Family C', 1, 335000);
INSERT INTO `m_services` VALUES (214, 'Jogja', 'Exclusive One', 5, 2850000);
INSERT INTO `m_services` VALUES (215, 'Jogja', 'Exclusive Two', 1, 600000);
INSERT INTO `m_services` VALUES (216, 'Jogja', 'Exclusive Three', 1, 475000);
INSERT INTO `m_services` VALUES (217, 'Jogja', 'Couple A', 2, 750000);
INSERT INTO `m_services` VALUES (218, 'Jogja', 'Couple B', 1, 600000);
INSERT INTO `m_services` VALUES (219, 'Jogja', 'Elite Group', 2, 1200000);
INSERT INTO `m_services` VALUES (220, 'Jogja', 'Group One', 1, 700000);
INSERT INTO `m_services` VALUES (221, 'Jogja', 'Group Two', 1, 425000);
INSERT INTO `m_services` VALUES (222, 'Jogja', 'Photo + Video', 1, 1100000);
INSERT INTO `m_services` VALUES (223, 'Jogja', 'Photo + Mini Box', 1, 550000);
INSERT INTO `m_services` VALUES (224, 'Jogja', 'Photo + MUA', 1, 950000);

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
-- Table structure for project_addons
-- ----------------------------
DROP TABLE IF EXISTS `project_addons`;
CREATE TABLE `project_addons`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `quantity` int NULL DEFAULT NULL,
  `total` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of project_addons
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
INSERT INTO `sessions` VALUES ('8qLfQmL3id2tvBtcOqHsJJKaXV4RVGTKUvScEGc8', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNHNON2duNFo5aWt5UUI2UGYyM2F6RWJUZTdzaWdGQ0cwaGphTXRCMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3QvcGhvdG9hZG1pbi9wdWJsaWMvcHJvamVjdHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc2ODUxODE3ODt9fQ==', 1768530504);
INSERT INTO `sessions` VALUES ('CVhQNJ0plqM5OYIQIFeehdNeLBPoXzY7zLhysMWU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidXpXQjVERHlpcTNsUEVpZVVtZE44N21WQnBRaWNkQmNJMHZmNTI5RiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vbG9jYWxob3N0L3Bob3RvYWRtaW4vcHVibGljL3Byb2plY3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3Njg1MzA1ODI7fX0=', 1768535985);

-- ----------------------------
-- Table structure for t_clients
-- ----------------------------
DROP TABLE IF EXISTS `t_clients`;
CREATE TABLE `t_clients`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_clients
-- ----------------------------
INSERT INTO `t_clients` VALUES (3, 'Mahendra', 'mfimahendra@gmail.com', '082111414954', NULL, 'UB', NULL, NULL, '2026-01-12 15:38:03', '2026-01-12 15:38:03');
INSERT INTO `t_clients` VALUES (5, 'Mukhammad Fakhriza Ihza Mahendra', NULL, '082111454214', 'mfimahendra', NULL, NULL, NULL, '2026-01-16 03:54:58', '2026-01-16 03:54:58');

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
-- Table structure for t_project_files
-- ----------------------------
DROP TABLE IF EXISTS `t_project_files`;
CREATE TABLE `t_project_files`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_project_files
-- ----------------------------

-- ----------------------------
-- Table structure for t_projects
-- ----------------------------
DROP TABLE IF EXISTS `t_projects`;
CREATE TABLE `t_projects`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `progress` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_projects
-- ----------------------------
INSERT INTO `t_projects` VALUES (2, 'booking', '2026-01-17', '11:00:00', NULL, 5, 17, 'Malang', 'UB', 'Fakultas Hukum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-16 03:54:58', '2026-01-16 03:54:58');

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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'mahendra', 'mahendra', 'mfimahendra@gmail.com', '082111414954', 'admin', '$2y$12$Na7KU0wff9hYt29kmalZd.rgoytzozawKYoZLkYf8PN4XpPO5WMCe', NULL, NULL, '2024-05-12 05:26:39', '2024-05-12 05:26:39');
INSERT INTO `users` VALUES (4, 'admin', 'admin', 'admin@admin', NULL, 'admin', '$2y$12$GmRwZX1xB5vFIoaE13Tw.uPeG.D3limVO5ogY1UmzOZn3eKR2gDOe', NULL, NULL, '2024-08-25 10:27:43', '2024-08-25 10:27:43');
INSERT INTO `users` VALUES (5, 'arga', 'Arga', 'arga@gmail.com', '08123456789', 'photographer', '$2y$12$roEkekVHEd5DhwlFPw2JpOMc4YVB88Rf0v/fQ4QY0GYs4O.V04eDW', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (6, 'thomi', 'thomi', 'adwawdaw@dawda', '123124514', 'admin', '$2y$12$CH5YhQuwC132Q5uDLWmK5ecWb2qaGLanjiMhX7ptOwQYFh7fQ6QJy', NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
