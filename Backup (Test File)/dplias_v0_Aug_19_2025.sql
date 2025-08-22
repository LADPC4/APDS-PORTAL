/*
 Navicat Premium Dump SQL

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : 127.0.0.1:3306
 Source Schema         : dplias_v0

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 19/08/2025 14:51:17
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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache
-- ----------------------------
INSERT INTO `cache` VALUES ('apds_portal_cache_35e995c107a71caeb833bb3b79f9f54781b33fa1', 'i:7;', 1755566838);
INSERT INTO `cache` VALUES ('apds_portal_cache_35e995c107a71caeb833bb3b79f9f54781b33fa1:timer', 'i:1755566838;', 1755566838);
INSERT INTO `cache` VALUES ('apds_portal_cache_450ddec8dd206c2e2ab1aeeaa90e85e51753b8b7', 'i:4;', 1755567442);
INSERT INTO `cache` VALUES ('apds_portal_cache_450ddec8dd206c2e2ab1aeeaa90e85e51753b8b7:timer', 'i:1755567442;', 1755567442);
INSERT INTO `cache` VALUES ('apds_portal_cache_4d89d294cd4ca9f2ca57dc24a53ffb3ef5303122', 'i:2;', 1754945951);
INSERT INTO `cache` VALUES ('apds_portal_cache_4d89d294cd4ca9f2ca57dc24a53ffb3ef5303122:timer', 'i:1754945951;', 1754945951);
INSERT INTO `cache` VALUES ('apds_portal_cache_9109c85a45b703f87f1413a405549a2cea9ab556', 'i:1;', 1754546564);
INSERT INTO `cache` VALUES ('apds_portal_cache_9109c85a45b703f87f1413a405549a2cea9ab556:timer', 'i:1754546564;', 1754546564);
INSERT INTO `cache` VALUES ('apds_portal_cache_b4c96d80854dd27e76d8cc9e21960eebda52e962', 'i:1;', 1754966008);
INSERT INTO `cache` VALUES ('apds_portal_cache_b4c96d80854dd27e76d8cc9e21960eebda52e962:timer', 'i:1754966008;', 1754966008);
INSERT INTO `cache` VALUES ('apds_portal_cache_b7103ca278a75cad8f7d065acda0c2e80da0b7dc', 'i:2;', 1755053712);
INSERT INTO `cache` VALUES ('apds_portal_cache_b7103ca278a75cad8f7d065acda0c2e80da0b7dc:timer', 'i:1755053712;', 1755053712);
INSERT INTO `cache` VALUES ('apds_portal_cache_d02560dd9d7db4467627745bd6701e809ffca6e3', 'i:3;', 1755507005);
INSERT INTO `cache` VALUES ('apds_portal_cache_d02560dd9d7db4467627745bd6701e809ffca6e3:timer', 'i:1755507005;', 1755507005);
INSERT INTO `cache` VALUES ('apds_portal_cache_d321d6f7ccf98b51540ec9d933f20898af3bd71e', 'i:2;', 1755572418);
INSERT INTO `cache` VALUES ('apds_portal_cache_d321d6f7ccf98b51540ec9d933f20898af3bd71e:timer', 'i:1755572418;', 1755572418);
INSERT INTO `cache` VALUES ('apds_portal_cache_d54ad009d179ae346683cfc3603979bc99339ef7', 'i:11;', 1755567913);
INSERT INTO `cache` VALUES ('apds_portal_cache_d54ad009d179ae346683cfc3603979bc99339ef7:timer', 'i:1755567913;', 1755567913);

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------

-- ----------------------------
-- Table structure for classification_documents
-- ----------------------------
DROP TABLE IF EXISTS `classification_documents`;
CREATE TABLE `classification_documents`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `classification_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `classification_documents_classification_id_foreign`(`classification_id` ASC) USING BTREE,
  CONSTRAINT `classification_documents_classification_id_foreign` FOREIGN KEY (`classification_id`) REFERENCES `classifications` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of classification_documents
-- ----------------------------
INSERT INTO `classification_documents` VALUES (1, 1, 'Certificate of Incorporation/Registration', '2025-08-11 15:57:36', '2025-08-11 15:57:36');
INSERT INTO `classification_documents` VALUES (2, 1, 'Amended Articles of Incorporations and By-Laws, if any', '2025-08-11 15:57:48', '2025-08-11 15:57:48');
INSERT INTO `classification_documents` VALUES (3, 1, 'Updated General Information Sheet', '2025-08-11 15:58:01', '2025-08-11 15:58:01');
INSERT INTO `classification_documents` VALUES (4, 1, 'Certification from SEC Non-Derogatory', '2025-08-11 15:58:14', '2025-08-11 15:58:14');
INSERT INTO `classification_documents` VALUES (5, 1, 'Monitoring Clearance', '2025-08-11 15:58:24', '2025-08-11 15:58:24');
INSERT INTO `classification_documents` VALUES (6, 1, 'Certificate of Authority', '2025-08-11 16:02:06', '2025-08-11 16:02:06');
INSERT INTO `classification_documents` VALUES (7, 1, 'Certification of Good Standing ', '2025-08-11 16:02:17', '2025-08-11 16:02:17');
INSERT INTO `classification_documents` VALUES (8, 4, 'Certificate of Incorporation/Registration', '2025-08-11 16:49:29', '2025-08-11 16:49:29');
INSERT INTO `classification_documents` VALUES (9, 4, 'Amended Articles of Incorporations and By-Laws, if any', '2025-08-11 16:49:41', '2025-08-11 16:49:41');
INSERT INTO `classification_documents` VALUES (10, 4, 'Updated General Information Sheet', '2025-08-11 16:49:55', '2025-08-11 16:49:55');
INSERT INTO `classification_documents` VALUES (11, 4, 'Certification from SEC Non-Derogatory', '2025-08-11 16:50:06', '2025-08-11 16:50:06');
INSERT INTO `classification_documents` VALUES (12, 4, 'Monitoring Clearance', '2025-08-11 16:50:18', '2025-08-11 16:50:18');
INSERT INTO `classification_documents` VALUES (13, 4, 'Certificate of Registration', '2025-08-11 16:50:34', '2025-08-11 16:50:34');
INSERT INTO `classification_documents` VALUES (14, 4, 'Certificate of Authority', '2025-08-11 16:50:50', '2025-08-11 16:50:50');
INSERT INTO `classification_documents` VALUES (15, 2, 'Certificate of Registration', '2025-08-11 16:51:17', '2025-08-11 16:51:17');
INSERT INTO `classification_documents` VALUES (16, 2, 'Amended Articles of Cooperation and By-Laws, if any;', '2025-08-11 16:51:27', '2025-08-11 16:51:27');
INSERT INTO `classification_documents` VALUES (17, 2, 'Updated Cooperative Annual Progress Report (CAPR)', '2025-08-11 16:51:44', '2025-08-11 16:51:44');
INSERT INTO `classification_documents` VALUES (18, 2, 'CDA Certificate of Good Standing/Compliance ', '2025-08-11 16:51:56', '2025-08-11 16:51:56');
INSERT INTO `classification_documents` VALUES (19, 3, 'Certificate of Incorporation/Registration', '2025-08-11 16:52:37', '2025-08-11 16:52:37');
INSERT INTO `classification_documents` VALUES (20, 3, 'Amended Articles of Incorporations and By-Laws, if any', '2025-08-11 16:52:49', '2025-08-11 16:52:49');
INSERT INTO `classification_documents` VALUES (21, 3, 'Updated General Information Sheet', '2025-08-11 16:53:00', '2025-08-11 16:53:00');
INSERT INTO `classification_documents` VALUES (22, 3, 'Certification from SEC Non-Derogatory', '2025-08-11 16:53:12', '2025-08-11 16:53:12');
INSERT INTO `classification_documents` VALUES (23, 3, 'Monitoring Clearance', '2025-08-11 16:53:22', '2025-08-11 16:53:22');
INSERT INTO `classification_documents` VALUES (24, 3, 'Certificate of Authority', '2025-08-11 16:53:37', '2025-08-11 16:53:37');
INSERT INTO `classification_documents` VALUES (25, 3, 'Certification of Good Standing ', '2025-08-11 16:53:50', '2025-08-11 16:53:50');
INSERT INTO `classification_documents` VALUES (26, 3, 'Certificate of Registration ', '2025-08-11 16:54:03', '2025-08-11 16:54:03');
INSERT INTO `classification_documents` VALUES (27, 3, 'Amended Articles of Cooperation and By-Laws, if any;', '2025-08-11 16:54:19', '2025-08-11 16:54:19');
INSERT INTO `classification_documents` VALUES (28, 3, 'Updated Cooperative Annual Progress Report (CAPR)', '2025-08-11 16:54:30', '2025-08-11 16:54:30');
INSERT INTO `classification_documents` VALUES (29, 3, 'CDA Certificate of Good Standing/Compliance ', '2025-08-11 16:54:46', '2025-08-11 16:54:46');

-- ----------------------------
-- Table structure for classifications
-- ----------------------------
DROP TABLE IF EXISTS `classifications`;
CREATE TABLE `classifications`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `classifications_name_unique`(`name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of classifications
-- ----------------------------
INSERT INTO `classifications` VALUES (1, 'Bank', '2025-08-04 02:12:37', '2025-08-04 02:12:37');
INSERT INTO `classifications` VALUES (2, 'Cooperatives', '2025-08-04 02:13:21', '2025-08-04 02:13:21');
INSERT INTO `classifications` VALUES (3, 'Cooperative Banks', '2025-08-04 02:13:26', '2025-08-04 02:13:26');
INSERT INTO `classifications` VALUES (4, 'Insurance Companies', '2025-08-04 02:13:33', '2025-08-04 02:13:33');
INSERT INTO `classifications` VALUES (5, 'Teachers Association', '2025-08-04 02:13:39', '2025-08-04 02:13:39');
INSERT INTO `classifications` VALUES (6, 'Savings and Loans Associations', '2025-08-04 02:13:45', '2025-08-04 02:13:45');
INSERT INTO `classifications` VALUES (7, 'Sample', '2025-08-04 06:37:45', '2025-08-04 06:37:45');

-- ----------------------------
-- Table structure for documents
-- ----------------------------
DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `eval_feedback` tinyint(1) NOT NULL DEFAULT 0,
  `rev_feedback` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `classification_document_id` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `documents_user_id_foreign`(`user_id` ASC) USING BTREE,
  INDEX `documents_classification_document_id_foreign`(`classification_document_id` ASC) USING BTREE,
  CONSTRAINT `documents_classification_document_id_foreign` FOREIGN KEY (`classification_document_id`) REFERENCES `classification_documents` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 574 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of documents
-- ----------------------------
INSERT INTO `documents` VALUES (541, 73, 'Certificate of Incorporation/Registration', 'uploads/5ct8vTM2JSkuVrxRs2BvhCpigJ9WSY6MI4cPw7Yl.png', 'under-review', NULL, 0, 0, '2025-08-19 01:08:39', '2025-08-19 01:49:51', NULL);
INSERT INTO `documents` VALUES (542, 73, 'Amended Articles of Incorporations and By-Laws, if any', 'uploads/NMfhR8bs35sMB01UXieparBDj2E6LFOxpEFaqtZq.png', 'under-review', NULL, 0, 0, '2025-08-19 01:08:39', '2025-08-19 01:49:51', NULL);
INSERT INTO `documents` VALUES (543, 73, 'Updated General Information Sheet', 'uploads/pQzc9j79qODtPPDTrscq0B2zhhTArMWvAJfjuHI1.png', 'under-review', NULL, 0, 0, '2025-08-19 01:08:39', '2025-08-19 01:49:51', NULL);
INSERT INTO `documents` VALUES (544, 73, 'Certification from SEC Non-Derogatory', 'uploads/Irf90T9mnAnTRxvRe3I22vEMRlOk393t4rNjL9g6.png', 'under-review', NULL, 0, 0, '2025-08-19 01:08:39', '2025-08-19 01:49:51', NULL);
INSERT INTO `documents` VALUES (545, 73, 'Monitoring Clearance', 'uploads/QD259le2fgS5Xode7gBJvi1BZ58tD4ISJbcbS22V.png', 'under-review', NULL, 0, 0, '2025-08-19 01:08:39', '2025-08-19 01:49:51', NULL);
INSERT INTO `documents` VALUES (546, 73, 'Certificate of Authority', 'uploads/EG6UzAeCH1xcXu5G9aVHWVrrAHVLHZ31S5G4CNCt.png', 'under-review', NULL, 0, 0, '2025-08-19 01:08:39', '2025-08-19 01:49:51', NULL);
INSERT INTO `documents` VALUES (547, 73, 'Certification of Good Standing ', 'uploads/DSdKfEI4XsjgNOc1Etar35HDLdSiPWwN1gJ0m5l4.png', 'under-review', NULL, 0, 0, '2025-08-19 01:08:39', '2025-08-19 01:49:51', NULL);
INSERT INTO `documents` VALUES (552, 75, 'Certificate of Registration', 'uploads/kQ8N8n93xpvGDaq1HvHl27V0Nm8NGgY3DQTjIXYw.png', 'Submitted', NULL, 0, 0, '2025-08-19 01:20:42', '2025-08-19 01:36:49', NULL);
INSERT INTO `documents` VALUES (553, 75, 'Amended Articles of Cooperation and By-Laws, if any;', 'uploads/GX766TY51Ov3dTA3j7DpcJeBRRbU97gBMQtFBqck.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 01:20:42', '2025-08-19 01:36:49', NULL);
INSERT INTO `documents` VALUES (554, 75, 'Updated Cooperative Annual Progress Report (CAPR)', 'uploads/MJMAsjbsWeVgQsAo0X6Vj1sJxHkjp0Xjf5MxcwkL.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 01:20:42', '2025-08-19 01:36:49', NULL);
INSERT INTO `documents` VALUES (555, 75, 'CDA Certificate of Good Standing/Compliance ', 'uploads/hovKsfs3AqfXVvzrxavemytx8RSvRrPbpXcgPMgT.pdf', 'Submitted', NULL, 0, 0, '2025-08-19 01:20:42', '2025-08-19 01:36:49', NULL);
INSERT INTO `documents` VALUES (556, 76, 'Certificate of Incorporation/Registration', 'uploads/OGeCewwd3wfON5rsOtDk1FVCYmVl8Vuyqg4512le.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 01:43:45', '2025-08-19 01:44:57', NULL);
INSERT INTO `documents` VALUES (557, 76, 'Amended Articles of Incorporations and By-Laws, if any', 'uploads/RJmOmWfctSh7kiP1qGABMN2dLZjdW7Oj79wGt1xN.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 01:43:45', '2025-08-19 01:44:57', NULL);
INSERT INTO `documents` VALUES (558, 76, 'Updated General Information Sheet', 'uploads/fm9rfaJ3h1hiJTWPm7iws73MaRzS6RkqzyzCx7jh.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 01:43:45', '2025-08-19 01:44:57', NULL);
INSERT INTO `documents` VALUES (559, 76, 'Certification from SEC Non-Derogatory', 'uploads/J0H4qj87DpcKwskRAs2GX18NhlB2oATmzjEIII6w.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 01:43:45', '2025-08-19 01:44:57', NULL);
INSERT INTO `documents` VALUES (560, 76, 'Monitoring Clearance', 'uploads/Z00CJzYG47kpO5PRNnE1VrjqvD8vG5r2X5gaN3ub.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 01:43:45', '2025-08-19 01:44:57', NULL);
INSERT INTO `documents` VALUES (561, 76, 'Certificate of Authority', 'uploads/xSlLh8cVgNSbi3hn1otaTK3rKwqZRkMUeMw524rK.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 01:43:45', '2025-08-19 01:44:57', NULL);
INSERT INTO `documents` VALUES (562, 76, 'Certification of Good Standing ', 'uploads/gx1NPPDc4yabGy89exRzpKGbrpSaol2jBcYDp0uF.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 01:43:45', '2025-08-19 01:44:57', NULL);
INSERT INTO `documents` VALUES (563, 76, 'Certificate of Registration ', 'uploads/UnEoYetfdbjtjIeEaowswdSbgapSiYqAOuqncowL.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 01:43:45', '2025-08-19 01:44:57', NULL);
INSERT INTO `documents` VALUES (564, 76, 'Amended Articles of Cooperation and By-Laws, if any;', 'uploads/srPM1AXKFfPwYEHsWNqrY8yNvW0byNjYOl4b0v6L.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 01:43:45', '2025-08-19 01:44:57', NULL);
INSERT INTO `documents` VALUES (565, 76, 'Updated Cooperative Annual Progress Report (CAPR)', 'uploads/HNCR5XdoUDZheT7Tqd7K1xa0j4w0XukJQ3jSqwEQ.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 01:43:45', '2025-08-19 01:44:57', NULL);
INSERT INTO `documents` VALUES (566, 76, 'CDA Certificate of Good Standing/Compliance ', 'uploads/tjpsjJFlkHyYbqGoIAYOG27uJ5PZCphtNVh64ZKM.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 01:43:45', '2025-08-19 01:44:57', NULL);
INSERT INTO `documents` VALUES (567, 77, 'Certificate of Incorporation/Registration', 'uploads/zstojGf7kPJ4KXejOFwKYae5J81sfGL8pGMyWGag.png', 'Evaluated', NULL, 1, 0, '2025-08-19 02:14:11', '2025-08-19 02:36:33', NULL);
INSERT INTO `documents` VALUES (568, 77, 'Amended Articles of Incorporations and By-Laws, if any', 'uploads/uTjdyeGm0nMaWVFZ1FyUyDyF5EyENRA8TP9pfzxb.jpg', 'Evaluated', NULL, 1, 0, '2025-08-19 02:14:11', '2025-08-19 02:36:33', NULL);
INSERT INTO `documents` VALUES (569, 77, 'Updated General Information Sheet', 'uploads/Sk1ey4Qeu4dpTm90nH2o8RbUXJ3Dgecw6OJAoRmw.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 02:14:11', '2025-08-19 02:59:26', NULL);
INSERT INTO `documents` VALUES (570, 77, 'Certification from SEC Non-Derogatory', 'uploads/OByUB6xG3fBfjdjA1BfBgTLVTemeoKqaDxWoxyWT.jpg', 'Evaluated', NULL, 1, 0, '2025-08-19 02:14:11', '2025-08-19 02:36:33', NULL);
INSERT INTO `documents` VALUES (571, 77, 'Monitoring Clearance', 'uploads/6SqruaX9yL6o2KCIlYvVWYxBb4QRfsSyH7uclE98.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 02:14:11', '2025-08-19 02:59:26', NULL);
INSERT INTO `documents` VALUES (572, 77, 'Certificate of Authority', 'uploads/rsHGgji9LzSUTlTDVgbQE5b12NtIHmwN9XfsSWpf.png', 'Evaluated', NULL, 1, 0, '2025-08-19 02:14:11', '2025-08-19 02:36:33', NULL);
INSERT INTO `documents` VALUES (573, 77, 'Certification of Good Standing ', 'uploads/e6RFsmjSbybazYxKXEyL2JMlT4nLebHSCQHwGc8c.jpg', 'Submitted', NULL, 0, 0, '2025-08-19 02:14:11', '2025-08-19 02:42:05', NULL);

-- ----------------------------
-- Table structure for existing_plis
-- ----------------------------
DROP TABLE IF EXISTS `existing_plis`;
CREATE TABLE `existing_plis`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `official_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mas_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `insurance_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `classification_id` bigint UNSIGNED NOT NULL,
  `status` enum('Active','Inactive','Revoked','Expired') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_in_charge` bigint UNSIGNED NULL DEFAULT NULL,
  `CAR_region` tinyint(1) NOT NULL DEFAULT 0,
  `NCR_region` tinyint(1) NOT NULL DEFAULT 0,
  `R01_region` tinyint(1) NOT NULL DEFAULT 0,
  `R02_region` tinyint(1) NOT NULL DEFAULT 0,
  `R03_region` tinyint(1) NOT NULL DEFAULT 0,
  `R04A_region` tinyint(1) NOT NULL DEFAULT 0,
  `R04B_region` tinyint(1) NOT NULL DEFAULT 0,
  `R05_region` tinyint(1) NOT NULL DEFAULT 0,
  `R06_region` tinyint(1) NOT NULL DEFAULT 0,
  `R07_region` tinyint(1) NOT NULL DEFAULT 0,
  `R08_region` tinyint(1) NOT NULL DEFAULT 0,
  `R09_region` tinyint(1) NOT NULL DEFAULT 0,
  `R10_region` tinyint(1) NOT NULL DEFAULT 0,
  `R11_region` tinyint(1) NOT NULL DEFAULT 0,
  `R12_region` tinyint(1) NOT NULL DEFAULT 0,
  `R13_region` tinyint(1) NOT NULL DEFAULT 0,
  `CAR_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `NCR_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R01_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R02_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R03_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R04A_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R04B_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R05_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R06_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R07_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R08_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R09_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R10_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R11_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R12_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R13_provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `regions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin GENERATED ALWAYS AS (json_remove(json_array(case when `CAR_region` = 1 then 'CAR' else NULL end,case when `NCR_region` = 1 then 'NCR' else NULL end,case when `R01_region` = 1 then 'R01' else NULL end,case when `R02_region` = 1 then 'R02' else NULL end,case when `R03_region` = 1 then 'R03' else NULL end,case when `R04A_region` = 1 then 'R04A' else NULL end,case when `R04B_region` = 1 then 'R04B' else NULL end,case when `R05_region` = 1 then 'R05' else NULL end,case when `R06_region` = 1 then 'R06' else NULL end,case when `R07_region` = 1 then 'R07' else NULL end,case when `R08_region` = 1 then 'R08' else NULL end,case when `R09_region` = 1 then 'R09' else NULL end,case when `R10_region` = 1 then 'R10' else NULL end,case when `R11_region` = 1 then 'R11' else NULL end,case when `R12_region` = 1 then 'R12' else NULL end,case when `R13_region` = 1 then 'R13' else NULL end),json_unquote(json_search(json_array(case when `CAR_region` = 1 then 'CAR' else NULL end,case when `NCR_region` = 1 then 'NCR' else NULL end,case when `R01_region` = 1 then 'R01' else NULL end,case when `R02_region` = 1 then 'R02' else NULL end,case when `R03_region` = 1 then 'R03' else NULL end,case when `R04A_region` = 1 then 'R04A' else NULL end,case when `R04B_region` = 1 then 'R04B' else NULL end,case when `R05_region` = 1 then 'R05' else NULL end,case when `R06_region` = 1 then 'R06' else NULL end,case when `R07_region` = 1 then 'R07' else NULL end,case when `R08_region` = 1 then 'R08' else NULL end,case when `R09_region` = 1 then 'R09' else NULL end,case when `R10_region` = 1 then 'R10' else NULL end,case when `R11_region` = 1 then 'R11' else NULL end,case when `R12_region` = 1 then 'R12' else NULL end,case when `R13_region` = 1 then 'R13' else NULL end),'all',NULL)))) VIRTUAL NULL,
  `provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin GENERATED ALWAYS AS (json_merge_preserve(coalesce(`CAR_provinces`,json_array()),coalesce(`NCR_provinces`,json_array()),coalesce(`R01_provinces`,json_array()),coalesce(`R02_provinces`,json_array()),coalesce(`R03_provinces`,json_array()),coalesce(`R04A_provinces`,json_array()),coalesce(`R04B_provinces`,json_array()),coalesce(`R05_provinces`,json_array()),coalesce(`R06_provinces`,json_array()),coalesce(`R07_provinces`,json_array()),coalesce(`R08_provinces`,json_array()),coalesce(`R09_provinces`,json_array()),coalesce(`R10_provinces`,json_array()),coalesce(`R11_provinces`,json_array()),coalesce(`R12_provinces`,json_array()),coalesce(`R13_provinces`,json_array()))) VIRTUAL NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `existing_plis_status_index`(`status` ASC) USING BTREE,
  INDEX `existing_plis_classification_id_index`(`classification_id` ASC) USING BTREE,
  INDEX `existing_plis_user_in_charge_index`(`user_in_charge` ASC) USING BTREE,
  INDEX `existing_plis_name_index`(`name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 167 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of existing_plis
-- ----------------------------
INSERT INTO `existing_plis` VALUES (1, '1st Valley Bank Inc. (A Development Bank)', 'lance.depasion@deped.gov.ph', '1035', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:34', '2025-08-13 02:16:10', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (2, 'Agribusiness Rural Bank Inc.', 'lance.depasion@deped.gov.ph', '1113', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 1, 1, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 1, NULL, NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, NULL, '[\"1\"]', NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (3, 'Agusan Del Norte Teachers Retirees Employees And Community Cooperative', 'lance.depasion@deped.gov.ph', '1109', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '2025-08-11 04:41:34', '2025-08-19 01:11:12', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (4, 'ASCCOM Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1217', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (5, 'ASPAC Rural Bank Inc.', 'lance.depasion@deped.gov.ph', '1156', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (6, 'Baguio City School Teachers and Employees Multi-Purpose Cooperative', 'lanceadriandepasion@gmail.com', '1082', NULL, NULL, 2, 'Expired', 75, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-19 01:20:42', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (7, 'Banco Alabang Inc. (A Rural Bank)', 'lance.depasion@deped.gov.ph', '1127', NULL, NULL, 1, 'Expired', NULL, 0, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (8, 'Banco de Mindoro Inc. (A Rural Bank)', 'lance.depasion@deped.gov.ph', '1175', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (9, 'Banco Maximo - RNG Coastal Corporation (RNG Bank) (formerly: Banco Maximo Inc. (A Rural Bank)', 'lance.depasion@deped.gov.ph', '1245', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (10, 'BancoLagawe (Lagawe Highlands Rural Bank Inc.)', 'lance.depasion@deped.gov.ph', '1108', NULL, NULL, 1, 'Expired', NULL, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '[\"1\"]', NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (11, 'Bankways Inc. (A Rural Bank)', 'lance.depasion@deped.gov.ph', '1095', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (12, 'Bataan Public School Teachers and Employees Association Inc.', 'lance.depasion@deped.gov.ph', '1212', NULL, NULL, 5, 'Expired', NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (13, 'Bataan School of Fisheries Faculty and Staff Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1254', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (14, 'BayBank Inc. (A Rural Bank)', 'lance.depasion@deped.gov.ph', '1120', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (15, 'Bayugan West District Teachers Employees and Community Cooperative', 'lance.depasion@deped.gov.ph', '1081', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (16, 'BDO Network Bank Inc. (A Rural Bank)', 'lance.depasion@deped.gov.ph', '918', NULL, NULL, 1, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (17, 'Beneficial Life Insurance Company Inc.', 'lance.depasion@deped.gov.ph', '531', NULL, '0053A-C', 4, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (18, 'Beneficial Life Insurance Company Inc.', 'lance.depasion@deped.gov.ph', '0053A-C', NULL, NULL, 4, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (19, 'Bohol Public School Teachers and Employees Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1149', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (20, 'Bongabon National High School Teachers and Staff Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1262', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (21, 'Cabatuan National Comprehensive High School Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1235', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (22, 'Cagsawa Rural Bank Inc.', 'lance.depasion@deped.gov.ph', '896', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (23, 'Camalig Bank Inc. (A Rural Bank)', 'lance.depasion@deped.gov.ph', '895', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (24, 'Camarines Sur Elementary and Secondary Teachers and Employees Association Inc. (CASESTEAI)', 'lance.depasion@deped.gov.ph', '1083', NULL, NULL, 5, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (25, 'Camarines Sur Teachers and Employees Multi-Purpose Cooperative (CASTEMUPCO)', 'lance.depasion@deped.gov.ph', '368', '2003', NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (26, 'Camarines Sur Teachers and Employees Multi-Purpose Cooperative (CASTEMUPCO)', 'lance.depasion@deped.gov.ph', '2003', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (27, 'Cavite United Rural Bank Corporation', 'lance.depasion@deped.gov.ph', '1240', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (28, 'Cebu CFI Community Cooperative', 'lance.depasion@deped.gov.ph', '1045', NULL, NULL, 2, 'Expired', NULL, 0, 0, 1, 0, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, NULL, '[\"1\"]', NULL, NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (29, 'Cebuana Lhuillier Rural Bank Inc.', 'lance.depasion@deped.gov.ph', '1260', NULL, NULL, 1, 'Expired', NULL, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, NULL, '[\"1\"]', NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, '[\"1\"]', NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (30, 'Century Rural Bank Inc.', 'lance.depasion@deped.gov.ph', '1123', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (31, 'China Bank Savings Inc.', 'lance.depasion@deped.gov.ph', '1151', NULL, NULL, 1, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (32, 'City Savings Bank Inc.', 'lance.depasion@deped.gov.ph', '339', NULL, NULL, 1, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (33, 'Citystate Savings Bank Inc.', 'lance.depasion@deped.gov.ph', '331', NULL, NULL, 1, 'Expired', NULL, 0, 0, 1, 1, 0, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (34, 'Clarin National High School Family Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '969', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (35, 'Community Rural Bank of Dapitan City Inc.', 'lance.depasion@deped.gov.ph', '1170', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (36, 'Cooperative Bank of Cotabato', 'lance.depasion@deped.gov.ph', '1178', NULL, NULL, 3, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (37, 'Country Bankers Life Insurance Corporation', 'lance.depasion@deped.gov.ph', '74', NULL, '0073A-C', 4, 'Expired', NULL, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (38, 'Country Bankers Life Insurance Corporation', 'lance.depasion@deped.gov.ph', '0073A-C', NULL, NULL, 4, 'Expired', NULL, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (39, 'DECS Sagay Employees Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1238', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (40, 'DECS South Cotabato Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '351', '2001', NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (41, 'DECS South Cotabato Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '2001', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (42, 'Department of Education Cooperative (DepEd Coop)', 'lance.depasion@deped.gov.ph', '1007', '2043A-B', NULL, 2, 'Expired', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (43, 'Department of Education Cooperative (DepEd Coop)', 'lance.depasion@deped.gov.ph', '2043A-B', NULL, NULL, 2, 'Expired', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (44, 'DepEd CAR Employees Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1258', NULL, NULL, 8, 'Expired', NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (45, 'DepEd MIMAROPA Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1070', NULL, NULL, 2, 'Expired', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (46, 'DepEd NCR Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1259', NULL, NULL, 8, 'Expired', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (47, 'DepEdRO6 Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1111', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (48, 'Digos City National High School Teachers and Employees Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1048', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (49, 'Division Teachers And Non-Teaching Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1122', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (50, 'Doña Hortencia Salas Benedicto National High School Teachers and Employees Multi-Purpose Cooperative (DHSBNHS-TEMUPCO)', 'lance.depasion@deped.gov.ph', '1264', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (51, 'East West Rural Bank Inc. (EWRBI)', 'lance.depasion@deped.gov.ph', '1010', NULL, NULL, 1, 'Expired', 77, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:34', '2025-08-19 02:14:11', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (52, 'Eastern Peninsula Teachers Credit Cooperative', 'lance.depasion@deped.gov.ph', '1078', NULL, NULL, 2, 'Expired', NULL, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (53, 'Enrile Teachers Integrated Development Cooperative', 'lance.depasion@deped.gov.ph', '162', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (54, 'Enterprise Bank Inc.', 'lance.depasion@deped.gov.ph', '1148', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (55, 'Etiqa Life and General Assurance Philippines Inc.', 'lance.depasion@deped.gov.ph', '1015', NULL, '0041A-C', 4, 'Expired', NULL, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (56, 'First Community Bank Inc. (Rural Bank)', 'lance.depasion@deped.gov.ph', '1191', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (57, 'First Consolidated Bank A Private Development Bank', 'lance.depasion@deped.gov.ph', '312', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (58, 'First Imperial Business Bank Inc. (merged with Racso\'s wherein FIBBI is the surviving entity)', 'lance.depasion@deped.gov.ph', '1144', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (59, 'Fortune Life Insurance Company', 'lance.depasion@deped.gov.ph', '147', NULL, '0142A-C', 4, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (60, 'Fortune Life Insurance Company', 'lance.depasion@deped.gov.ph', '0142A-C', NULL, NULL, 4, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (61, 'Frontier Rural Bank Inc.', 'lance.depasion@deped.gov.ph', '1152', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (62, 'General Tinio Faculty and Personnel Association Credit Cooperative', 'lance.depasion@deped.gov.ph', '1246', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (63, 'GM Bank of Luzon Inc. (A Rural Bank)', 'lance.depasion@deped.gov.ph', '1216', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (64, 'Gubat Saint Anthony Cooperative', 'lance.depasion@deped.gov.ph', '1210', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (65, 'Home Technologist Credit Cooperative (HOMETECC)', 'lance.depasion@deped.gov.ph', '1247', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (66, 'Iloilo National High School Faculty and Employees Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1159', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (67, 'Initao National Comprehensive High School Teachers and Employees Cooperative (INCHSTECO)', 'lance.depasion@deped.gov.ph', '1135', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (68, 'Innovative Bank Inc. (A Rural Bank)', 'lance.depasion@deped.gov.ph', '1199', NULL, NULL, 1, 'Expired', NULL, 0, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (69, 'Jacinto P. Elpa High School Employees Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1188', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (70, 'Jalandoni Memorial National High School Teachers\' And Employees Development Cooperative', 'lance.depasion@deped.gov.ph', '1237', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (71, 'Janiuay Rural Bank Inc.', 'lance.depasion@deped.gov.ph', '1069', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (72, 'Kabankalan-Ilog Teachers and Employees Multi-Purpose Cooperative (KITEMPCO)', 'lance.depasion@deped.gov.ph', '1162', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (73, 'Kaguruan Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1061', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (74, 'Katipunan Banking Corporation \"A Rural Bank\"', 'lance.depasion@deped.gov.ph', '911', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (75, 'Kilusang Nueve (K-9) Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1244', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (76, 'La Castellana I Personnel Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1208', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (77, 'Lagawe Multi-Purpose Development Cooperative', 'lance.depasion@deped.gov.ph', '1103', NULL, NULL, 2, 'Expired', NULL, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '[\"1\"]', NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (78, 'Laguna Prestige Banking Corporation', 'lance.depasion@deped.gov.ph', '1261', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (79, 'Legazpi City Division Credit Cooperative', 'lance.depasion@deped.gov.ph', '1138', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (80, 'Legazpi Savings Bank Inc.', 'lance.depasion@deped.gov.ph', '1214', NULL, NULL, 1, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (81, 'Libacao Development Cooperative', 'lance.depasion@deped.gov.ph', '1155', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (82, 'Libungan National Employees Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1050', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (83, 'Llanera Teachers Association Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1080', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (84, 'Luzon Development Bank', 'lance.depasion@deped.gov.ph', '1160', NULL, NULL, 1, 'Expired', NULL, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (85, 'Mactan Rural Bank (Lapu-Lapu City) Inc.', 'lance.depasion@deped.gov.ph', '311', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (86, 'Madalag Teachers\' Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1107', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (87, 'Malayan Savings Bank Inc.', 'lance.depasion@deped.gov.ph', '1257', NULL, NULL, 1, 'Expired', NULL, 0, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 0, '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', NULL, NULL, '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, '[\"1\"]', NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (88, 'Manila Public School Teachers Association Inc.', 'lance.depasion@deped.gov.ph', '214', NULL, NULL, 9, 'Expired', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:34', '2025-08-11 04:41:34', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (89, 'Manila Teachers\' Mutual Aid System Inc. (MTMASI)', 'lance.depasion@deped.gov.ph', '1169', '2089A-B', NULL, 9, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (90, 'Manila Teachers\' Mutual Aid System Inc. (MTMASI)', 'lance.depasion@deped.gov.ph', '2089A-B', NULL, NULL, 9, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (91, 'Marayo Bank Inc. (A Rural Bank)', 'lance.depasion@deped.gov.ph', '1088', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (92, 'Marcelo H. Del Pilar National High School Teachers Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1255', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (93, 'Masisit-Dacal Livelihood Cooperative (MASCOOP)', 'lance.depasion@deped.gov.ph', '1168', NULL, NULL, 2, 'Expired', NULL, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (94, 'Millennium Educators and Retirees Association Inc.', 'lance.depasion@deped.gov.ph', '1008', NULL, NULL, 5, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (95, 'Mindanao Educators Mutual Benefit Association Inc.', 'lance.depasion@deped.gov.ph', '1230', '2042A-B', NULL, 9, 'Expired', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (96, 'Mindanao Educators Mutual Benefit Association Inc.', 'lance.depasion@deped.gov.ph', '2042A-B', NULL, NULL, 9, 'Expired', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (97, 'MOGCHS Faculty Retirees Employees and Students Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1253', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (98, 'Monkayo Public School Teachers Employees and Retirees Multi-Purpose Cooperative (MPSTERMCO)', 'lance.depasion@deped.gov.ph', '1134', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (99, 'Mount Carmel Rural Bank Inc.', 'lance.depasion@deped.gov.ph', '1205', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (100, 'Mt. Province Teachers\' Mutual Aid System', 'lance.depasion@deped.gov.ph', '1251', '2046', NULL, 9, 'Expired', NULL, 0, 1, 0, 1, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (101, 'Mt. Province Teachers\' Mutual Aid System', 'lance.depasion@deped.gov.ph', '2046', NULL, NULL, 9, 'Expired', NULL, 0, 1, 0, 1, 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (102, 'Muñoz National High School Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1248', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (103, 'Naga School Teachers Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1029', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (104, 'National Teachers and Employees Cooperative Bank (NTECB)', 'lance.depasion@deped.gov.ph', '1012', NULL, NULL, 3, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (105, 'Negros Teachers\' Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1079', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (106, 'Novo Ecijano Teachers’ Mutual Benefit Association Inc. (NETMBAI)', 'lance.depasion@deped.gov.ph', '143', NULL, NULL, 9, 'Expired', NULL, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (107, 'Novo Ecijano Teachers’ Mutual Benefit Association Inc. (NETMBAI)', 'lance.depasion@deped.gov.ph', '2024A-B', NULL, NULL, 9, 'Expired', NULL, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (108, 'Olongapo City National High School Employees Multi-Purpose Cooperative Inc.', 'lance.depasion@deped.gov.ph', '1249', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (109, 'Pampanga High School Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1097', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (110, 'Pangasinan Public School Teachers Mutual Benefits Association Inc. (formerly: Teachers Association of Pangasinan Inc.)', 'lance.depasion@deped.gov.ph', '116', NULL, NULL, 5, 'Expired', NULL, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (111, 'Paramount Life & General Insurance Corporation', 'lance.depasion@deped.gov.ph', '1119', NULL, '2016A-C', 4, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (112, 'Paramount Life & General Insurance Corporation', 'lance.depasion@deped.gov.ph', '2016A-C', NULL, NULL, 4, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (113, 'Philippine Business Bank Inc. A Savings Bank', 'lance.depasion@deped.gov.ph', '1021', NULL, NULL, 1, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (114, 'Philippine Life Financial Assurance Corporation', 'lance.depasion@deped.gov.ph', '1014', NULL, '0045A-C', 4, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (115, 'Philippine Life Financial Assurance Corporation', 'lance.depasion@deped.gov.ph', '0045A-C', NULL, NULL, 4, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (116, 'Philippine Public School Teachers Association Inc. (PPSTAI)', 'lance.depasion@deped.gov.ph', '119', '0044A-C', NULL, 5, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (117, 'Philippine Public School Teachers Association Inc. (PPSTAI)', 'lance.depasion@deped.gov.ph', '0044A-C', NULL, NULL, 5, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (118, 'Philippines International Life Insurance Company Inc.', 'lance.depasion@deped.gov.ph', '1047', NULL, '0035A-C', 4, 'Expired', NULL, 0, 0, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, NULL, '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (119, 'Philippines International Life Insurance Company Inc.', 'lance.depasion@deped.gov.ph', '0035A-C', NULL, NULL, 4, 'Expired', NULL, 0, 0, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, NULL, '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (120, 'Piwong Multipurpose Cooperative', 'lance.depasion@deped.gov.ph', '1242', NULL, NULL, 2, 'Expired', NULL, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '[\"1\"]', NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (121, 'Producers Savings Bank Corporation', 'lance.depasion@deped.gov.ph', '1171', NULL, NULL, 1, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (122, 'Quezon National High School Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1052', '2029', NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (123, 'Quezon National High School Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '2029', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (124, 'Quezon Public School Teachers and Employees Credit Cooperative (QPSTECC)', 'lance.depasion@deped.gov.ph', '1192', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (125, 'R6 Teachers Association Inc.', 'lance.depasion@deped.gov.ph', '1075', NULL, NULL, 5, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (126, 'Ramon Avanceña National High School Faculty And Employees Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1236', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (127, 'Rang-ay Bank (A Rural Bank) Inc.', 'lance.depasion@deped.gov.ph', '300', NULL, NULL, 1, 'Expired', NULL, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (128, 'Romblon National High School Teachers & Employees Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1243', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (129, 'Rosales National High School Teachers And Employees Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1234', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (130, 'Rural Bank of Angeles Inc.', 'lance.depasion@deped.gov.ph', '1239', NULL, NULL, 1, 'Expired', NULL, 0, 1, 0, 1, 1, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (131, 'Rural Bank of Bambang (Nueva Vizcaya) Inc.', 'lance.depasion@deped.gov.ph', '1071', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (132, 'Rural Bank of Barili (Cebu) Inc.', 'lance.depasion@deped.gov.ph', '502', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (133, 'Rural Bank of Dulag (Leyte) Inc.', 'lance.depasion@deped.gov.ph', '816', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (134, 'Rural Bank of Ibajay Inc.', 'lance.depasion@deped.gov.ph', '1158', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (135, 'Rural Bank of Irosin (Sorsogon) Inc.', 'lance.depasion@deped.gov.ph', '893', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (136, 'Rural Bank of Malolos Inc.', 'lance.depasion@deped.gov.ph', '1229', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (137, 'Rural Bank of Manukan (Zamboanga del Norte) Inc.', 'lance.depasion@deped.gov.ph', '1091', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (138, 'Rural Bank of Naic Inc.', 'lance.depasion@deped.gov.ph', '1263', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (139, 'Rural Bank of San Jacinto (Masbate) Inc.', 'lance.depasion@deped.gov.ph', '1150', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (140, 'Rural Bank of Tangub City Inc.', 'lance.depasion@deped.gov.ph', '1040', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (141, 'Samal Island Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1265', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (142, 'Santiago-San Isidro Teachers Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1153', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (143, 'Sorsogon Public School Teachers & Employees Multi-Purpose Cooperative Inc.', 'lance.depasion@deped.gov.ph', '1133', '2022', NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (144, 'Sorsogon Public School Teachers & Employees Multi-Purpose Cooperative Inc.', 'lance.depasion@deped.gov.ph', '2022', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (145, 'Sta. Ana Multi-Purpose Cooperative (SAMULCO)', 'lance.depasion@deped.gov.ph', '1233', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (146, 'Sta. Elena High School Teachers and Employees Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1076', NULL, NULL, 2, 'Expired', NULL, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (147, 'Sun Savings Bank Inc.', 'lance.depasion@deped.gov.ph', '1146', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (148, 'Tabon Secondary Teachers and Employees Cooperative', 'lance.depasion@deped.gov.ph', '1250', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (149, 'Tacurong Teachers and Employees Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1094', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (150, 'Tagum Cooperative', 'lance.depasion@deped.gov.ph', '1105', '2041A-C', NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (151, 'Tagum Cooperative', 'lance.depasion@deped.gov.ph', '2041A-C', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (152, 'Tanay District Teachers Credit Cooperative', 'lance.depasion@deped.gov.ph', '1072', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (153, 'Teachers Association of Pangasinan Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '372', '2030', NULL, 2, 'Expired', NULL, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (154, 'Teachers Association of Pangasinan Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '2030', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (155, 'Teachers Association of Pangasinan Dagupan City and San Carlos City Mutual Benefit Association Inc. (formerly: Teachers Association of Pangasinan Dagupan City and San Carlos City Inc.)', 'lance.depasion@deped.gov.ph', '691', NULL, NULL, 5, 'Expired', NULL, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (156, 'UCPB Savings Bank Inc.', 'lance.depasion@deped.gov.ph', '0297A', NULL, NULL, 1, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-12 00:03:13', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (157, 'Unilink Bank Inc. (A Rural Bank)', 'lance.depasion@deped.gov.ph', '1200', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (158, 'United Coconut Planters Life Assurance Corporation (COCOLIFE)', 'lance.depasion@deped.gov.ph', '293', NULL, '0193A-C', 4, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (159, 'United Coconut Planters Life Assurance Corporation (COCOLIFE)', 'lance.depasion@deped.gov.ph', '0193A-C', NULL, NULL, 4, 'Expired', NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (160, 'United Teachers Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '357', NULL, NULL, 2, 'Expired', NULL, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '[\"1\"]', NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (161, 'Wealth Development Bank Corporation', 'lance.depasion@deped.gov.ph', '1164', NULL, NULL, 1, 'Expired', NULL, 0, 1, 1, 0, 0, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, '[\"1\"]', '[\"1\"]', NULL, NULL, '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (162, 'Zamboanga City Rural Bank Inc.', 'lance.depasion@deped.gov.ph', '906', NULL, NULL, 1, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (163, 'Zamboanga Del Sur-Sibugay-Pagadian City Teachers\' Association (ZSSPCTA) Inc.', 'lance.depasion@deped.gov.ph', '152', NULL, NULL, 5, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (164, 'Zamboanga Peninsula Teachers and Community Multi-Purpose Cooperative (ZAMPTECO)', 'lance.depasion@deped.gov.ph', '1089', NULL, NULL, 2, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, '2025-08-11 04:41:35', '2025-08-11 04:41:35', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (165, 'Agusan del Sur Teachers and Community Multi-Purpose Cooperative', 'lance.depasion@deped.gov.ph', '1041', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:47:41', '2025-08-11 04:47:41', DEFAULT, DEFAULT);
INSERT INTO `existing_plis` VALUES (166, 'Alay Kapwa Multi-Purpose Cooperative (Tabaco National High School)', 'lance.depasion@deped.gov.ph', '1227', NULL, NULL, 8, 'Expired', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-11 04:47:41', '2025-08-11 04:47:41', DEFAULT, DEFAULT);

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
  INDEX `jobs_queue_index`(`queue` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2025_07_01_063718_add_status_to_users_table', 2);
INSERT INTO `migrations` VALUES (5, '2025_07_01_075228_add_address_and_contact_to_users_table', 3);
INSERT INTO `migrations` VALUES (6, '2025_07_29_061311_add_userrole_and_assigned_pli_to_users_table', 4);
INSERT INTO `migrations` VALUES (7, '2025_07_29_064149_create_plis_table', 5);
INSERT INTO `migrations` VALUES (8, '2025_07_29_074920_create_pli_user_table', 6);
INSERT INTO `migrations` VALUES (9, '2025_07_29_075651_drop_in_charge_and_assigned_pli_columns', 7);
INSERT INTO `migrations` VALUES (10, '2025_07_30_031626_update_userrole_enum_on_users_table', 7);
INSERT INTO `migrations` VALUES (11, '2025_07_31_030057_add_authorized_representative_columns_to_users_table', 8);
INSERT INTO `migrations` VALUES (12, '2025_07_31_064104_add_classification_and_region_to_users_table', 9);
INSERT INTO `migrations` VALUES (13, '2025_07_31_080413_create_documents_table', 10);
INSERT INTO `migrations` VALUES (14, '2025_08_04_015919_create_classifications_table', 11);
INSERT INTO `migrations` VALUES (15, '2025_08_04_015937_create_regions_table', 11);
INSERT INTO `migrations` VALUES (16, '2025_08_04_024806_add_classification_id_to_plis_table', 12);
INSERT INTO `migrations` VALUES (17, '2025_08_04_025738_add_classification_id_to_users_table', 13);
INSERT INTO `migrations` VALUES (18, '2025_08_04_055509_change_region_column_type_in_users_table', 14);
INSERT INTO `migrations` VALUES (19, '2025_08_04_060835_add_region_to_plis_table', 15);
INSERT INTO `migrations` VALUES (20, '2025_08_04_061450_add_region_json_column_to_plis_table', 16);
INSERT INTO `migrations` VALUES (21, '2025_08_06_034538_create_documents_table', 17);
INSERT INTO `migrations` VALUES (22, '2025_08_06_040103_create_documents_table', 18);
INSERT INTO `migrations` VALUES (23, '2025_08_06_051516_update_ar_fields_in_users_table', 19);
INSERT INTO `migrations` VALUES (24, '2025_08_06_071826_remove_classification_column_from_users_table', 20);
INSERT INTO `migrations` VALUES (25, '2025_08_07_071406_add_feedback_flags_to_documents_table', 21);
INSERT INTO `migrations` VALUES (26, '2025_08_11_153552_create_classification_documents_table', 22);
INSERT INTO `migrations` VALUES (27, '2025_08_11_153918_add_classification_document_id_to_documents_table', 22);
INSERT INTO `migrations` VALUES (28, '2025_08_11_161200_create_additional_requirements_table', 23);
INSERT INTO `migrations` VALUES (29, '2025_08_11_161428_create_additional_requirement_uploads_table', 24);
INSERT INTO `migrations` VALUES (30, '2025_08_13_015316_update_status_enum_in_plis_table', 25);
INSERT INTO `migrations` VALUES (31, '2025_08_13_024539_add_nir_columns_to_plis_table', 26);
INSERT INTO `migrations` VALUES (32, '2025_08_13_052241_create_provinces_table', 27);
INSERT INTO `migrations` VALUES (33, '2025_08_13_052532_modify_column_positions_on_plis_table', 28);
INSERT INTO `migrations` VALUES (34, '2025_08_14_014822_add_officers_to_users_table', 29);
INSERT INTO `migrations` VALUES (35, '2025_08_14_020742_update_officers_to_users_table', 30);
INSERT INTO `migrations` VALUES (36, '2025_08_15_062249_add_official_email_to_existing_plis_table', 31);
INSERT INTO `migrations` VALUES (37, '2025_08_18_055436_create_pli_email_verifications_table', 32);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
INSERT INTO `password_reset_tokens` VALUES ('lanceadriandepasion@gmail.com', '$2y$12$luzF1xiF2MCl0f0.2FbLDODjaViaVSfQ3IDOK8MbZ09DsojI5xlWC', '2025-07-01 05:51:13');
INSERT INTO `password_reset_tokens` VALUES ('sample.depedsupplier+1@gmail.com', '$2y$12$4tGjU7.DLj55kq2gvyPV4.NWmN9Q7wgV2IwYoFeo8QmNbN3K1PAi6', '2025-07-01 05:44:39');
INSERT INTO `password_reset_tokens` VALUES ('user1@this.com', '$2y$12$yMB3ZhkfdAFwJnUZ1bM9mOAYyF3lk9FuwXevLJv772V.Qfr7dB/Iy', '2025-07-01 05:02:51');

-- ----------------------------
-- Table structure for pli_email_verifications
-- ----------------------------
DROP TABLE IF EXISTS `pli_email_verifications`;
CREATE TABLE `pli_email_verifications`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `existing_pli_id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pli_email_verifications_existing_pli_id_foreign`(`existing_pli_id` ASC) USING BTREE,
  INDEX `pli_email_verifications_token_expires_at_index`(`token` ASC, `expires_at` ASC) USING BTREE,
  CONSTRAINT `pli_email_verifications_existing_pli_id_foreign` FOREIGN KEY (`existing_pli_id`) REFERENCES `existing_plis` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pli_email_verifications
-- ----------------------------
INSERT INTO `pli_email_verifications` VALUES (3, 3, 'lanceadriandepasion@gmail.com', 'lpcb0fPNNlLVIVFVPPfsauudNeB3yDwaAvtkcfdhUjqtSRTvqWB8CnAilU6eXTi3', '2025-08-19 01:10:38', '2025-08-19 02:10:00', '2025-08-19 01:10:00', '2025-08-19 01:10:38');
INSERT INTO `pli_email_verifications` VALUES (4, 6, 'lanceadriandepasion@gmail.com', '6QNK8ku6MIgf6y7ozbk5IBYS7gMHAY6hcQHGEetczFhv6iCMjRQFDHz59DGTNksx', '2025-08-19 01:20:24', '2025-08-19 02:19:58', '2025-08-19 01:19:58', '2025-08-19 01:20:24');
INSERT INTO `pli_email_verifications` VALUES (6, 51, 'lance.depasion@deped.gov.ph', '5LUEaKnyiDaffUu8OcsoDwalQITJEVNjRiI10saWYFIBRO6tNysLoyDByw98yLKL', '2025-08-19 02:13:52', '2025-08-19 03:13:19', '2025-08-19 02:13:19', '2025-08-19 02:13:52');

-- ----------------------------
-- Table structure for pli_user
-- ----------------------------
DROP TABLE IF EXISTS `pli_user`;
CREATE TABLE `pli_user`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `pli_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pli_user_user_id_foreign`(`user_id` ASC) USING BTREE,
  INDEX `pli_user_pli_id_foreign`(`pli_id` ASC) USING BTREE,
  CONSTRAINT `pli_user_pli_id_foreign` FOREIGN KEY (`pli_id`) REFERENCES `plis` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `pli_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 91 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pli_user
-- ----------------------------
INSERT INTO `pli_user` VALUES (82, 75, 37, NULL, NULL);
INSERT INTO `pli_user` VALUES (83, 25, 37, NULL, NULL);
INSERT INTO `pli_user` VALUES (84, 25, 35, NULL, NULL);
INSERT INTO `pli_user` VALUES (85, 76, 38, NULL, NULL);
INSERT INTO `pli_user` VALUES (86, 25, 38, NULL, NULL);
INSERT INTO `pli_user` VALUES (87, 26, 38, NULL, NULL);
INSERT INTO `pli_user` VALUES (88, 73, 35, NULL, NULL);
INSERT INTO `pli_user` VALUES (89, 77, 39, NULL, NULL);
INSERT INTO `pli_user` VALUES (90, 25, 39, NULL, NULL);

-- ----------------------------
-- Table structure for plis
-- ----------------------------
DROP TABLE IF EXISTS `plis`;
CREATE TABLE `plis`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mas_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `insurance_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `classification_id` bigint UNSIGNED NULL DEFAULT NULL,
  `region` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `status` enum('Active','Inactive','Expired','Revoked') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `CAR` tinyint(1) NULL DEFAULT NULL,
  `CAR_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `NCR` tinyint(1) NULL DEFAULT NULL,
  `NCR_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `NIR` tinyint(1) NULL DEFAULT NULL,
  `NIR_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R01` tinyint(1) NULL DEFAULT NULL,
  `R01_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R02` tinyint(1) NULL DEFAULT NULL,
  `R02_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R03` tinyint(1) NULL DEFAULT NULL,
  `R03_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R04A` tinyint(1) NULL DEFAULT NULL,
  `R04A_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R04B` tinyint(1) NULL DEFAULT NULL,
  `R04B_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R05` tinyint(1) NULL DEFAULT NULL,
  `R05_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R06` tinyint(1) NULL DEFAULT NULL,
  `R06_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R07` tinyint(1) NULL DEFAULT NULL,
  `R07_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R08` tinyint(1) NULL DEFAULT NULL,
  `R08_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R09` tinyint(1) NULL DEFAULT NULL,
  `R09_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R10` tinyint(1) NULL DEFAULT NULL,
  `R10_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R11` tinyint(1) NULL DEFAULT NULL,
  `R11_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R12` tinyint(1) NULL DEFAULT NULL,
  `R12_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `R13` tinyint(1) NULL DEFAULT NULL,
  `R13_Prov` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of plis
-- ----------------------------
INSERT INTO `plis` VALUES (35, 'New Registrant - 1', NULL, NULL, NULL, 1, '[\"CAR\",\"NCR\",\"NIR\"]', 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 01:08:39', '2025-08-19 01:08:39');
INSERT INTO `plis` VALUES (37, 'Baguio City School Teachers and Employees Multi-Purpose Cooperative', '1082', NULL, NULL, 2, '[\"NCR\"]', 'Active', 0, '[\"1\"]', 1, '[]', NULL, NULL, 0, '[]', 0, '[]', 0, '[]', 0, '[]', 0, '[]', 0, '[]', 0, '[]', 0, '[]', 0, '[]', 0, '[]', 0, '[]', 0, '[]', 0, '[]', 0, '[]', '2025-08-19 01:20:42', '2025-08-19 01:20:42');
INSERT INTO `plis` VALUES (38, 'Registrant PLI - 2', NULL, NULL, NULL, 3, '[\"CAR\",\"NCR\",\"NIR\"]', 'Active', 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, '2025-08-19 01:43:45', '2025-08-19 01:45:42');
INSERT INTO `plis` VALUES (39, 'East West Rural Bank Inc. (EWRBI)', '1010', NULL, NULL, 1, '[\"NCR\",\"R01\",\"R02\",\"R03\",\"R04A\",\"R04B\",\"R05\",\"R06\",\"R07\",\"R08\",\"R09\",\"R10\",\"R11\",\"R12\",\"R13\"]', 'Active', 0, '[\"1\"]', 1, '[{\"value\":null}]', NULL, NULL, 1, '[{\"value\":null}]', 1, '[{\"value\":null}]', 1, '[{\"value\":null}]', 1, '[{\"value\":null}]', 1, '[{\"value\":null}]', 1, '[{\"value\":null}]', 1, '[{\"value\":null}]', 1, '[{\"value\":null}]', 1, '[{\"value\":null}]', 1, '[{\"value\":null}]', 1, '[{\"value\":null}]', 1, '[{\"value\":null}]', 1, '[{\"value\":null}]', 1, '[{\"value\":null}]', '2025-08-19 02:14:11', '2025-08-19 02:34:32');

-- ----------------------------
-- Table structure for provinces
-- ----------------------------
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `provinces_region_id_foreign`(`region_id` ASC) USING BTREE,
  CONSTRAINT `provinces_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of provinces
-- ----------------------------

-- ----------------------------
-- Table structure for regions
-- ----------------------------
DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinces` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `regions_code_unique`(`code` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of regions
-- ----------------------------
INSERT INTO `regions` VALUES (1, 'CAR', 'Cordillera Administrative Region', NULL, '2025-08-04 02:14:12', '2025-08-04 02:14:12');
INSERT INTO `regions` VALUES (2, 'NCR', 'National Capital Region', NULL, '2025-08-04 02:14:22', '2025-08-04 02:14:22');
INSERT INTO `regions` VALUES (3, 'R01', 'Region I: Ilocos Region', NULL, '2025-08-04 02:14:32', '2025-08-04 02:14:32');
INSERT INTO `regions` VALUES (4, 'R02', 'Region II: Cagayan Valley', NULL, '2025-08-04 02:14:41', '2025-08-04 02:14:41');
INSERT INTO `regions` VALUES (5, 'R03', 'Region III: Central Luzon', NULL, '2025-08-04 02:14:51', '2025-08-04 02:14:51');
INSERT INTO `regions` VALUES (6, 'R04A', 'Region IV-A: CALABARZON', NULL, '2025-08-04 02:15:00', '2025-08-04 02:15:00');
INSERT INTO `regions` VALUES (7, 'R04B', 'Region IV-B: MIMAROPA Region', NULL, '2025-08-04 02:15:11', '2025-08-04 02:15:11');
INSERT INTO `regions` VALUES (8, 'R05', 'Region V: Bicol Region', NULL, '2025-08-04 02:15:20', '2025-08-04 02:15:20');
INSERT INTO `regions` VALUES (9, 'R06', 'Region VI: Western Visayas', NULL, '2025-08-04 02:15:30', '2025-08-04 02:15:30');
INSERT INTO `regions` VALUES (10, 'R07', 'Region VII: Central Visayas', NULL, '2025-08-04 02:15:40', '2025-08-04 02:15:40');
INSERT INTO `regions` VALUES (11, 'R08', 'Region VIII: Eastern Visayas', NULL, '2025-08-04 02:15:50', '2025-08-04 02:15:50');
INSERT INTO `regions` VALUES (12, 'R09', 'Region IX: Zamboanga Peninsula', NULL, '2025-08-04 02:17:48', '2025-08-04 02:17:48');
INSERT INTO `regions` VALUES (13, 'R10', 'Region X: Northern Mindanao', NULL, '2025-08-04 02:17:58', '2025-08-04 02:17:58');
INSERT INTO `regions` VALUES (14, 'R11', 'Region XI: Davao Region', NULL, '2025-08-04 02:18:08', '2025-08-04 02:18:08');
INSERT INTO `regions` VALUES (15, 'R12', 'Region XII: SOCCSKSARGEN', NULL, '2025-08-04 02:18:18', '2025-08-04 02:18:18');
INSERT INTO `regions` VALUES (16, 'R13', 'Region XIII: Caraga', NULL, '2025-08-04 02:18:29', '2025-08-04 02:18:29');
INSERT INTO `regions` VALUES (18, 'NIR', 'Negros Island Region', NULL, '2025-08-04 06:27:49', '2025-08-13 02:44:00');

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
  INDEX `sessions_user_id_index`(`user_id` ASC) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('7cCjUtxZnqkdcjBE1gHlaxS5klQv713Mgp1O79p1', 73, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTXZGWnlHRlg2RXhWVmxsN2tiSDJjM3pUSDhMZ3JCTE5DN21aaUxJYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3VzZXItZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NzM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRxdm9HT1lzQ3gxWm5pUnJPU3hwM0d1THhjL2ZXTTR6YW11eXRwbEdGQ1REeE55anFtcksvNiI7fQ==', 1755574067);
INSERT INTO `sessions` VALUES ('AX6tytB3S2VBE94Ud3mRaJAkFcQFRZlzCSDTb2KY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoidUVMQWYzOW1pQWFxRE82Z2Jva3drM2M5WEZYMUFHUmZ3MjdxeEJXeSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755574356);
INSERT INTO `sessions` VALUES ('EXxrRa15zB2w1KvYmQFwXiJz88lLpQ0xIgYGAx24', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNUh5T2NrYnFSY0RMU2JTZWZKUGh6S29zWjVIRkZzWmJ0SU9PbkVCUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755574007);
INSERT INTO `sessions` VALUES ('FIrBI91K9TOmFi0HrwfjOiJ5QgZIiBIoZpUoSsJc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMzZFUVdmcUNKWFlIRk5uOGc3alEwZDRKY3A2cTkwN2tQcHJsMEhnNSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755567553);
INSERT INTO `sessions` VALUES ('fQrtsiqV8J5vvb2jSKqPeCQgDIWSOTsjMHxRexx7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiOGRSbmpsQ2R6TGx6UlBPTm9OTnRhV21Zb1JQUEZOY0puSDhNVUVVNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755567523);
INSERT INTO `sessions` VALUES ('g8pe5DkTmpv3YWZMuYPtUJYbR1ifJwebNXioqV7C', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiSVRRYk1hY3lra0dUdVZoTEptNGJMdFpHZFBod0N5bVhheGtJRndZSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755567350);
INSERT INTO `sessions` VALUES ('GhbdO64BRrohDLnV3AtLdO8CiRlb1YQIpaGGjBca', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZjZydGZFcUdEaWV4Y0Exdm5NbjlZRVRMQmlxZVkwNExKbVBDM203MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3Rlci9leGlzdGluZy9jb25maXJtIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxMjoicmVnaXN0cmF0aW9uIjthOjI6e3M6MTU6ImV4aXN0aW5nX3BsaV9pZCI7aToyO3M6OToibG9hbl9jb2RlIjtzOjQ6IjExMTMiO319', 1755574542);
INSERT INTO `sessions` VALUES ('H3db9SdiUAJbwpkbdtucWID3WeDcgi5PcvXNR1il', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTUVaV1pzQmlyN3JyQlRXN3hCaVRLd0NVMUs4aFYzRnc4aWpiQUpFdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755567904);
INSERT INTO `sessions` VALUES ('jdU2WZSHV1B2IfxjpZSkIINtgIGeti8XM4M4oXFK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiQTlBSGVwRjdsSWRmZmptaE1Kc21FMXduckhtUEpNRkR5QmNYd1RXeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755570881);
INSERT INTO `sessions` VALUES ('L3IDJAvztqPOW6hfzvTfGwRZxXmAdnfJMMnNnKp9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYUxZYk82blJXODBzSEhpajJIWWttbldRM0M2Y0U2eVhObUlOZ3JaVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755570833);
INSERT INTO `sessions` VALUES ('mgxLJN39ts9JQnly83BVJLAdkn3xCJXypVPyPCF3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMW41bG9Tam80Z0R1dGpad1NSOTZDSFdEWlNxWDJ2SlA0RmY3eFN6WiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755569365);
INSERT INTO `sessions` VALUES ('ol54kS9z1KHAVCnPiK05cjINgGkw38bseriOX3vY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiQjFLWlpYNklOOURiUHR4VGlyN3A4OUZoM2FyQ0pKWndnb3VpSUJHZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755567788);
INSERT INTO `sessions` VALUES ('opVtE8QvnMobaTOfY2RDSUiRiFFBp3mAFwou9iGS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZ09pbEJaQXdJbjNBVTQ5d1Y5MDFMbVBOUVhua2ViSmJCZUNqcWFwdyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755567747);
INSERT INTO `sessions` VALUES ('qO6xMcPvzfF1rifaeSTa1Zd2NXQdKlFzbIWnQnIw', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWWN4T2JaSWV0SnlPUnlyUnJaU3F5MVg0S2x2Uk9IYmVyT3owejd2ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9yZWdpc3RyYW50cy9mb3ItZXZhbHVhdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiQwclVLWjJ0T1EvYjNjMHlCSEQ0ejJPWG1SZmtVTy81d0UvNHRqOEoyMFJGM0x4MGtOeDdRLiI7fQ==', 1755585987);
INSERT INTO `sessions` VALUES ('uNobdpiR2mSirpX88KBzu1EwRrMoUw7AEXrnDZaV', 25, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibUlLM2JFeVh0cGR4VThFNVI5TEVWQ1pIejRyeVREeVplSmk0OXBRTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9yZWdpc3RyYW50cy9mb3ItZXZhbHVhdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI1O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkSzU0LjB6ZWpsaHVUYTc3VmxPZHk5TzRaYVRUeTU4bGtSN2Nva1Q0RUc4ZWNDQ0pnelBnWmUiO3M6ODoiZmlsYW1lbnQiO2E6MDp7fX0=', 1755568215);
INSERT INTO `sessions` VALUES ('XMMO5mcmmv3Wz5yuQ8r9Ikz8rTHDnGmKAFdLgBvg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTEpaYnA1UGU3ZmFZRmJRT2xGbWtNeFF0WVAzQ2JSZXZFMWNVYTdDZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755568038);
INSERT INTO `sessions` VALUES ('YkdU7bTfRyp9wDE2hovwe0vZnOz4tTOBW94RT3kA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNDF1NWxOUlhSd0pUazhHcFowRk1hckJTemlSMXN3V2tFOW5zeGNmMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755572906);
INSERT INTO `sessions` VALUES ('ZoJzGUHZ2HhzLrhnZu1YxQuqTzB99Ria9yONdlwt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiUTF1T1MyM0ZNMmlBOTBoOHgyc2Jyc0dYbnhRMUxJZkdNRFV0ZHEzSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755567705);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userrole` enum('None','Evaluator','Reviewer','Approver','SuperAdmin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'None',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'for-review',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR1_FN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR1_MN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR1_LN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR1_Designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR1_Contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR1_Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR2_FN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR2_MN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR2_LN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR2_Designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR2_Contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR2_Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR3_FN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR3_MN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR3_LN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR3_Designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR3_Contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AR3_Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `region` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `classification_id` bigint UNSIGNED NULL DEFAULT NULL,
  `ho1_fn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ho1_mn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ho1_ln` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ho1_designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ho1_designation_other` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ho1_contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ho1_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ho2_fn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ho2_mn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ho2_ln` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ho2_designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ho2_designation_other` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ho2_contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ho2_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `co1_fn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `co1_mn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `co1_ln` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `co1_designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `co1_contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `co1_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `co2_fn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `co2_mn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `co2_ln` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `co2_designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `co2_contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `co2_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lo1_fn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lo1_mn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lo1_ln` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lo1_designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lo1_contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lo1_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lo2_fn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lo2_mn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lo2_ln` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lo2_designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lo2_contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lo2_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE,
  INDEX `users_classification_id_foreign`(`classification_id` ASC) USING BTREE,
  CONSTRAINT `users_classification_id_foreign` FOREIGN KEY (`classification_id`) REFERENCES `classifications` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 78 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'DPLIAS Admin', 'dplias@admin.com', 'SuperAdmin', 'reviewer', NULL, '$2y$12$0rUKZ2tOQ/b3c0yBHD4z2OXmRfkUO/5wE/4tj8J20RF3Lx0kNx7Q.', 'admin', 'oxSayk61wJQpZPa7mkq7n6pQJq5MFuG5WPrBqFm3y0z4WG2p5rEgXVFyV2yY', '2025-07-01 02:26:04', '2025-07-30 03:17:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (25, 'Admin Evaluator 1', 'evaluator1@admin.com', 'Evaluator', 'reviewer', NULL, '$2y$12$K54.0zejlhuTa77VlOdy9O4ZaTTy58lkR7cokT4EG8ecCCJgzPgZe', 'admin', NULL, '2025-07-29 07:38:07', '2025-07-29 08:03:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (26, 'Admin Evaluator 2', 'evaluator2@admin.com', 'Evaluator', 'reviewer', NULL, '$2y$12$zCDZFM6WdJdebPuSKkpZOes5G2YnHc9u1my/oeW8DQpPggV0wR04q', 'admin', NULL, '2025-07-29 07:38:33', '2025-07-29 08:02:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (27, 'Admin Reviewer 1', 'reviewer1@admin.com', 'Reviewer', 'reviewer', NULL, '$2y$12$h6PS2D/lIn.1egaGbw/BbO9ew5hwueVD6/Ondr35GD9EvciV4CaZO', 'admin', NULL, '2025-07-29 07:39:06', '2025-07-29 08:02:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (30, 'Admin Approver 1', 'approver1@admin.com', 'Approver', 'reviewer', NULL, '$2y$12$Cfl0ewX/AYHpVjrvJlBVuOe1UBf0akUIaKQ2SGQIyLdHu.obwDJOC', 'admin', NULL, '2025-07-29 08:02:13', '2025-07-29 08:02:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (31, 'Admin Reviewer 2', 'reviewer2@admin.com', 'Reviewer', 'reviewer', NULL, '$2y$12$boeNuq27rJmE467QE0SolOxwjFOpt4chlk84EdUgqRsjSlnbMd6ma', 'admin', NULL, '2025-07-30 03:54:00', '2025-07-30 03:54:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (32, 'Admin Reviewer 3', 'reviewer3@admin.com', 'Reviewer', 'reviewer', NULL, '$2y$12$PEe18LpWVkcOkVCqUKkw2u/4QlhiVHUyFtxuxE5j3LPF.e/KXdgZC', 'admin', NULL, '2025-07-30 03:54:27', '2025-07-30 03:54:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (33, 'Admin Reviewer 4', 'reviewer4@admin.com', 'Reviewer', 'reviewer', NULL, '$2y$12$Kybb6daQ16f/jG63Q9BExeIG8bXm6EoHACA73K56yryO5aQfCe3VG', 'admin', NULL, '2025-07-30 07:51:08', '2025-07-30 07:51:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (34, 'Admin Evaluator 3', 'evaluator3@admin.com', 'Evaluator', 'reviewer', NULL, '$2y$12$g46eLyK38.fm3UHXpzH/1ODmZqa4jg6FTMUYYV.QxsM4ziZoOzhKW', 'admin', NULL, '2025-07-31 00:55:52', '2025-07-31 00:55:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (35, 'Admin Evaluator 4', 'evaluator4@admin.com', 'Evaluator', 'reviewer', NULL, '$2y$12$8JZhOXPAqyisnRVTeoN/VuCwJpGVe5CW8aVFPc5MaOPa7qp7i.GzW', 'admin', NULL, '2025-07-31 00:56:11', '2025-07-31 00:56:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (36, 'Admin Evaluator 5', 'evaluator5@admin.com', 'Evaluator', 'reviewer', NULL, '$2y$12$Y3f15v50eoZqGpz2xzY12uf7o3Zpmtmd4AC.7eoaCuRDCxoySRApW', 'admin', NULL, '2025-07-31 00:56:34', '2025-07-31 00:56:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (37, 'Admin Approver 2', 'approver2@admin.com', 'Approver', 'reviewer', NULL, '$2y$12$/iC77kF9Z5HbKPXxvDMYzurFAL9f9GjRaVHs1SW2mtu/ogF9XqxSe', 'admin', NULL, '2025-07-31 01:03:19', '2025-07-31 01:03:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (73, 'New Registrant - 1', 'pli1@new.com', 'None', 'for-evaluation', NULL, '$2y$12$qvoGOYsCx1ZniRrOSxp3GuLxc/fWM4zamuytplGFCTDxNyjqmrK/6', 'user', NULL, '2025-08-19 01:08:39', '2025-08-19 01:47:44', 'Sample Address', '09111111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"CAR\",\"NCR\",\"NIR\"]', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (75, 'Baguio City School Teachers and Employees Multi-Purpose Cooperative', 'lanceadriandepasion@gmail.com', 'None', 'for-evaluation', NULL, '$2y$12$bSHyfuv7pYk5fzTq2dh6rOJ2WjWIyq3TOC3PyppZdH3MBgxRFEpIS', 'user', NULL, '2025-08-19 01:20:42', '2025-08-19 01:36:49', 'Sample Address', '09111111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"NCR\"]', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (76, 'Registrant PLI - 2', 'pli2@new.com', 'None', 'for-evaluation', NULL, '$2y$12$bUqtjhI6UwYvkPhbKbm1g.NaotSejJTT/O8bHYbBhzAp49t9SDE8y', 'user', NULL, '2025-08-19 01:43:45', '2025-08-19 01:44:57', 'Sample Address', '091111111113', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"CAR\",\"NCR\",\"NIR\"]', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (77, 'East West Rural Bank Inc. (EWRBI)', 'lance.depasion@deped.gov.ph', 'None', 'for-evaluation', NULL, '$2y$12$9jInvktSYU1Yo6tiLmzQkuEc6QAKcZWumoIDTRp16SStUgNlrux0u', 'user', NULL, '2025-08-19 02:14:11', '2025-08-19 02:42:05', 'Sample Address', '09111111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"NCR\",\"R01\",\"R02\",\"R03\",\"R04A\",\"R04B\",\"R05\",\"R06\",\"R07\",\"R08\",\"R09\",\"R10\",\"R11\",\"R12\",\"R13\"]', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
