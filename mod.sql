/*
 Navicat Premium Data Transfer

 Source Server         : mks
 Source Server Type    : MySQL
 Source Server Version : 100511
 Source Host           : 103.114.146.13:3306
 Source Schema         : mod2

 Target Server Type    : MySQL
 Target Server Version : 100511
 File Encoding         : 65001

 Date: 13/10/2022 11:38:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for adjust
-- ----------------------------
DROP TABLE IF EXISTS `adjust`;
CREATE TABLE `adjust`  (
  `adj_id` int NOT NULL AUTO_INCREMENT,
  `fy_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `dept_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `accept` int NULL DEFAULT NULL,
  PRIMARY KEY (`adj_id`) USING BTREE,
  INDEX `dept_id`(`dept_id`) USING BTREE,
  INDEX `fy_id`(`fy_id`) USING BTREE,
  CONSTRAINT `adjust_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `adjust_ibfk_2` FOREIGN KEY (`fy_id`) REFERENCES `fy` (`fy_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 190 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of adjust
-- ----------------------------
INSERT INTO `adjust` VALUES (151, '2021-2022', 'HRD001', 0);
INSERT INTO `adjust` VALUES (152, '2021-2022', 'Dep_010', 0);
INSERT INTO `adjust` VALUES (153, '2021-2022', 'Dep_009', 0);
INSERT INTO `adjust` VALUES (154, '2021-2022', 'Dep_008', 0);
INSERT INTO `adjust` VALUES (155, '2021-2022', 'Dep_007', 0);
INSERT INTO `adjust` VALUES (156, '2021-2022', 'Dep_006', 0);
INSERT INTO `adjust` VALUES (157, '2021-2022', 'Dep_005', 0);
INSERT INTO `adjust` VALUES (158, '2021-2022', 'Dep_004', 0);
INSERT INTO `adjust` VALUES (159, '2021-2022', 'Dep_003', 1);
INSERT INTO `adjust` VALUES (160, '2021-2022', 'Dep_002', 1);
INSERT INTO `adjust` VALUES (161, '2021-2022', '123', 0);
INSERT INTO `adjust` VALUES (162, '2021-2022', '001', 1);
INSERT INTO `adjust` VALUES (175, '2020-2021', 'HRD001', 0);
INSERT INTO `adjust` VALUES (176, '2020-2021', 'Dep_010', 0);
INSERT INTO `adjust` VALUES (177, '2020-2021', 'Dep_009', 0);
INSERT INTO `adjust` VALUES (178, '2020-2021', 'Dep_008', 0);
INSERT INTO `adjust` VALUES (179, '2020-2021', 'Dep_007', 0);
INSERT INTO `adjust` VALUES (180, '2020-2021', 'Dep_006', 0);
INSERT INTO `adjust` VALUES (181, '2020-2021', 'Dep_005', 0);
INSERT INTO `adjust` VALUES (182, '2020-2021', 'Dep_004', 0);
INSERT INTO `adjust` VALUES (183, '2020-2021', 'Dep_003', 1);
INSERT INTO `adjust` VALUES (184, '2020-2021', 'Dep_002', 0);
INSERT INTO `adjust` VALUES (185, '2020-2021', '123', 0);
INSERT INTO `adjust` VALUES (186, '2020-2021', '001', 0);
INSERT INTO `adjust` VALUES (188, '2021-2022', 'Dep_11', 1);
INSERT INTO `adjust` VALUES (189, '2021-2022', 'Dep_12', 1);

-- ----------------------------
-- Table structure for adjustdetail
-- ----------------------------
DROP TABLE IF EXISTS `adjustdetail`;
CREATE TABLE `adjustdetail`  (
  `d_id` int NOT NULL AUTO_INCREMENT,
  `adj_id` int NULL DEFAULT NULL,
  `course_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `get_plan` int NULL DEFAULT NULL,
  `univer` int NULL DEFAULT NULL,
  `univer_valunteer` int NULL DEFAULT NULL COMMENT 'ຄູອາສາ',
  `prov` int NULL DEFAULT NULL,
  `intv` int NULL DEFAULT NULL,
  `ad_test` int NULL DEFAULT NULL,
  `std_public` int NULL DEFAULT NULL,
  `emp` int NULL DEFAULT NULL,
  `std_handi` int NULL DEFAULT NULL,
  `std_lan` int NULL DEFAULT NULL,
  `ssk` int NULL DEFAULT NULL,
  `std` int NULL DEFAULT NULL,
  `emp_gov` int NULL DEFAULT NULL,
  `test` int NULL DEFAULT NULL,
  `std_con` int NULL DEFAULT NULL,
  `std_2lan` int NULL DEFAULT NULL,
  `std_inter` int NULL DEFAULT NULL,
  `emp_private` int NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `remark_hrd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`d_id`) USING BTREE,
  INDEX `adj_id`(`adj_id`) USING BTREE,
  INDEX `field_id`(`course_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `adjustdetail_ibfk_1` FOREIGN KEY (`adj_id`) REFERENCES `adjust` (`adj_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `adjustdetail_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `adjustdetail_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1147 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of adjustdetail
-- ----------------------------
INSERT INTO `adjustdetail` VALUES (663, 162, 'uni001_cours048', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (664, 162, 'uni001_cours047', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (665, 162, 'uni001_cours046', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (666, 162, 'uni001_cours045', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (667, 162, 'uni001_cours044', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (668, 162, 'uni003_Course5', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (669, 162, 'uni003_Course4', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (670, 162, 'uni003_course026', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (671, 162, 'uni003_course024', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (672, 162, 'uni003_course023', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (673, 162, 'uni003_course022', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (674, 162, 'uni003_Course97', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (675, 162, 'uni003_Course3', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (676, 162, 'uni003_course021', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (677, 162, 'uni003_course019', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (678, 162, 'uni003_uni002_uni002_Course150', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (679, 162, 'uni003_course012', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (680, 162, 'uni003_course011', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (681, 162, 'uni003_course010', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (682, 162, 'uni003_course009', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (683, 162, 'uni003_course008', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (684, 162, 'uni003_course007', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (685, 162, 'uni003_course006', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (686, 162, 'uni003_course005', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (687, 162, 'uni003_uni002_uni002_Course140', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (688, 162, 'uni003_Course104', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (689, 162, 'uni003_Course01', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (690, 162, 'uni003_course003', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (691, 162, 'uni003_course001', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (692, 162, 'uni003_Course6', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (693, 162, 'uni003_course032', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (694, 162, 'uni003_course031', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (695, 162, 'uni003_course030', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (696, 162, 'uni003_course029', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (697, 162, 'uni003_course028', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (698, 162, 'uni004_fac037', 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (699, 162, 'uni004_fac036', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (700, 162, 'uni004_fac035', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (701, 162, 'uni004_fac034', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (702, 162, 'uni004_fac033', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (703, 162, 'uni004_fac032', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (704, 162, 'uni004_fac031', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (705, 162, 'uni004_fac030', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (706, 162, 'uni004_fac029', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (707, 162, 'uni004_fac028', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (708, 162, 'uni004_fac027', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (709, 162, 'uni004_Course7', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (710, 162, 'uni004_fac026', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (711, 162, 'uni004_fac025', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (712, 162, 'uni004_fac024', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (713, 162, 'uni004_fac023', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (714, 162, 'uni004_fac022', 70, 7, 0, 7, 0, 0, 0, 0, 0, 0, 0, 56, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (715, 162, 'uni004_fac021', 70, 7, 0, 7, 0, 0, 0, 0, 0, 0, 0, 56, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (716, 162, 'uni004_fac020', 70, 7, 0, 7, 0, 0, 0, 0, 0, 0, 0, 56, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (717, 162, 'uni004_fac019', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (718, 162, 'uni004_fac018', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (719, 162, 'uni004_fac017', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (720, 162, 'uni004_fac016', 105, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 105, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (721, 162, 'uni004_fac015', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (722, 162, 'uni004_fac014', 45, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (723, 162, 'uni004_fac013', 45, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (724, 162, 'uni004_fac012', 45, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (725, 162, 'uni004_fac011', 45, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (726, 162, 'uni004_fac010', 45, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (727, 162, 'uni004_fac009', 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (728, 162, 'uni004_fac008', 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (729, 162, 'uni004_fac007', 45, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (730, 162, 'uni004_fac006', 34, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 27, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (731, 162, 'uni004_fac005', 34, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 27, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (732, 162, 'uni004_fac004', 34, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 27, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (733, 162, 'uni004_fac003', 34, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 27, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (734, 162, 'uni004_fac002', 34, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 27, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (735, 162, 'uni004_fac001', 34, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 27, 0, 0, 0, 0, 0, 0, 13, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (798, 162, 'uni001_doc031', 90, 9, 0, 9, 0, 0, 0, 0, 0, 0, 0, 72, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (799, 162, 'uni001_Course13', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (800, 162, 'uni001_cours042', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (801, 162, 'uni001_Course8', 30, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (802, 162, 'uni001_Course12', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (803, 162, 'uni001_Course11', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (804, 162, 'uni001_cours041', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (805, 162, 'uni001_cours040', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (806, 162, 'uni001_cours039', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (807, 162, 'uni001_cours038', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (808, 162, 'uni001_cours037', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (809, 162, 'uni001_cours036', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (810, 162, 'uni001_cours035', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (811, 162, 'uni001_cours034', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (812, 162, 'uni001_cours033', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (813, 162, 'uni001_cours032', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (814, 162, 'uni001_cours022', 33, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (815, 162, 'uni001_cours021', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (816, 162, 'uni001_cours020', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (817, 162, 'uni001_cours019', 50, 5, 0, 5, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (818, 162, 'uni001_cours018', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (819, 162, 'uni001_cours017', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (820, 162, 'uni001_cours016', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (821, 162, 'uni001_cours015', 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (822, 162, 'uni001_cours014', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (823, 162, 'uni001_cours013', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (824, 162, 'uni001_cours012', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (887, 162, 'uni002_Course026', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (888, 162, 'uni002_Course025', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (889, 162, 'uni002_Course023', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (890, 162, 'uni002_Course022', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (891, 162, 'uni002_Course021', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (892, 162, 'uni002_Course020', 70, 7, 0, 7, 0, 0, 0, 0, 0, 0, 0, 56, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (893, 162, 'uni002_Course019', 70, 7, 0, 7, 0, 0, 0, 0, 0, 0, 0, 56, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (894, 162, 'uni002_Course018', 105, 10, 0, 11, 0, 0, 0, 0, 0, 0, 0, 84, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (895, 162, 'uni002_Course017', 105, 10, 0, 11, 0, 0, 0, 0, 0, 0, 0, 84, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (896, 162, 'uni002_Course015', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (897, 162, 'uni002_Course014', 70, 7, 0, 7, 0, 0, 0, 0, 0, 0, 0, 56, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (898, 162, 'uni002_Course013', 70, 7, 0, 7, 0, 0, 0, 0, 0, 0, 0, 56, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (899, 162, 'uni002_Course011', 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (900, 162, 'uni002_Course010', 70, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 70, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (901, 162, 'uni002_Course009', 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (902, 162, 'uni002_Course008', 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (903, 162, 'uni002_Course007', 105, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 105, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (904, 162, 'uni002_Course006', 105, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 105, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (905, 162, 'uni002_uni002_Course110', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (906, 162, 'uni002_Course005', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (907, 162, 'uni002_Course004', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (908, 162, 'uni002_Course003', 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 25, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (909, 162, 'uni002_Course002', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (910, 162, 'uni002_Course001', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (911, 162, 'uni001_cours106', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (912, 162, 'uni001_cours105', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (913, 162, 'uni001_cours104', 10, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 8, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (914, 162, 'uni001_cours103', 10, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 8, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (915, 162, 'uni001_cours102', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (916, 162, 'uni001_Course30', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (917, 162, 'uni001_Course21', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (918, 162, 'uni001_cours100', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (919, 162, 'uni001_cours099', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (920, 162, 'uni001_cours098', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (921, 162, 'uni001_Course19', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (922, 162, 'uni001_cours097', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (923, 162, 'uni001_cours096', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (924, 162, 'uni001_cours095', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 27, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (925, 162, 'uni001_cours094', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (926, 162, 'uni001_cours093', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (927, 162, 'uni001_cours092', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (928, 162, 'uni001_cours091', 70, 7, 0, 7, 0, 0, 0, 0, 0, 0, 0, 56, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (929, 162, 'uni001_cours090', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (930, 162, 'uni001_cours089', 70, 7, 0, 7, 0, 0, 0, 0, 0, 0, 0, 56, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (931, 162, 'uni001_cours088', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (932, 162, 'uni001_cours087', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (933, 162, 'uni001_cours086', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (934, 162, 'uni001_cours085', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (935, 162, 'uni001_cours084', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (936, 162, 'uni001_cours083', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (937, 162, 'uni001_cours082', 50, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (938, 162, 'uni001_cours081', 40, 4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (939, 162, 'uni001_cours080', 40, 4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (940, 162, 'uni001_cours079', 35, 3, 4, 0, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (941, 162, 'uni001_cours078', 40, 4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (942, 162, 'uni001_cours077', 40, 4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (944, 162, 'uni001_Course17', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (945, 162, 'uni001_Course15', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (946, 162, 'uni001_cours076', 80, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 64, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (947, 162, 'uni001_cours075', 80, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 64, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (948, 162, 'uni001_cours074', 80, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 64, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (949, 162, 'uni001_cours073', 80, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 64, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (950, 162, 'uni001_cours072', 80, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 64, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (951, 162, 'uni001_cours070', 80, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 64, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (952, 162, 'uni001_cours069', 80, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 64, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (953, 162, 'uni001_cours068', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (954, 162, 'uni001_cours067', 80, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 64, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (955, 162, 'uni001_cours066', 80, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 64, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (956, 162, 'uni001_cours065', 80, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 64, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (957, 162, 'uni001_cours064', 80, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 64, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (958, 162, 'uni001_cours063', 80, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 64, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (959, 162, 'uni001_Course14', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (960, 162, 'uni001_cours062', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (961, 162, 'uni001_cours061', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (962, 162, 'uni001_cours060', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (963, 162, 'uni001_cours058', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (964, 162, 'uni001_cours057', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (965, 162, 'uni001_cours056', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (966, 162, 'uni001_cours055', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (967, 162, 'uni001_cours054', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (968, 162, 'uni001_cours053', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (969, 162, 'uni001_cours052', 30, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (970, 162, 'uni001_cours051', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (971, 162, 'uni001_cours050', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (972, 162, 'uni001_cours049', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (973, 162, 'uni001_Course9', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (974, 162, 'uni001_Course10', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (975, 162, 'uni001_cours031', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (976, 162, 'uni001_cours030', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (977, 162, 'uni001_cours029', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (978, 162, 'uni001_cours028', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (979, 162, 'uni001_cours026', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (980, 162, 'uni001_cours025', 60, 6, 0, 6, 0, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (981, 162, 'uni001_cours024', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (982, 162, 'uni001_cours023', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (983, 162, 'uni001_cours011', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (984, 162, 'uni001_cours010', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (985, 162, 'uni001_cours009', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (986, 162, 'uni001_cours008', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (987, 162, 'uni001_cours005', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (988, 162, 'uni001_cours004', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (989, 162, 'uni001_cours003', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (990, 162, 'uni001_cours002', 25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (991, 162, 'uni001_cours001', 28, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (992, 162, 'uni075_CS040', 30, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 25, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (993, 162, 'uni075_CS039', 30, 0, 0, 0, 0, 0, 0, 12, 0, 0, 0, 0, 0, 0, 18, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (994, 162, 'uni075_CS038', 60, 0, 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 0, 0, 50, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (995, 162, 'uni075_CS037', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (996, 162, 'uni075_CS036', 60, 0, 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 0, 0, 50, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (997, 162, 'uni075_CS035', 40, 0, 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 0, 0, 30, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (998, 162, 'uni075_CS034', 40, 0, 0, 0, 0, 0, 0, 9, 0, 0, 0, 0, 0, 0, 31, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (999, 162, 'uni075_CS033', 40, 0, 0, 0, 0, 0, 0, 9, 0, 0, 0, 0, 0, 0, 31, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1000, 162, 'uni075_CS032', 100, 0, 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 0, 0, 90, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1001, 162, 'uni075_CS031', 45, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1002, 162, 'uni075_CS030', 80, 0, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 0, 0, 65, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1003, 162, 'uni075_CS029', 80, 0, 0, 0, 0, 0, 0, 4, 0, 0, 0, 0, 0, 0, 76, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1004, 162, 'uni075_CS028', 45, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1005, 162, 'uni075_CS027', 45, 0, 0, 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 39, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1006, 162, 'uni075_CS026', 80, 0, 0, 0, 0, 0, 0, 11, 0, 0, 0, 0, 0, 0, 69, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1007, 162, 'uni075_CS025', 45, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 43, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1008, 162, 'uni075_CS024', 45, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1009, 162, 'uni075_CS023', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1010, 162, 'uni075_CS021', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1011, 162, 'uni075_CS020', 50, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1012, 162, 'uni075_CS019', 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1013, 162, 'uni075_CS018', 60, 0, 0, 0, 0, 0, 0, 16, 0, 0, 0, 0, 0, 0, 44, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1014, 162, 'uni075_CS017', 60, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 58, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1015, 162, 'uni075_CS016', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1016, 162, 'uni075_CS015', 60, 0, 0, 0, 0, 0, 0, 11, 0, 0, 0, 0, 0, 0, 49, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1017, 162, 'uni075_CS013', 30, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 29, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1018, 162, 'uni075_CS011', 30, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1019, 162, 'uni075_CS010', 40, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 38, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1020, 162, 'uni075_CS009', 40, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 39, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1021, 162, 'uni075_CS008', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1022, 162, 'uni075_CS042', 150, 0, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 0, 0, 120, 0, 0, 0, 74, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1023, 162, 'uni073_CS053', 35, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 30, 0, 0, 0, 75, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1024, 162, 'uni073_CS052', 35, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 30, 0, 0, 0, 75, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1025, 162, 'uni073_CS051', 35, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 30, 0, 0, 0, 75, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1026, 162, 'uni073_CS050', 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 75, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1027, 162, 'uni073_CS049', 35, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 75, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1028, 162, 'uni073_CS048', 70, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 70, 0, 0, 0, 75, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1029, 162, 'uni073_CS047', 70, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 70, 0, 0, 0, 75, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1030, 162, 'uni073_CS046', 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 75, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1031, 162, 'uni073_CS045', 70, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 70, 0, 0, 0, 75, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1032, 162, 'uni073_CS044', 70, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 70, 0, 0, 0, 75, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1033, 162, 'uni074_cs064', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 76, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1034, 162, 'uni074_CS063', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 76, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1035, 162, 'uni074_CS062', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 76, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1036, 162, 'uni074_CS061', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 76, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1037, 162, 'uni074_CS060', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 76, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1038, 162, 'uni074_CS059', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 76, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1039, 162, 'uni074_CS058', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 76, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1040, 162, 'uni074_CS057', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 76, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1041, 162, 'uni074_CS056', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 76, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1042, 162, 'uni074_CS055', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 76, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1043, 162, 'uni072_CS003', 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 77, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1044, 162, 'uni072_CS002', 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 77, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1045, 162, 'uni072_CS001', 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35, 0, 0, 0, 77, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1046, 162, 'uni076_CS004', 80, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 80, 0, 0, 0, 78, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1047, 162, 'uni076_CS003', 70, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 70, 0, 0, 0, 78, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1048, 162, 'uni076_CS001', 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 0, 0, 78, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1049, 162, 'uni003_course025', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1050, 162, 'uni003_uni002_uni002_Course160', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1051, 162, 'uni003_Course1', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1052, 162, 'uni003_course018', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1053, 162, 'uni003_course017', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1054, 162, 'uni003_course016', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1055, 162, 'uni003_course015', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1056, 162, 'uni003_course014', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1057, 162, 'uni003_course013', 40, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 32, 0, 0, 0, 0, 0, 0, 26, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1058, 162, 'uni002_CS101', 35, 3, 0, 4, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1059, 162, 'uni002_CS100', 70, 7, 0, 7, 0, 0, 0, 0, 0, 0, 0, 56, 0, 0, 0, 0, 0, 0, 12, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1060, 162, 'uni001_Course130', 80, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 64, 0, 0, 0, 0, 0, 0, 1, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1061, 160, 'MT_001_CS045', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1062, 160, 'MT_001_CS044', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1063, 160, 'MT_001_CS043', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1064, 160, 'MT_001_CS042', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1065, 160, 'MT_001_CS041', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1066, 160, 'MT_001_CS040', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1067, 160, 'MT_001_CS038', 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1068, 160, 'MT_001_CS037', 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1069, 160, 'MT_001_CS036', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1070, 160, 'MT_001_CS035', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1071, 160, 'MT_001_CS033', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1072, 160, 'MT_001_CS032', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1073, 160, 'MT_001_CS031', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1074, 160, 'MT_001_CS030', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1075, 160, 'MT_001_CS029', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1076, 160, 'MT_001_CS028', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1077, 160, 'MT_001_CS027', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1078, 160, 'MT_001_CS026', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1079, 160, 'MT_001_CS025', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1080, 160, 'MT_001_CS024', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1081, 160, 'MT_001_CS023', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1082, 160, 'MT_001_CS022', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1083, 160, 'MT_001_CS021', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1084, 160, 'MT_001_CS020', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1085, 160, 'MT_001_CS019', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1086, 160, 'MT_001_CS018', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1087, 160, 'MT_001_CS017', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1088, 160, 'MT_001_CS016', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1089, 160, 'MT_001_CS015', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1090, 160, 'MT_001_CS014', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1091, 160, 'MT_001_CS013', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1092, 160, 'MT_001_CS012', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1093, 160, 'MT_001_CS011', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1094, 160, 'MT_001_CS010', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1095, 160, 'MT_001_CS009', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1096, 160, 'MT_001_CS008', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1097, 160, 'MT_001_CS007', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1098, 160, 'MT_001_CS006', 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1099, 160, 'MT_001_CS005', 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1100, 160, 'MT_001_CS004', 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1101, 160, 'MT_001_CS003', 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1102, 160, 'MT_001_CS002', 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1103, 160, 'MT_001_CS001', 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1104, 160, 'MT_001_cr001', 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, NULL);
INSERT INTO `adjustdetail` VALUES (1105, 183, 'uni017_CRS018', 10, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1106, 183, 'uni017_CRS017', 10, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1107, 183, 'uni017_CRS016', 10, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1108, 183, 'uni017_CRS015', 10, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1109, 183, 'uni017_CRS014', 10, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1110, 183, 'uni017_CRS013', 5, 0, 0, 0, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1111, 183, 'uni017_CRS012', 10, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1112, 183, 'uni017_CRS006', 5, 0, 0, 0, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1113, 183, 'uni017_CRS005', 5, 0, 0, 0, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1114, 183, 'uni017_CRS004', 10, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1115, 183, 'uni017_CRS003', 10, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1116, 183, 'uni017_CRS002', 10, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1117, 183, 'uni017_CRS001', 10, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1118, 159, 'uni017_CRS018', 10, 0, 0, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1119, 159, 'uni017_CRS017', 10, 0, 0, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1120, 159, 'uni017_CRS016', 10, 0, 0, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1121, 159, 'uni017_CRS015', 10, 0, 0, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1122, 159, 'uni017_CRS014', 10, 0, 0, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1123, 159, 'uni017_CRS013', 5, 0, 0, 0, 2, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1124, 159, 'uni017_CRS012', 10, 0, 0, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1125, 159, 'uni017_CRS006', 5, 0, 0, 0, 2, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1126, 159, 'uni017_CRS005', 5, 0, 0, 0, 2, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1127, 159, 'uni017_CRS004', 10, 0, 0, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1128, 159, 'uni017_CRS003', 10, 0, 0, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1129, 159, 'uni017_CRS002', 10, 0, 0, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1130, 159, 'uni017_CRS001', 10, 0, 0, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1131, 159, 'uni017_CRS029', 8, 0, 0, 0, 5, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1132, 159, 'uni017_CRS028', 8, 0, 0, 0, 5, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1133, 159, 'uni017_CRS027', 8, 0, 0, 0, 5, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1134, 159, 'uni017_CRS026', 8, 0, 0, 0, 5, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1135, 159, 'uni017_CRS025', 10, 0, 0, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1136, 159, 'uni101_CRS003', 125, 0, 0, 0, 0, 0, 120, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 87, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1137, 159, 'uni101_CRS001', 80, 0, 0, 0, 0, 0, 75, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 87, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1138, 188, 'uni102_CRS002', 20, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 89, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1139, 188, 'uni102_CRS001', 20, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 89, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1140, 189, 'uni103_CRS007', 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 90, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1141, 189, 'uni103_CRS006', 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 90, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1142, 189, 'uni103_CRS005', 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 90, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1143, 189, 'uni103_CRS004', 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 90, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1144, 189, 'uni103_CRS003', 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 90, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1145, 189, 'uni103_CRS002', 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 90, '23 hrd_central');
INSERT INTO `adjustdetail` VALUES (1146, 189, 'uni103_CRS001', 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 90, '23 hrd_central');

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course`  (
  `course_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `course_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fac_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level_id` int NULL DEFAULT NULL,
  `stt` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`course_id`) USING BTREE,
  INDEX `fac_id`(`fac_id`) USING BTREE,
  INDEX `course_ibfk_2`(`level_id`) USING BTREE,
  CONSTRAINT `course_ibfk_1` FOREIGN KEY (`fac_id`) REFERENCES `faculty` (`fac_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `course_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `course_level` (`level_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('MT_001_cr001', 'ວິທະຍາໄລຄູຫຼວງນ້ຳທາ', 'MT_001_fac001', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS001', 'ວິທະຍາໄລຄູດົງຄຳຊ້າງ', 'MT_001_fac001', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS002', 'ວິທະຍາໄລຄູສະຫວັນນະເຂດ', 'MT_001_fac001', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS003', 'ວິທະຍາໄລຄູສາລະວັນ', 'MT_001_fac001', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS004', 'ວິທະຍາໄລຄູຫຼວງນ້ຳທາ', 'MT_001_fac002', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS005', 'ວິທະຍາໄລຄູດົງຄຳຊ້າງ', 'MT_001_fac002', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS006', 'ວິທະຍາໄລຄູສາລະວັນ', 'MT_001_fac002', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS007', 'ຊີວະສາດ', 'MT_001_fac004', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS008', 'ພາສາອັງກິດ', 'MT_001_fac004', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS009', 'ICT ພື້ນຖານ', 'MT_001_fac004', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS010', 'ຊີວະສາດ', 'MT_001_fac005', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS011', 'ຟີຊິສາດ', 'MT_001_fac005', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS012', 'ພາສາລາວ', 'MT_001_fac005', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS013', 'ພາສາອັງກິດ', 'MT_001_fac005', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS014', 'ພາສາຝຣັ່ງ', 'MT_001_fac005', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS015', 'ຟິຊິກສາດ', 'MT_001_fac006', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS016', 'ພາສາລາວ', 'MT_001_fac006', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS017', 'ຄະນິດສາດ', 'MT_001_fac006', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS018', 'ພາສາອັງກິດ', 'MT_001_fac006', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS019', 'ພາສາລາວ', 'MT_001_fac007', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS020', 'ICT ພື້ນຖານ', 'MT_001_fac007', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS021', 'ຊີວະສາດ', 'MT_001_fac008', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS022', 'ພາສາລາວ', 'MT_001_fac008', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS023', 'ພາສາອັງກິດ', 'MT_001_fac008', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS024', 'ICT ພື້ນຖານ', 'MT_001_fac008', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS025', 'ຄະນິດສາດ', 'MT_001_fac009', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS026', 'ເຄມີສາດ', 'MT_001_fac009', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS027', 'ພາສາອັງກິດ', 'MT_001_fac009', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS028', 'ICT ພື້ນຖານ', 'MT_001_fac009', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS029', 'ຟິຊິກສາດ', 'MT_001_fac010', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS030', 'ຊີວະສາດ', 'MT_001_fac010', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS031', 'ປະຫວັດສາດ', 'MT_001_fac010', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS032', 'ພາສາອັງກິດ', 'MT_001_fac011', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS033', 'ຟິຊິກສາດ', 'MT_001_fac011', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS035', 'ພາສາຝຣັ່ງ', 'MT_001_fac011', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS036', 'ພູມສາດ', 'MT_001_fac011', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS037', 'ວິທະຍາໄລພາລະສຶກສາ', 'MT_001_fac012', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS038', 'ວິທະຍາໄລສີລະປະສຶກສາ', 'MT_001_fac013', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS040', 'ພາສາລາວ', 'MT_001_fac015', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS041', 'ພາສາອັງກິດ', 'MT_001_fac015', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS042', 'ພຸດທະສາດສະໜາ', 'MT_001_fac015', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS043', 'ພາສາລາວ', 'MT_001_fac016', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS044', 'ພາສາອັງກິດ', 'MT_001_fac016', 4, 1);
INSERT INTO `course` VALUES ('MT_001_CS045', 'ພຸດທະສາດສະໜາ', 'MT_001_fac016', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours001', 'ຄູຈິດຕະສຶກສາສາດ', 'uni001_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours002', 'ບໍລິຫານການສຶກສາ', 'uni001_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours003', 'ຄູຄະນິດສາດ', 'uni001_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours004', 'ຄູຟິຊິກສາດ', 'uni001_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours005', 'ຄູເຄມີສາດ', 'uni001_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours006', 'ຄູພາສາລາວ-ວັນນະຄະດີ', 'uni001_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours007', 'ຄູພາສາອັງກິດ', 'uni001_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours008', 'ຄູພາສາຝຮັ່ງ', 'uni001_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours009', 'ຄູປະຫວັດສາດ', 'uni001_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours010', 'ຄູພູມສາດ', 'uni001_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours011', 'ຄູວິທະຍາສາດການເມືອງ', 'uni001_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours012', 'ພາສາລາວ-ວັນນະຄະດີ', 'uni001_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours013', 'ສື່ສານມວນຊົນ', 'uni001_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours014', 'ພາສາຝຮັ່ງ', 'uni001_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours015', 'ພາສາອັງກິດ', 'uni001_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours016', 'ພາສາຫວຽດນາມ', 'uni001_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours017', 'ພາສາຈີນ', 'uni001_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours018', 'ພາສາຍີ່ປຸ່ນ', 'uni001_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours019', 'ພາສາເກົາຫຼີ', 'uni001_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours020', 'ພາສາເຢຍລະມັນ', 'uni001_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours021', 'ພາສາລັດເຊຍ', 'uni001_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours022', 'ພາສາແອດສະປາຍໂຍນ', 'uni001_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours023', 'ປະຫວັດສາດ ແລະ ມະນຸດວິທະຍາສາດ', 'uni001_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours024', 'ບູຮານວິທະຍາ ແລະ ການຄຸ້ມຄອງມໍລະດົກ', 'uni001_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours025', 'ສັງຄົມສັງເຄາະ', 'uni001_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours026', 'ພັດທະນາຊຸມຊົນ ແລະ ຊົນນະບົດ', 'uni001_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours027', 'ການເມືອງ ແລະ ບໍລິຫານລັດຖະກິດ', 'uni001_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours028', 'ບັນນາຮັກສາດ ແລະ ສາລະສົນເທດ', 'uni001_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours029', 'ພູມີສາດ ແລະ ພູມີສາລະສົນເທດ', 'uni001_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours030', 'ການທ່ອງທ່ຽວ', 'uni001_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours031', 'ການໂຮງແຮມ', 'uni001_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours032', 'ເສດຖະສາດນຳໃຊ້', 'uni001_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours033', 'ເສດຖະສາດພັດທະນາ ແລະ ການວາງແຜນ', 'uni001_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours034', 'ເສດຖະສາດການເງິນພາກລັດ', 'uni001_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours035', 'ບໍລິຫານທຸລະກິດທົ່ວໄປ', 'uni001_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours036', 'ການຕະຫຼາດ', 'uni001_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours037', 'ການບັນຊີ', 'uni001_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours038', 'ການກວດສອບ', 'uni001_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours039', 'ພາສີ ແລະ ສ່ວຍສາອາກອນ', 'uni001_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours040', 'ການເງິນ-ການທະນາຄານ', 'uni001_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours041', 'ການຄ້າ', 'uni001_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours042', 'ເສດຖະສາດພັດທະນາ ແລະ ການວາງແຜນ', 'uni001_fac014', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours043', 'ການເງິນພາກລັດ', 'uni001_fac014', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours044', 'ກົດໝາຍແພ່ງ', 'uni001_fac005', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours045', 'ກົດໝາຍອາຍາ', 'uni001_fac005', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours046', 'ກົດ​ໝາຍ​ປົກ​ຄອງ', 'uni001_fac005', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours047', 'ກົດໝາຍທຸລະກິດ', 'uni001_fac005', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours048', 'ການຕ່າງປະເທດ', 'uni001_fac005', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours049', 'ຄະນິດສາດ', 'uni001_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours050', 'ສະຖິຕິນຳໃຊ້', 'uni001_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours051', 'ຄະນິດສາດສຳລັບເສດຖະສາດ-ບໍລິຫານທຸລະກິດ', 'uni001_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours052', 'ຟີຊິກສາດ', 'uni001_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours053', 'ວັດສະດຸສາດ', 'uni001_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours054', 'ຟີຊິກນິວເຄຼຍ', 'uni001_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours055', 'ເຄມີສາດ', 'uni001_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours056', 'ເຄມີສິ່ງແວດລ້ອມ', 'uni001_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours057', 'ຊີວະວິທະຍາ', 'uni001_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours058', 'ໄບໂອເຕັກໂນໂລຊີ ຊີວະພາບ', 'uni001_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours060', 'ວິທະຍາສາດຄອມພິວເຕີ', 'uni001_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours061', 'ການພັດທະນາເວບໄຊ', 'uni001_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours062', 'ການ​ພັດ​ທະ​ນາ​ໂປ​ຣ​ແກ​ຣມ​', 'uni001_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours063', 'ວິສະວະກຳ ໂຍທາ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours064', 'ວິສະວະກຳ ສິ່ງແວດລ້ອມ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours065', 'ວິສະວະກຳ ບໍ່ແຮ່', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours066', 'ວິສະວະກຳ ກົນຈັກ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours067', 'ວິສະວະກຳ ອຸສາຫະກຳ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours068', 'ວິສະວະກຳ ເຄມີ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours069', 'ວິສະວະກຳ ໄຟຟ້າ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours070', 'ວິສະວະກຳ ໄຟຟ້າພະລັງງານນ້ຳ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours071', 'ວິສະວະກຳ ເອ​ເລັກ​ໂຕຼ​ນິກ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours072', 'ວິສະວະກຳ ໂທລະຄົມມະນາຄົມ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours073', 'ວິສະວະກຳ ຄອມພິວເຕີ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours074', 'ວິສະວະກຳເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours075', 'ວິສະວະກຳ ຂົວ-ທາງ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours076', 'ວິສະວະກຳ ຂົນສົ່ງ ແລະ ພາ​ລາ​ທິ​ການ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours077', 'ການປູກຝັງ', 'uni001_fac008', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours078', 'ການປ້ອງກັນພືດ', 'uni001_fac008', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours079', 'ເສດຖະກິດຊົນ​ນະ​ບົດ ກະສິກຳ ແລະ ເຕັກໂນໂລຊີອາຫານ', 'uni001_fac008', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours080', 'ລ້ຽງສັດ', 'uni001_fac008', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours081', 'ການປະມົງ', 'uni001_fac008', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours082', 'ສັດຕະວະແພດ', 'uni001_fac008', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours083', 'ເສດຖະກິດປ່າໄມ້ ແລະ ເຕັກໂນໂລຊີປຸງແຕ່ງໄມ້', 'uni001_fac009', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours084', 'ປ່າໄມ້ຊຸມຊົນ ແລະ ພັດທະນາຊົນນະບົດ', 'uni001_fac009', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours085', 'ການຈັດສັນຄຸ້ມຄອງຊັບພະຍາກອນປ່າໄມ້', 'uni001_fac009', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours086', 'ຈັດສັນຄຸ້ມຄອງແຫຼ່ງນ້ຳ ແລະ ວາງແຜນນຳໃຊ້ທີ່ດິນ', 'uni001_fac009', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours087', 'ການທ່ອງທ່ຽວອານຸຮັກ', 'uni001_fac009', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours088', 'ການອະນຸ​ຮັກປ່າໄມ້ ແລະ ສັດປ່າ', 'uni001_fac009', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours089', 'ສະຖາປັດຕະຍະກຳສາດ', 'uni001_fac010', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours090', 'ສິ່ງແວດລ້ອມ-ຜັງເມືອງ', 'uni001_fac010', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours091', 'ວິທະຍາການອາຄານ', 'uni001_fac010', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours092', 'ອອກແບບຜະລິດຕະພັນ', 'uni001_fac010', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours093', 'ອອກແບບຕົກແຕ່ງ', 'uni001_fac010', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours094', 'ວິທະຍາສາດສິ່ງແວດລ້ອມ', 'uni001_fac011', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours095', 'ການຈັດການສິ່ງແວດລ້ອມ', 'uni001_fac011', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours096', 'ການວາງແຜນພັດທະນາ', 'uni001_fac011', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours097', 'ເຕັກໂນໂລຊີສິ່ງແວດລ້ອມ', 'uni001_fac011', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours098', 'ວິສະວະກຳ ຊົບລະປະທານ', 'uni001_fac012', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours099', 'ການຄຸ້ມຄອງຊັບພະຍາກອນນ້ຳ', 'uni001_fac012', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours100', 'ອຸຕຸນິຍົມ ແລະ ອຸທົກກະສາດ', 'uni001_fac012', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours101', 'ນັກຮຽນພອນສະຫວັນກິລາ', 'uni001_fac013', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours102', 'ຄູພະລະສຶກສາ', 'uni001_fac013', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours103', '​ຄູ​​ເຝິກ​ກິ​ລາ​ແລ່ນ ແລະ ລານ', 'uni001_fac013', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours104', '​ຄູ​​ເຝິກ​ກິ​ລາ​ບານ​ເຕະ', 'uni001_fac013', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours105', '​ວິ​ທະ​ຍາ​ສາດ​ການ​ກິ​ລາ', 'uni001_fac013', 4, 1);
INSERT INTO `course` VALUES ('uni001_cours106', '​ບໍ​ລິ​ຫານ​ການ​ກິ​ລາ', 'uni001_fac013', 4, 1);
INSERT INTO `course` VALUES ('uni001_Course10', 'ບໍລີຫານລັດຖະກິດ (ຫຼັກສູນປັບປຸງຮ່ວ ສມປຊ)', 'uni001_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni001_Course11', 'ການຄ້າເອເລັກໂທນິກ', 'uni001_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni001_Course12', 'ການລົງທືນ', 'uni001_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni001_Course13', 'ບໍລີຫານທຸລະກິດທົ່ວໄປ', 'uni001_fac014', 4, 1);
INSERT INTO `course` VALUES ('uni001_Course130', 'ວິສະວະກຳເອເລັກໂຕຣນິກ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_Course14', 'ທໍລະນິຟີຊິກນຳໄຊ້', 'uni001_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni001_Course15', 'ວິສະວະກຳຂະບວນການແປ່ຮູບອາຫານ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_Course17', 'ວິສາວະກຳວັດສະດຸ', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_Course19', 'ສີ່ງແວດລ້ອມສືກສາ', 'uni001_fac011', 4, 1);
INSERT INTO `course` VALUES ('uni001_Course21', 'ນ້ຳໃຕັດີນ', 'uni001_fac012', 4, 1);
INSERT INTO `course` VALUES ('uni001_Course30', 'ການຄຸ້ມຄອງໄພພີບັດ', 'uni001_fac012', 4, 1);
INSERT INTO `course` VALUES ('uni001_Course56', 'ວີສາວະກຳບໍແຮ່', 'uni001_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni001_Course7', 'ພາສາ ແລະ ວັດທະນາທຳລາວ', 'uni001_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni001_Course8', 'ຄຸ້ມຄອງເສດຖະກິດ (ຫຼັ່ກສູດປັບປຸງຮ່ວ ສມປຊ)', 'uni001_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni001_Course9', 'ວິທະຍາສາດການເມືອງ (ຫັຼກສູດປັບປຸງຮ່ວ ສມປຊ)', 'uni001_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni001_CS100', 'ຄູຊີວະສາດ', 'uni001_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni001_CS101', 'ພາສາຝຣັ່ງສຳລັບການທ່ອງທ່ຽວ', 'uni001_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni001_CS102', 'ຄູເຝິກກລາບານສົ່ງ', 'uni001_fac013', 4, 1);
INSERT INTO `course` VALUES ('uni001_doc031', 'ຄູພາສາຈີນ', 'uni001_fac15', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course001', 'ຄູຊີວະ', 'uni002_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course002', 'ຄູພາສາລາວ', 'uni002_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course003', 'ສາຂາວິຊາພາສາອັງກິດທົ່ວໄປ', 'uni002_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course004', 'ພາສາຫວຽດນາມ', 'uni002_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course005', 'ພາສາລາວ-ວັນນະຄະດີທົ່ວໄປົ', 'uni002_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course006', 'ເສດຖະສາດ', 'uni002_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course007', 'ການຄຸ້ມຄອງ', 'uni002_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course008', 'ການບໍລິຫານການທ່ອງທ່ຽວ', 'uni002_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course009', 'ການບໍລິຫານການໂຮງແຮມ', 'uni002_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course010', 'ການຕະຫຼາດ', 'uni002_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course011', 'ການພັດທະນາຊຸມຊົນ', 'uni002_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course012', 'ປູກຟັງ', 'uni002_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course013', 'ພາກວິຊາລ້ຽງສັດ', 'uni002_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course014', 'ຊັບພະຍາກອນປ່າໄມ້ ແລະ ສິ່ງແວດລ້ອມ', 'uni002_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course015', 'ສັດຕະວະແພດ', 'uni002_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course016', 'ປຸງຜະລິດຕະພັນກະສິກຳ', 'uni002_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course017', 'ສາຂາວິຊານິຕິສາດ', 'uni002_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course018', 'ສາຂາວິຊາລັດຖະສາດ', 'uni002_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course019', 'ວິສະວະກຳໄຟຟ້າ', 'uni002_fac005', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course020', 'ວິສະວະກຳໂຍທາ', 'uni002_fac005', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course021', 'ສະຖາປັດຕະຍະກຳ', 'uni002_fac005', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course022', 'ຟິຊິກສາດ', 'uni002_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course023', 'ເຄມີສາດ', 'uni002_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course024', 'ເຄມີສາດ', 'uni002_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course025', 'ຊີວະສາດ', 'uni002_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course026', 'ຄະນິດສາດ', 'uni002_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course035', 'ສາຂາວິຊາລ້ຽງສັດ (ຕໍ່ເນື່ອງ)', 'uni002_fac003', 3, 1);
INSERT INTO `course` VALUES ('uni002_Course120', 'ສາຂາວິຊາການຜະລິດພືດ', 'uni002_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni002_Course121', 'ສາຂາວິຊາເຕັກໂນໂລຊີການອາຫານ', 'uni002_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni002_CS100', 'ສາຂາວິຊາການຜະລິດພືດ', 'uni002_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni002_CS101', 'ສາຂາວິຊາເຕັກໂນໂລຊີການອາຫານ', 'uni002_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni002_uni002_Course110', 'ຄູຄະນິດສາດ', 'uni002_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni002_uni002_uni002_Course120', 'ສາຂາວິຊາເຕັກໂນໂລຊີການອາຫານ', 'uni002_fac003', 2, 1);
INSERT INTO `course` VALUES ('uni002_uni002_uni002_Course130', 'ສາຂາວິຊາການຜະລິດພືດ', 'uni002_fac003', 2, 1);
INSERT INTO `course` VALUES ('uni003_course001', 'ຄູຄະນິດສາດ', 'uni003_Fac001', 4, 1);
INSERT INTO `course` VALUES ('uni003_course002', 'ຄູຟີຊິກສາດ', 'uni003_Fac001', 4, 1);
INSERT INTO `course` VALUES ('uni003_course003', 'ຄູວິທະຍາສາດການເມືອງ', 'uni003_Fac001', 4, 1);
INSERT INTO `course` VALUES ('uni003_course004', 'ຄູພາສາອັງກິດ', 'uni003_Fac001', 4, 1);
INSERT INTO `course` VALUES ('uni003_course005', 'ເສດຖະສາດ', 'uni003_Fac002', 4, 1);
INSERT INTO `course` VALUES ('uni003_course006', 'ບໍລິຫານທຸລະກິດທົ່ວໄປ', 'uni003_Fac002', 4, 1);
INSERT INTO `course` VALUES ('uni003_course007', 'ບໍລິຫານການທ່ອງທ່ຽວ', 'uni003_Fac002', 4, 1);
INSERT INTO `course` VALUES ('uni003_course008', 'ບໍລິຫານການໂຮງແຮມ', 'uni003_Fac002', 4, 1);
INSERT INTO `course` VALUES ('uni003_course009', 'ບໍລິຫານທຸລະກິດ (IT)', 'uni003_Fac002', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course01', 'ຄູເຄມີສາດ', 'uni003_Fac001', 4, 1);
INSERT INTO `course` VALUES ('uni003_course010', 'ບໍລິຫານທຸລະກິດລະຫວ່າງປະເທດ', 'uni003_Fac002', 4, 1);
INSERT INTO `course` VALUES ('uni003_course011', 'ການເງິນ ແລະ ການທະນາຄານ', 'uni003_Fac002', 4, 1);
INSERT INTO `course` VALUES ('uni003_course012', 'ການບັນຊີ', 'uni003_Fac002', 4, 1);
INSERT INTO `course` VALUES ('uni003_course013', 'ວິທະຍາສາດພືດ', 'uni003_Fac003', 4, 1);
INSERT INTO `course` VALUES ('uni003_course014', 'ວິທະຍາສາດສັດ', 'uni003_Fac003', 4, 1);
INSERT INTO `course` VALUES ('uni003_course015', 'ຊັບພະຍາກອນປ່າໄມ້', 'uni003_Fac003', 4, 1);
INSERT INTO `course` VALUES ('uni003_course016', 'ວິທະຍາສາດ ແລະ ເຕັກໂນໂລຊີອາຫານ', 'uni003_Fac003', 4, 1);
INSERT INTO `course` VALUES ('uni003_course017', 'ທ່ອງທ່ຽວນິເວດວິທະຍາ', 'uni003_Fac003', 4, 1);
INSERT INTO `course` VALUES ('uni003_course018', 'ພັດທະນາຊົນນະບົດ', 'uni003_Fac003', 4, 1);
INSERT INTO `course` VALUES ('uni003_course019', 'ສະຖາປັດຕະຍະກຳ', 'uni003_Fac004', 4, 1);
INSERT INTO `course` VALUES ('uni003_course020', 'ບໍລິຫານຈັດການພາຍໃນ', 'uni003_Fac004', 4, 1);
INSERT INTO `course` VALUES ('uni003_course021', 'ສະຖາປັດຕະຍະກຳພາຍໃນ', 'uni003_Fac004', 4, 1);
INSERT INTO `course` VALUES ('uni003_course022', 'ວິສະວະກຳໄຟຟ້າ', 'uni003_Fac005', 4, 1);
INSERT INTO `course` VALUES ('uni003_course023', 'ວິສະວະກຳຄອມພິວເຕີ', 'uni003_Fac005', 4, 1);
INSERT INTO `course` VALUES ('uni003_course024', 'ວິສະວະກຳໂຍທາ', 'uni003_Fac005', 4, 1);
INSERT INTO `course` VALUES ('uni003_course025', 'ເຕັກໂນໂລຊີໂລຈິດສະຕິກ', 'uni003_Fac005', 4, 1);
INSERT INTO `course` VALUES ('uni003_course026', 'ວິສະວະກຳວັດສະດຸ', 'uni003_Fac005', 4, 1);
INSERT INTO `course` VALUES ('uni003_course028', 'ພາສາລາວ-ວັນນະຄະດີ', 'uni003_Fac006', 4, 1);
INSERT INTO `course` VALUES ('uni003_course029', 'ພາສາອັງກິດ', 'uni003_Fac006', 4, 1);
INSERT INTO `course` VALUES ('uni003_course030', 'ສື່ສານມວນຊົນ', 'uni003_Fac006', 4, 1);
INSERT INTO `course` VALUES ('uni003_course031', 'ພາສາເກົາຫຼີ', 'uni003_Fac006', 4, 1);
INSERT INTO `course` VALUES ('uni003_course032', 'ພາສາຫວຽດນາມ', 'uni003_Fac006', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course1', 'ພັດທະນາກະສີກຳ ແລະ ການຕະຫຼາດ', 'uni003_Fac003', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course104', 'ຄູພາສາລາວ', 'uni003_Fac001', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course109', 'ວິທະຍາສາດພືດ', 'uni003_UNI105', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course110', 'ວິທະຍາສາດສັດ', 'uni003_UNI105', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course111', 'ຊັບພະຍາກອນປ່າໄມ້', 'uni003_UNI105', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course112', 'ວິທະຍາສາດ ແລະ ເຕັກໂນໂລຊີອາຫານ', 'uni003_UNI105', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course113', 'ສັດຕະວັດແພດ', 'uni003_UNI105', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course114', 'ພັດທະນາກະສິກຳ ແລະ ການຕະຫຼາດ', 'uni003_UNI105', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course115', 'ທ່ອງທ່ຽວນິເວດວິທະຍາ', 'uni003_UNI105', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course116', 'ພັດທະນາຊົນນະບົດ', 'uni003_UNI105', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course156', 'ວິສະວະກຳເອເລັກໂຕນິກ', 'uni003_Fac005', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course2', 'ບໍລີຫານສະຖາປັດ', 'uni003_Fac004', 2, 1);
INSERT INTO `course` VALUES ('uni003_Course3', 'ສາຂາສະຖາປັດຕະຍະກຳລາວ', 'uni003_Fac004', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course4', 'ໂລຈິກສະຕິກ', 'uni003_Fac005', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course5', 'ວິຊາວະກຳໄອທີ', 'uni003_Fac005', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course6', 'ພາສາຈີນ', 'uni003_Fac006', 4, 1);
INSERT INTO `course` VALUES ('uni003_Course91', 'ການເງິນ ແລະ ການທະນາຄານ', 'uni003_Fac002', 3, 1);
INSERT INTO `course` VALUES ('uni003_Course94', 'ວິສະວະກຳໄຟຟ້າ', 'uni003_Fac005', 3, 1);
INSERT INTO `course` VALUES ('uni003_Course97', 'ບໍລີຫານງານສະຖາປັດ', 'uni003_Fac004', 3, 1);
INSERT INTO `course` VALUES ('uni003_CS100', 'ບໍລິຫານງານສະຖາປັດ', 'uni003_Fac004', 4, 1);
INSERT INTO `course` VALUES ('uni003_CS101', 'ວິສະວະກຳເອເລັກໂຕນິກ', 'uni003_Fac005', 4, 1);
INSERT INTO `course` VALUES ('uni003_uni002_uni002_Course140', 'ຄູໄອຊີທີ', 'uni003_Fac001', 4, 1);
INSERT INTO `course` VALUES ('uni003_uni002_uni002_Course150', 'ການຄ້າສາກົນ', 'uni003_Fac002', 4, 1);
INSERT INTO `course` VALUES ('uni003_uni002_uni002_Course160', 'ສັດຕະວັດແພດ', 'uni003_Fac003', 4, 1);
INSERT INTO `course` VALUES ('uni004_Course7', 'ຄູຄະນິດສາດ', 'uni004_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac001', 'ວິທະຍາສາດພືດ', 'uni004_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac002', 'ວີທະຍາສາດສັດ', 'uni004_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac003', 'ວິທະຍາສາດສິ່ງແວດລ້ອມ', 'uni004_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac004', 'ການຈັດສັນແຫຼ່ງນ້ຳ', 'uni004_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac005', 'ທ່ອງທ່ຽວແບບອະນຸລັກທຳມະຊາດ', 'uni004_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac006', 'ການຈັດສັນທີ່ດິນ', 'uni004_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac007', 'ບໍລິຫານການຄ້າ', 'uni004_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac008', 'ບໍລິຫານການທ່ອງທ່ຽວ', 'uni004_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac009', 'ບໍລີຫານການໂຮງແຮມ', 'uni004_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac010', 'ບໍລິຫານການຂົນສົ່ງ', 'uni004_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac011', 'ບໍລິຫານການເງິນ', 'uni004_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac012', 'ການທະນາຄານ', 'uni004_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac013', 'ບໍລິຫານການບັນຊີ', 'uni004_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac014', 'ບໍລິຫານທຸລະກິດທົ່ວໄປ', 'uni004_fac002', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac015', 'ພາສາຝຣັ່ງ', 'uni004_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac016', 'ພາສາອັງກິດ', 'uni004_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac017', 'ສື່ສານມວນຊົນ', 'uni004_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac018', 'ພາສາຫວຽດນາມ', 'uni004_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac019', 'ພາສາຍີ່ປຸ່ນ', 'uni004_fac003', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac020', 'ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ', 'uni004_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac021', 'ເຕັກໂນໂລຊີສື່ປະສົມ', 'uni004_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac022', 'ເຕັກໂນໂລຊີເຄື່ອຂ່າຍ', 'uni004_fac004', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac023', 'ບໍລິຫານທຸລະກິດແລະການກະເສດ', 'uni004_fac005', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac024', 'ເຕັກໂນໂລຊີປຸງແຕ່ງອາຫານ', 'uni004_fac005', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac025', 'ວິທະຍາການຫຼັງການເກັບກ່ຽວ', 'uni004_fac005', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac026', 'ເສດຖະກິດເພື່ອການພັດທະນາ', 'uni004_fac005', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac027', 'ຄູຟີຊິກສາດ', 'uni004_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac028', 'ຄູປະຫວັດສາດ', 'uni004_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac029', 'ຄູວິທະຍາສາດການເມືອງ', 'uni004_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac030', 'ຄູພູມສາດ', 'uni004_fac006', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac031', 'ຄະນິດສາດ', 'uni004_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac032', 'ເຄມີສາດ', 'uni004_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac033', 'ຊີວະສາດ', 'uni004_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac034', 'ຟີຊິກສາດ', 'uni004_fac007', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac035', 'ວິສະວະກຳໄຟຟ້າ', 'uni004_fac008', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac036', 'ວິສະວະກຳຂົນສົ່ງ', 'uni004_fac008', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac037', 'ເສດຖະກິດເພື່ອພັດທະນາຊົນນະບົດແລະສົ່ງເສີມທຸລະກິດ', 'uni004_fac009', 4, 1);
INSERT INTO `course` VALUES ('uni004_fac038', 'ການບັນຊີ', 'uni004_fac002', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS001', 'ປຸກຟັງ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS002', 'ບັນຊີ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS003', 'ການບັນຊີ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS004', 'ການເງິນ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS005', 'ຄຸ້ມຄອງຫ້ອງການ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS006', 'ເລຂານຸການ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS007', 'ຕັດຫຍີບ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS008', 'ປຸງແຕງອາຫານ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS009', 'ການບໍລິການອາຫານ ແລະ ເຄື່ອງດື່ມ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS010', 'ພະນັກງານສ່ວນໜ້າ ແລະ ທີ່ພັກ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS011', 'ບໍລິການທ່ອງທ່ຽວ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS012', 'ກໍ່ສ້າງ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS013', 'ຊ່າງໄມ້', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS014', 'ລົດຍົນ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS015', 'ກົນຈັກ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS016', 'ໂລຫະກຳວິທະຍາ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS017', 'ໄຟຟ້າ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS018', 'ເອເລັກໂຕຣນິກ', 'uni017_fac01', 3, 1);
INSERT INTO `course` VALUES ('uni017_CRS019', 'ປູກຟັງ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS020', 'ບັນຊີ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS021', 'ການບັນຊີ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS022', 'ການເງິນ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS023', 'ຄຸ້ມຄອງຫ້ອງການ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS024', 'ເລຂານຸການ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS025', 'ຕັດຫຍີບ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS026', 'ປຸງແຕງອາຫານ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS027', 'ການບໍລິການອາຫານ ແລະ ເຄື່ອງດື່ມ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS028', 'ພະນັກງານສ່ວນໜ້າ ແລະ ທີ່ພັກ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS029', 'ບໍລິການທ່ອງທ່ຽວ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS030', 'ກໍ່ສ້າງ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS031', 'ຊ່າ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS032', 'ລົດຍົນ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS033', 'ກົນຈັກ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS034', 'ໂລຫະກຳວິທະຍາ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS035', 'ໄຟຟ້າ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni017_CRS036', 'ເອເລັກໂຕຣນິກ', 'uni017_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni042_course001', 'ການແພດ', 'uni042_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni042_course002', 'ເພສັດຊະກຳ', 'uni042_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni042_course003', 'ທັນຕະແພດ', 'uni042_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni042_course004', 'ພະຍາບານ', 'uni042_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni042_course005', 'ວິເຄາະການແພັດ', 'uni042_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni042_course006', 'ກາຍະບຳບັດ', 'uni042_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni042_course007', 'ຜະດຸງຄັນ', 'uni042_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni042_course008', 'ເພສັດຊະກຳສາຂາການຢາພື້ນເມືອງ', 'uni042_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni042_course009', 'ລັງສີ ແລະ ຮູບພາບການແພດ', 'uni042_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni042_course010', 'ນັກສາທາລະນະສຸກສາດ', 'uni042_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni042_course011', 'ວິທະຍາສາດພື້ນຖານ', 'uni042_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni042_course012', 'ວິທະຍາສາດພື້ນຖານ', 'uni042_fac001', 4, 1);
INSERT INTO `course` VALUES ('uni042_course013', 'ຊ່າງອົງຄະທຽມ ແລະ ເຄື່ອງຄ້ຳຊູ', 'uni042_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni042_course014', 'ຜະດຸງຄັນ', 'uni042_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni042_course015', 'ພະຍາບານ', 'uni042_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni042_course016', 'ເພສັດຊະກຳ', 'uni042_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni042_course017', 'ກາຍະບຳບັດ', 'uni042_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni042_course018', 'ລັງສີ ແລະ ຮູບພາບການແພດ', 'uni042_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni042_course019', 'ວິເຄາະການແພັດ', 'uni042_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni042_course020', 'ສາທາລະນະສຸກສາດ', 'uni042_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni042_course021', 'ຊ່າງທັນຕະກຳ', 'uni042_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni043_course001', 'ຜະດຸງຄັນ', 'uni043_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni043_course002', 'ພະຍາບານ', 'uni043_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni043_course003', 'ແພດ ຮສຂ', 'uni043_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni044_course001', 'ຜະດຸງຄັນ', 'uni044_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni044_course002', 'ພະຍາບານ', 'uni044_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni044_course003', 'ແພດ ຮສຂ', 'uni044_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni044_course004', 'ແພດ ຮສຂ', 'uni044_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni045_course001', 'ຜະດຸງຄັນ', 'uni045_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni045_course002', 'ພະຍາບານ', 'uni045_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni045_course003', 'ແພດ ຮສຂ', 'uni045_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni046_course001', 'ຜະດຸງຄັນ', 'uni046_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni046_course002', 'ພະຍາບານ', 'uni046_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni047_course001', 'ຜະດຸງຄັນ', 'uni047_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni047_course002', 'ພະຍາບານ', 'uni047_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni048_course001', 'ຜະດຸງຄັນ', 'uni048_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni048_course002', 'ພະຍາບານ', 'uni048_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni048_course003', 'ແພດ ຮສຂ', 'uni048_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni049_Course001', 'ພະຍາບານເຕັກນິກ (ຕໍ່ເນື່ອງ)', 'uni049_fac001', 8, 1);
INSERT INTO `course` VALUES ('uni050_Course001', 'ຜະດຸງຄັນຊຸມຊົນຊັ້ນສູງ', 'uni050_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni050_Course002', 'ພະຍາບານຊັ້ນສູງ', 'uni050_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni050_Course003', 'ແພດຊັ້ນສູງ ຮສຂ', 'uni050_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni051_Course001', 'ພະຍາບານເຕັກນິກ', 'uni051_fac001', 1, 1);
INSERT INTO `course` VALUES ('uni051_Course002', 'ແພດ ຮສຂ', 'uni051_fac001', 1, 1);
INSERT INTO `course` VALUES ('uni057_Course001', 'ປູກຝັງ (ຕໍ່ເນື່ອງ)', 'uni057_fac001', 7, 1);
INSERT INTO `course` VALUES ('uni057_Course002', 'ລ້ຽງສັດ (ຕໍ່ເນື່ອງ)', 'uni057_fac001', 7, 1);
INSERT INTO `course` VALUES ('uni057_Course003', 'ປ່າໄມ້ (ຕໍ່ເນື່ອງ)', 'uni057_fac001', 7, 1);
INSERT INTO `course` VALUES ('uni058_Course001', 'ປຸກຝັງ', 'uni058_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni058_Course002', 'ລ້ຽງສັດ', 'uni058_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni058_Course003', 'ປ່າໄມ້', 'uni058_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni058_Course004', 'ທຸລະກິດກະສິກຳ', 'uni058_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni058_Course005', 'ສັດຕະວະແພດ', 'uni058_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni058_Course006', 'ປູກຝັງ (ຕໍ່ເນື່ອງ)', 'uni058_fac001', 7, 1);
INSERT INTO `course` VALUES ('uni058_Course007', 'ລ້ຽງສັດ (ຕໍ່ເນື່ອງ)', 'uni058_fac001', 7, 1);
INSERT INTO `course` VALUES ('uni058_Course008', 'ປ່າໄມ້ (ຕໍ່ເນື່ອງ)', 'uni058_fac001', 7, 1);
INSERT INTO `course` VALUES ('uni059_Course001', 'ປຸກຝັງ', 'uni059_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni059_Course002', 'ລ້ຽງສັດ', 'uni059_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni059_Course003', 'ປ່າໄມ້', 'uni059_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni059_Course004', 'ທຸລະກິດກະສິກຳ', 'uni059_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni059_Course005', 'ປ້ອງກັນພືດ', 'uni059_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni059_Course006', 'ປຸກຝັງ (ຕໍ່ເນື່ອງ)', 'uni059_fac001', 7, 1);
INSERT INTO `course` VALUES ('uni059_Course007', 'ລ້ຽງສັດ (ຕໍ່ເນື່ອງ)', 'uni059_fac001', 7, 1);
INSERT INTO `course` VALUES ('uni059_Course008', 'ປ່າໄມ້ (ຕໍ່ເນື່ອງ)', 'uni059_fac001', 7, 1);
INSERT INTO `course` VALUES ('uni060_Course001', 'ປຸກຝັງ', 'uni060_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni060_Course002', 'ລ້ຽງສັດ', 'uni060_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni060_Course003', 'ປ່າໄມ້', 'uni060_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni060_Course004', 'ທຸລະກິດກະສິກຳ', 'uni060_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni060_Course005', 'ປະມົງ', 'uni060_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni060_Course006', 'ວິທະຍາສາດດິນ', 'uni060_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni060_Course007', 'ປຸກຝັງ (ຕໍ່ເນື່ອງ)', 'uni060_fac001', 7, 1);
INSERT INTO `course` VALUES ('uni060_Course008', 'ລ້ຽງສັດ (ຕໍ່ເນື່ອງ)', 'uni060_fac001', 7, 1);
INSERT INTO `course` VALUES ('uni061_Course001', 'ຊົນລະປະທານ', 'uni061_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni061_Course002', 'ຊັບພະຍາກອນນ້ຳ', 'uni061_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni061_Course003', 'ກົນຈັກກະສິກຳ', 'uni061_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni061_Course004', 'ຊົນລະປະທານ (ຕໍ່ເນື່ອງ)', 'uni061_fac001', 7, 1);
INSERT INTO `course` VALUES ('uni062_Course001', 'ບັນຊີ ແລະ ກວດສອບ', 'uni062_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni062_Course002', 'ຄຸ້ມຄອງການເງີນແຫ່ງລັດ', 'uni062_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni062_Course003', 'ຄຸ້ມຄອງການເງິນວິສະຫະກິດ', 'uni062_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni063_Course001', 'ການເງິນວິສາຫະກິດ', 'uni063_fac_001', 4, 1);
INSERT INTO `course` VALUES ('uni063_Course002', 'ການເງິນແຫ່ງລັດ', 'uni063_fac_001', 4, 1);
INSERT INTO `course` VALUES ('uni063_Course003', 'ພາສີ', 'uni063_fac_001', 4, 1);
INSERT INTO `course` VALUES ('uni063_Course004', 'ສ່ວຍສາອາກອນ', 'uni063_fac_001', 4, 1);
INSERT INTO `course` VALUES ('uni063_Course005', 'ການບັນຊີ-ກວດສອບ', 'uni063_fac_001', 4, 1);
INSERT INTO `course` VALUES ('uni064_Course001', 'ການເງິນ-ການບັນຊີ', 'uni064_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni064_Course002', 'ການທະນາຄານ', 'uni064_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni064_Course003', 'ການບັນຊີວິສະຫະກິດ', 'uni064_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni064_Course004', 'ຄຸ້ມຄອງການເງີນແຫ່ງລັດ', 'uni064_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni064_Course005', 'ຄຸ້ມຄອງການເງິນວິສະຫະກິດ', 'uni064_fac001', 2, 1);
INSERT INTO `course` VALUES ('uni065_Course001', 'ສາຂາການທະນາຄານ', 'uni065_fac_001', 4, 1);
INSERT INTO `course` VALUES ('uni065_Course002', 'ສາຂາການເງິນ', 'uni065_fac_001', 4, 1);
INSERT INTO `course` VALUES ('uni065_Course003', 'ສາຂາການບັນຊີ', 'uni065_fac_001', 4, 1);
INSERT INTO `course` VALUES ('uni065_Course004', 'ການເງິນຈຸລະພາກ', 'uni065_fac_001', 4, 1);
INSERT INTO `course` VALUES ('uni070_Course001', 'ວິຊາໂທລະຄົມມະນາຄົມ', 'uni070_fac001', 3, 1);
INSERT INTO `course` VALUES ('uni070_Course002', 'ວິຊາ ICT', 'uni070_fac001', 3, 1);
INSERT INTO `course` VALUES ('uni072_CS001', 'ການບັນຊີ', 'uni072_FC01', 3, 1);
INSERT INTO `course` VALUES ('uni072_CS002', 'ການເງີນ', 'uni072_FC02', 3, 1);
INSERT INTO `course` VALUES ('uni072_CS003', 'ບໍລິຫານທຸລະກິດການຄ້າ', 'uni072_FC03', 3, 1);
INSERT INTO `course` VALUES ('uni072_CS004', 'ຄູຄະນິດສາດ', 'uni072_FC04', 3, 1);
INSERT INTO `course` VALUES ('uni072_CS005', 'ຄູວິທະຍາສາດການເມືອງ', 'uni072_FC05', 3, 1);
INSERT INTO `course` VALUES ('uni073_CS043', 'ຄູພາສາລາວ-ວັນນະຄະດີ (ຕໍ່ເນື່ອງ)', 'uni073_UNI013', 3, 1);
INSERT INTO `course` VALUES ('uni073_CS044', 'ສາຂາວິຊາ ເສດຖະສາດ (ຕໍ່ເນື່ອງ)', 'uni073_UNI014', 3, 1);
INSERT INTO `course` VALUES ('uni073_CS045', 'ສາຂາວິຊາຄຸ້ມຄອງ (ຕໍ່ເນື່ອງ)', 'uni073_UNI014', 3, 1);
INSERT INTO `course` VALUES ('uni073_CS046', 'ການບໍລິຫານການທ່ອງທ່ຽວ (ຕໍ່ເນື່ອງ)', 'uni073_UNI014', 3, 1);
INSERT INTO `course` VALUES ('uni073_CS047', 'ພາກວິຊານິຕິສາດ (ຕໍ່ເນື່ອງ)', 'uni073_UNI015', 3, 1);
INSERT INTO `course` VALUES ('uni073_CS048', 'ພາກວິຊາລັດຖະສາດ (ຕໍ່ເນື່ອງ)', 'uni073_UNI015', 3, 1);
INSERT INTO `course` VALUES ('uni073_CS049', 'ພາກວິຊາວິສະວະກຳໄຟຟ້າ (ຕໍ່ເນື່ອງ)', 'uni073_UNI016', 3, 1);
INSERT INTO `course` VALUES ('uni073_CS050', 'ພາກວິຊາໂຍທາ (ຕໍ່ເນື່ອງ)', 'uni073_UNI016', 3, 1);
INSERT INTO `course` VALUES ('uni073_CS051', 'ສາຂາວິຊາປູກຝັງ (ຕໍ່ເນື່ອງ)', 'uni073_UNI017', 3, 1);
INSERT INTO `course` VALUES ('uni073_CS052', 'ສາຂາວິຊາລ້ຽງສັດ (ຕໍ່ເນື່ອງ)', 'uni073_UNI017', 3, 1);
INSERT INTO `course` VALUES ('uni073_CS053', 'ພາກວິຊາປ່າໄມ້ (ຕໍ່ເນື່ອງ)', 'uni073_UNI017', 3, 1);
INSERT INTO `course` VALUES ('uni074_CS055', 'ວິທະຍາສາດພຶດ (ຕໍ່ເນື່ອງ)', 'uni074_UNI018', 3, 1);
INSERT INTO `course` VALUES ('uni074_CS056', 'ວິທະຍາສາດລ້ຽງສັດ (ຕໍ່ເນື່ອງ)', 'uni074_UNI018', 3, 1);
INSERT INTO `course` VALUES ('uni074_CS057', 'ຊັບພະຍາກອນປ່າໄມ້ (ຕໍ່ເນື່ອງ)', 'uni074_UNI018', 3, 1);
INSERT INTO `course` VALUES ('uni074_CS058', 'ບໍລິຫານທຸລະກິດທົ່ວໄປ', 'uni074_UNI019', 3, 1);
INSERT INTO `course` VALUES ('uni074_CS059', 'ການເງິນ-ການທະນາຄານ', 'uni074_UNI019', 3, 1);
INSERT INTO `course` VALUES ('uni074_CS060', 'ບໍລິຫານທຸລະກິດໄອທີ', 'uni074_UNI019', 3, 1);
INSERT INTO `course` VALUES ('uni074_CS061', 'ວິສະວະກຳໄຟຟ້າ', 'uni074_UNI020', 3, 1);
INSERT INTO `course` VALUES ('uni074_CS062', 'ວິສະວະກຳຄອມພິວເຕີ', 'uni074_UNI020', 3, 1);
INSERT INTO `course` VALUES ('uni074_CS063', 'ພາສາອັງກິດ', 'uni074_UNI021', 3, 1);
INSERT INTO `course` VALUES ('uni074_cs064', 'ບໍລິຫານງານສະຖາປັດ', 'uni074_UNI023', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS001', 'ຄູຄະນິດສາດ', 'uni075_UNI001', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS002', 'ຄູເຄມມີ', 'uni075_UNI001', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS003', 'ຟິຊິກສາດ', 'uni075_UNI001', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS004', 'ປະຫວັດສາດ', 'uni075_UNI001', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS005', 'ຄູວວິທະຍາສາດການເມືອງ', 'uni075_UNI001', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS006', 'ຄູພາສາລາວ-ວັນນະຄະດີ', 'uni075_UNI001', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS007', 'ຄູພາສາອອັງກິດ', 'uni075_UNI001', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS008', 'ພາສາແລະ ວັດທະນາທຳລາວ', 'uni075_UNI002', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS009', 'ບໍລິຫານລັດຖະກິດ (ຕໍ່ເນື່ອງ)', 'uni075_UNI003', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS010', 'ວິທະຍາສາດການເມືອງ  (ຕໍ່ເນື່ອງ)', 'uni075_UNI003', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS011', 'ການທ່ອງທ່ຽວ (ຕໍ່ເນື່ອງ)', 'uni075_UNI003', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS013', 'ການໂຮງແຮມ (ຕໍ່ເນື່ອງ)', 'uni075_UNI003', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS015', 'ບໍລິຫານທຸລະກິດທົ່ວໄປ', 'uni075_UNI004', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS016', 'ຄຸ້ມຄອງເສດຖະກິດ (ຫຼັກສູດປັບປຸງຮ່ວ ສມປຊ)', 'uni075_UNI004', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS017', 'ການຄ້າ', 'uni075_UNI004', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS018', 'ການເງິນ', 'uni075_UNI004', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS019', 'ນິຕິສາດ (ຕໍ່​ເນື່ອງ)', 'uni075_UNI005', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS020', 'ກົດໝາຍອາຍາ (ຕໍ່​ເນື່ອງ)', 'uni075_UNI005', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS021', 'ກົດ​ໝາຍປົກຄອງ (ຕໍ່​ເນື່ອງ)', 'uni075_UNI005', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS023', 'ກົດໝາຍທຸລະກິດ (ຕໍ່​ເນື່ອງ)', 'uni075_UNI005', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS024', 'ວິສະວະກຳໂຍທາ', 'uni075_UNI006', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS025', 'ວິສະວະກຳກົນຈັກ', 'uni075_UNI006', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS026', 'ວິສະວະກຳໄຟຟ້າ', 'uni075_UNI006', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS027', 'ວິສະວະກຳເອເລັກໂຕນິກ', 'uni075_UNI006', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS028', 'ວິສະວະກຳໂທລະຄົມມະນາຄົມ', 'uni075_UNI006', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS029', 'ວິສະວະກຳຄວມພີວເຕີ', 'uni075_UNI006', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS030', 'ວິສະວະກຳເຕັກໂນໂລຊີຂໍ້ມູນຈຂ່າວສານ', 'uni075_UNI006', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS031', 'ວິສະວະກຳບໍ່ແຮ່', 'uni075_UNI006', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS032', 'ວິສະວະກຳຂົວທາງ', 'uni075_UNI006', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS033', 'ການປູກຝັງ (ຕໍ່ເນື່ອງ)', 'uni075_UNI007', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS034', 'ການລ້ຽງສັດ (ຕໍ່ເນື່ອງ)', 'uni075_UNI007', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS035', 'ປ່າໄມ້ (ຕໍ່ເນື່ອງ)', 'uni075_UNI008', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS036', 'ວິສະວະກຳຊົນລະປະທານ (ຕໍ່ເນື່ອງ)', 'uni075_UNI009', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS037', 'ສຳຫຼວດອອກແບບພື້ນຖານໂຄງສ້າງທາງນ້ຳ', 'uni075_UNI009', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS038', 'ການ​ຄຸ້ມ​ຄອງ​ຊັບ​ພະ​ຍາ​ກອນ​ນ້ຳ (ຕໍ່ເນື່ອງ)', 'uni075_UNI009', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS039', 'ວິທະຍາສາດຄອມພິວເຕີ', 'uni075_UNI010', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS040', 'ຄູພະລະສຶກສາ (ຕໍ່​ເນື່ອງ)', 'uni075_UNI011', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS041', 'ຄູພາສາລາວ-ວັນນະຄະດີ (ຕໍ່ເນື່ອງ)', 'uni075_UNI001', 3, 1);
INSERT INTO `course` VALUES ('uni075_CS042', 'ພາສາອັງກິດ (ຕໍ່ເນື່ອງ)', 'uni075_UNI002', 3, 1);
INSERT INTO `course` VALUES ('uni076_CS001', 'ປ່າໄມ້ລວມ', 'uni076_FC01', 2, 1);
INSERT INTO `course` VALUES ('uni076_CS002', 'ຄູ​ພະ​ລະ​ສຶກ​ສາ', 'uni076_FC02', 2, 1);
INSERT INTO `course` VALUES ('uni076_CS003', '​ເຕັກ​ນິກ​ຊົນ​ລະ​ປະ​ທານ', 'uni076_FC03', 2, 1);
INSERT INTO `course` VALUES ('uni076_CS004', 'ວິສະວະກຳຂົວທາງ', 'uni076_FC04', 2, 1);
INSERT INTO `course` VALUES ('uni077_CS001', 'ສາຂາວິຊາທ່ອງທ່ຽວ ແລະ ບໍລິການ', 'uni077_FC01', 2, 1);
INSERT INTO `course` VALUES ('uni077_CS002', 'ສາຂາວິຊາວິສະວະກຳໄຟຟ້າ', 'uni077_FC02', 2, 1);
INSERT INTO `course` VALUES ('uni077_CS003', 'ສາຂາວິຊາວິສະວະກຳໂຍທາ', 'uni077_FC02', 2, 1);
INSERT INTO `course` VALUES ('uni077_CS004', 'ປູກຝັງ', 'uni077_FC03', 2, 1);
INSERT INTO `course` VALUES ('uni077_CS005', 'ລ້ຽງສັດ', 'uni077_FC03', 2, 1);
INSERT INTO `course` VALUES ('uni077_CS006', 'ພາກວິຊານິຕິສາດ', 'uni077_FC04', 2, 1);
INSERT INTO `course` VALUES ('uni077_CS007', 'ພາກວິຊາລັດຖະສາດ', 'uni077_FC04', 2, 1);
INSERT INTO `course` VALUES ('uni100_course001', 'ວິທະຍາໄລ ເຕັກນິກ-ວິຊາຊີບ ແຂວງຄຳມ່ວນ', 'uni100_fac001', 9, 1);
INSERT INTO `course` VALUES ('uni100_course002', 'ວິທະຍາໄລ ເຕັກນິກ ມິດຕະພາບວຽງຈັນ-ຮ່າໂນຍ', 'uni100_fac001', 9, 1);
INSERT INTO `course` VALUES ('uni100_course003', 'ວິທະຍາໄລເຕັກນິກແຂວງວຽງຈັນ', 'uni100_fac001', 9, 1);
INSERT INTO `course` VALUES ('uni100_course004', 'ໂຮງຮຽນ ຕນ-ວຊ-ປປສ ແຂວງໄຊສົມບູນ', 'uni100_fac001', 9, 1);
INSERT INTO `course` VALUES ('uni101_CRS001', 'ສຳຫຼວດວັດແທກຄຸ້ມຄອງທີ່ດິນ', 'uni101_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni101_CRS002', 'ປະເມີນລາຄາຊັບສິນທີ່ດິນ', 'uni101_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni101_CRS003', 'ໄຟຟ້າເຕັກນິກ', 'uni101_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni101_CRS004', 'ວັດແທກການກໍ່ສ້າງ', 'uni101_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni101_CRS005', 'ໄຟຟ້າພະລັງງານນ້ຳ', 'uni101_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni101_CRS006', 'ໄຟຟ້າກົນຈັກພະລັງນ້ຳ', 'uni101_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni101_CRS007', 'ວິສະວະກອນຂຸດຄົ້ນແຮ່', 'uni101_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni101_CRS008', 'ອຸດສາຫະກຳປຸງແຕ່ງແຮ່', 'uni101_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni101_CRS009', 'ຊອກຄົ້ນສຳຫຼວດແຮ່', 'uni101_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni101_CRS010', 'ສິ່ງແວດລ້ອມອຸດສາຫະກຳ', 'uni101_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni101_CRS011', 'IT ພູມສັນຖານ', 'uni101_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni101_CRS012', 'IT ອຸດສະຫະກຳ', 'uni101_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni101_CRS013', 'ວິທະຍາສາດຄອມພິວເຕີ້', 'uni101_fac01', 7, 1);
INSERT INTO `course` VALUES ('uni102_CRS001', '​ສາ​ຂາ​ວິທະຍາສາດການອອກກໍາລັງກາຍ ແລະ ກິລາ', 'uni102_fac01', 4, 1);
INSERT INTO `course` VALUES ('uni102_CRS002', 'ສາ​ຂາວິທະຍາສາດການຝຶກສອນກິລາ', 'uni102_fac01', 4, 1);
INSERT INTO `course` VALUES ('uni103_CRS001', '​ສາ​ຂາ​ການ​ເງິນ-ການ​ທະ​ນາ​ຄານ', 'uni103_fac01', 4, 1);
INSERT INTO `course` VALUES ('uni103_CRS002', 'ສາ​ຂາ​ພາ​ສາ​ອັງ​ກິດ​ທຸ​ລະ​ກິດ', 'uni103_fac01', 4, 1);
INSERT INTO `course` VALUES ('uni103_CRS003', 'ສາ​ຂາ​ວິ​ຊາ​ບໍ​ລິ​ຫານ​ທຸ​ລະ​ກິດ​ທົ່ວ​ໄປ', 'uni103_fac01', 4, 1);
INSERT INTO `course` VALUES ('uni103_CRS004', '​ສາ​ຂາ​ວິ​ຊາ​ການ​ຕະຫຼາດ', 'uni103_fac01', 4, 1);
INSERT INTO `course` VALUES ('uni103_CRS005', '​ສາ​ຂາ​ການ​ເງິນ-ການ​ທະ​ນາ​ຄານ', 'uni103_fac02', 3, 1);
INSERT INTO `course` VALUES ('uni103_CRS006', 'ສາ​ຂາ​ພາ​ສາ​ອັງ​ກິດ​ທຸ​ລະ​ກິດ', 'uni103_fac02', 3, 1);
INSERT INTO `course` VALUES ('uni103_CRS007', 'ສາ​ຂາ​ວິ​ຊາ​ບໍ​ລິ​ຫານ​ທຸ​ລະ​ກິດ​ທົ່ວ​ໄປ', 'uni103_fac02', 3, 1);
INSERT INTO `course` VALUES ('uni103_CRS008', '​ສາ​ຂາ​ວິ​ຊາ​ການ​ຕະຫຼາດ', 'uni103_fac02', 3, 1);

-- ----------------------------
-- Table structure for course_level
-- ----------------------------
DROP TABLE IF EXISTS `course_level`;
CREATE TABLE `course_level`  (
  `level_id` int NOT NULL,
  `level_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`level_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of course_level
-- ----------------------------
INSERT INTO `course_level` VALUES (1, 'ຊັ້ນກາງ');
INSERT INTO `course_level` VALUES (2, 'ອະນຸປະລິນຍາ');
INSERT INTO `course_level` VALUES (3, 'ປະລິນຍາຕີ (ຕໍ່ເນື່ອງ)');
INSERT INTO `course_level` VALUES (4, 'ປະລິນຍາຕີ');
INSERT INTO `course_level` VALUES (5, 'ປະລິນຍາໂທ');
INSERT INTO `course_level` VALUES (6, 'ປະລິນຍາເອກ');
INSERT INTO `course_level` VALUES (7, 'ອະນຸປະລິນຍາຕີ (ຕໍ່ເນື່ອງ)');
INSERT INTO `course_level` VALUES (8, 'ຊັ້ນກາງ (ຕໍ່ເນື່ອງ)');
INSERT INTO `course_level` VALUES (9, 'ຊັ້ນຕົ້ນ');

-- ----------------------------
-- Table structure for create_plan
-- ----------------------------
DROP TABLE IF EXISTS `create_plan`;
CREATE TABLE `create_plan`  (
  `cre_id` int NOT NULL AUTO_INCREMENT,
  `adj_id` int NOT NULL,
  `course_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `p_m_id` int NOT NULL,
  `std_qty` int NOT NULL,
  `emp_qty` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`cre_id`) USING BTREE,
  INDEX `adj_id`(`adj_id`) USING BTREE,
  INDEX `field_id`(`course_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `create_plan_ibfk_1` FOREIGN KEY (`adj_id`) REFERENCES `adjust` (`adj_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `create_plan_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `create_plan_ibfk_4` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11988 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of create_plan
-- ----------------------------
INSERT INTO `create_plan` VALUES (6060, 162, 'uni004_fac037', 6, 35, 0, 35);
INSERT INTO `create_plan` VALUES (6061, 162, 'uni004_fac036', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6062, 162, 'uni004_fac035', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6063, 162, 'uni004_fac034', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6064, 162, 'uni004_fac033', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6065, 162, 'uni004_fac032', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6066, 162, 'uni004_fac031', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6067, 162, 'uni004_fac030', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6068, 162, 'uni004_fac029', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6069, 162, 'uni004_fac028', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6070, 162, 'uni004_fac027', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6071, 162, 'uni004_Course7', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6072, 162, 'uni004_fac026', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6073, 162, 'uni004_fac025', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6074, 162, 'uni004_fac024', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6075, 162, 'uni004_fac023', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6076, 162, 'uni004_fac022', 6, 56, 0, 35);
INSERT INTO `create_plan` VALUES (6077, 162, 'uni004_fac021', 6, 56, 0, 35);
INSERT INTO `create_plan` VALUES (6078, 162, 'uni004_fac020', 6, 56, 0, 35);
INSERT INTO `create_plan` VALUES (6079, 162, 'uni004_fac019', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6080, 162, 'uni004_fac018', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6081, 162, 'uni004_fac017', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6082, 162, 'uni004_fac016', 6, 105, 0, 35);
INSERT INTO `create_plan` VALUES (6083, 162, 'uni004_fac015', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6084, 162, 'uni004_fac014', 6, 45, 0, 35);
INSERT INTO `create_plan` VALUES (6085, 162, 'uni004_fac013', 6, 45, 0, 35);
INSERT INTO `create_plan` VALUES (6086, 162, 'uni004_fac012', 6, 45, 0, 35);
INSERT INTO `create_plan` VALUES (6087, 162, 'uni004_fac011', 6, 45, 0, 35);
INSERT INTO `create_plan` VALUES (6088, 162, 'uni004_fac010', 6, 45, 0, 35);
INSERT INTO `create_plan` VALUES (6089, 162, 'uni004_fac009', 6, 35, 0, 35);
INSERT INTO `create_plan` VALUES (6090, 162, 'uni004_fac008', 6, 35, 0, 35);
INSERT INTO `create_plan` VALUES (6091, 162, 'uni004_fac007', 6, 45, 0, 35);
INSERT INTO `create_plan` VALUES (6092, 162, 'uni004_fac006', 6, 27, 0, 35);
INSERT INTO `create_plan` VALUES (6093, 162, 'uni004_fac005', 6, 27, 0, 35);
INSERT INTO `create_plan` VALUES (6094, 162, 'uni004_fac004', 6, 27, 0, 35);
INSERT INTO `create_plan` VALUES (6095, 162, 'uni004_fac003', 6, 27, 0, 35);
INSERT INTO `create_plan` VALUES (6096, 162, 'uni004_fac002', 6, 27, 0, 35);
INSERT INTO `create_plan` VALUES (6097, 162, 'uni004_fac001', 6, 27, 0, 35);
INSERT INTO `create_plan` VALUES (6098, 162, 'uni003_Course6', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6099, 162, 'uni003_course032', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6100, 162, 'uni003_course031', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6101, 162, 'uni003_course030', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6102, 162, 'uni003_course029', 6, 40, 0, 35);
INSERT INTO `create_plan` VALUES (6103, 162, 'uni003_course028', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6104, 162, 'uni003_Course5', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6105, 162, 'uni003_Course4', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6106, 162, 'uni003_course026', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6107, 162, 'uni003_course024', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6108, 162, 'uni003_course023', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6109, 162, 'uni003_course022', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6110, 162, 'uni003_Course97', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6111, 162, 'uni003_Course3', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6112, 162, 'uni003_course020', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6113, 162, 'uni003_course019', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6114, 162, 'uni003_uni002_uni002_Course160', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6115, 162, 'uni003_Course1', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6116, 162, 'uni003_course018', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6117, 162, 'uni003_course017', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6118, 162, 'uni003_course016', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6119, 162, 'uni003_course015', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6120, 162, 'uni003_course014', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6121, 162, 'uni003_course013', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6122, 162, 'uni003_uni002_uni002_Course150', 6, 40, 0, 35);
INSERT INTO `create_plan` VALUES (6123, 162, 'uni003_course012', 6, 40, 0, 35);
INSERT INTO `create_plan` VALUES (6124, 162, 'uni003_course011', 6, 40, 0, 35);
INSERT INTO `create_plan` VALUES (6125, 162, 'uni003_course010', 6, 40, 0, 35);
INSERT INTO `create_plan` VALUES (6126, 162, 'uni003_course009', 6, 40, 0, 35);
INSERT INTO `create_plan` VALUES (6127, 162, 'uni003_course008', 6, 40, 0, 35);
INSERT INTO `create_plan` VALUES (6128, 162, 'uni003_course007', 6, 40, 0, 35);
INSERT INTO `create_plan` VALUES (6129, 162, 'uni003_course006', 6, 40, 0, 35);
INSERT INTO `create_plan` VALUES (6130, 162, 'uni003_course005', 6, 40, 0, 35);
INSERT INTO `create_plan` VALUES (6131, 162, 'uni003_uni002_uni002_Course140', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6132, 162, 'uni003_Course104', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6133, 162, 'uni003_Course01', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6134, 162, 'uni003_course003', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6135, 162, 'uni003_course001', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6136, 162, 'uni002_Course026', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6137, 162, 'uni002_Course025', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6138, 162, 'uni002_Course024', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6139, 162, 'uni002_Course022', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6140, 162, 'uni002_Course021', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6141, 162, 'uni002_Course020', 6, 56, 0, 35);
INSERT INTO `create_plan` VALUES (6142, 162, 'uni002_Course019', 6, 56, 0, 35);
INSERT INTO `create_plan` VALUES (6143, 162, 'uni002_Course018', 6, 84, 0, 35);
INSERT INTO `create_plan` VALUES (6144, 162, 'uni002_Course017', 6, 84, 0, 35);
INSERT INTO `create_plan` VALUES (6145, 162, 'uni002_uni002_uni002_Course130', 6, 56, 0, 35);
INSERT INTO `create_plan` VALUES (6146, 162, 'uni002_uni002_uni002_Course120', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6147, 162, 'uni002_Course035', 6, 56, 0, 35);
INSERT INTO `create_plan` VALUES (6148, 162, 'uni002_Course015', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6149, 162, 'uni002_Course014', 6, 56, 0, 35);
INSERT INTO `create_plan` VALUES (6150, 162, 'uni002_Course011', 6, 35, 0, 35);
INSERT INTO `create_plan` VALUES (6151, 162, 'uni002_Course010', 6, 70, 0, 35);
INSERT INTO `create_plan` VALUES (6152, 162, 'uni002_Course009', 6, 35, 0, 35);
INSERT INTO `create_plan` VALUES (6153, 162, 'uni002_Course008', 6, 35, 0, 35);
INSERT INTO `create_plan` VALUES (6154, 162, 'uni002_Course007', 6, 105, 0, 35);
INSERT INTO `create_plan` VALUES (6155, 162, 'uni002_Course006', 6, 105, 0, 35);
INSERT INTO `create_plan` VALUES (6156, 162, 'uni002_uni002_Course110', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6157, 162, 'uni002_Course005', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6158, 162, 'uni002_Course004', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6159, 162, 'uni002_Course003', 6, 25, 0, 35);
INSERT INTO `create_plan` VALUES (6160, 162, 'uni002_Course002', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6161, 162, 'uni002_Course001', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6162, 162, 'uni001_doc031', 6, 72, 0, 35);
INSERT INTO `create_plan` VALUES (6163, 162, 'uni001_Course13', 6, 60, 0, 35);
INSERT INTO `create_plan` VALUES (6164, 162, 'uni001_cours042', 6, 40, 0, 35);
INSERT INTO `create_plan` VALUES (6165, 162, 'uni001_cours106', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6166, 162, 'uni001_cours105', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6167, 162, 'uni001_cours104', 6, 8, 0, 35);
INSERT INTO `create_plan` VALUES (6168, 162, 'uni001_cours103', 6, 8, 0, 35);
INSERT INTO `create_plan` VALUES (6169, 162, 'uni001_cours102', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6170, 162, 'uni001_Course30', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6171, 162, 'uni001_Course21', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6172, 162, 'uni001_cours100', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6173, 162, 'uni001_cours099', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6174, 162, 'uni001_cours098', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6175, 162, 'uni001_Course19', 6, 27, 0, 35);
INSERT INTO `create_plan` VALUES (6176, 162, 'uni001_cours097', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6177, 162, 'uni001_cours096', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6178, 162, 'uni001_cours095', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6179, 162, 'uni001_cours094', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6180, 162, 'uni001_cours093', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6181, 162, 'uni001_cours092', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6182, 162, 'uni001_cours091', 6, 56, 0, 35);
INSERT INTO `create_plan` VALUES (6183, 162, 'uni001_cours090', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6184, 162, 'uni001_cours089', 6, 56, 0, 35);
INSERT INTO `create_plan` VALUES (6185, 162, 'uni001_cours088', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6186, 162, 'uni001_cours087', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6187, 162, 'uni001_cours086', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6188, 162, 'uni001_cours085', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6189, 162, 'uni001_cours084', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6190, 162, 'uni001_cours083', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6191, 162, 'uni001_cours082', 6, 40, 0, 35);
INSERT INTO `create_plan` VALUES (6192, 162, 'uni001_cours081', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6193, 162, 'uni001_cours080', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6194, 162, 'uni001_cours079', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6195, 162, 'uni001_cours078', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6196, 162, 'uni001_cours077', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6197, 162, 'uni001_Course56', 6, 64, 0, 35);
INSERT INTO `create_plan` VALUES (6198, 162, 'uni001_Course17', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6199, 162, 'uni001_Course15', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6200, 162, 'uni001_cours076', 6, 64, 0, 35);
INSERT INTO `create_plan` VALUES (6201, 162, 'uni001_cours075', 6, 64, 0, 35);
INSERT INTO `create_plan` VALUES (6202, 162, 'uni001_cours074', 6, 64, 0, 35);
INSERT INTO `create_plan` VALUES (6203, 162, 'uni001_cours073', 6, 64, 0, 35);
INSERT INTO `create_plan` VALUES (6204, 162, 'uni001_cours072', 6, 64, 0, 35);
INSERT INTO `create_plan` VALUES (6205, 162, 'uni001_cours071', 6, 64, 0, 35);
INSERT INTO `create_plan` VALUES (6206, 162, 'uni001_cours070', 6, 64, 0, 35);
INSERT INTO `create_plan` VALUES (6207, 162, 'uni001_cours069', 6, 64, 0, 35);
INSERT INTO `create_plan` VALUES (6208, 162, 'uni001_cours068', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6209, 162, 'uni001_cours067', 6, 64, 0, 35);
INSERT INTO `create_plan` VALUES (6210, 162, 'uni001_cours066', 6, 64, 0, 35);
INSERT INTO `create_plan` VALUES (6211, 162, 'uni001_cours064', 6, 64, 0, 35);
INSERT INTO `create_plan` VALUES (6212, 162, 'uni001_cours063', 6, 64, 0, 35);
INSERT INTO `create_plan` VALUES (6213, 162, 'uni001_Course14', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6214, 162, 'uni001_cours062', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6215, 162, 'uni001_cours061', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6216, 162, 'uni001_cours060', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6217, 162, 'uni001_cours058', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6218, 162, 'uni001_cours057', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6219, 162, 'uni001_cours056', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6220, 162, 'uni001_cours055', 6, 28, 0, 35);
INSERT INTO `create_plan` VALUES (6221, 162, 'uni001_cours054', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6222, 162, 'uni001_cours053', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6223, 162, 'uni001_cours052', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6224, 162, 'uni001_cours051', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6225, 162, 'uni001_cours050', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6226, 162, 'uni001_cours049', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6227, 162, 'uni001_cours048', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6228, 162, 'uni001_cours047', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6229, 162, 'uni001_cours046', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6230, 162, 'uni001_cours045', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6231, 162, 'uni001_cours044', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6232, 162, 'uni001_Course8', 6, 30, 0, 35);
INSERT INTO `create_plan` VALUES (6233, 162, 'uni001_Course12', 6, 60, 0, 35);
INSERT INTO `create_plan` VALUES (6234, 162, 'uni001_Course11', 6, 60, 0, 35);
INSERT INTO `create_plan` VALUES (6235, 162, 'uni001_cours041', 6, 60, 0, 35);
INSERT INTO `create_plan` VALUES (6236, 162, 'uni001_cours040', 6, 60, 0, 35);
INSERT INTO `create_plan` VALUES (6237, 162, 'uni001_cours039', 6, 60, 0, 35);
INSERT INTO `create_plan` VALUES (6238, 162, 'uni001_cours038', 6, 60, 0, 35);
INSERT INTO `create_plan` VALUES (6239, 162, 'uni001_cours037', 6, 60, 0, 35);
INSERT INTO `create_plan` VALUES (6240, 162, 'uni001_cours036', 6, 60, 0, 35);
INSERT INTO `create_plan` VALUES (6241, 162, 'uni001_cours035', 6, 60, 0, 35);
INSERT INTO `create_plan` VALUES (6242, 162, 'uni001_cours034', 6, 60, 0, 35);
INSERT INTO `create_plan` VALUES (6243, 162, 'uni001_cours033', 6, 60, 0, 35);
INSERT INTO `create_plan` VALUES (6244, 162, 'uni001_cours032', 6, 60, 0, 35);
INSERT INTO `create_plan` VALUES (6245, 162, 'uni001_Course9', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6246, 162, 'uni001_Course10', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6247, 162, 'uni001_cours031', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6248, 162, 'uni001_cours030', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6249, 162, 'uni001_cours029', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6250, 162, 'uni001_cours028', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6251, 162, 'uni001_cours026', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6252, 162, 'uni001_cours025', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6253, 162, 'uni001_cours024', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6254, 162, 'uni001_cours023', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6255, 162, 'uni001_cours022', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6256, 162, 'uni001_cours021', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6257, 162, 'uni001_cours020', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6258, 162, 'uni001_cours019', 6, 40, 0, 35);
INSERT INTO `create_plan` VALUES (6259, 162, 'uni001_cours018', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6260, 162, 'uni001_cours017', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6261, 162, 'uni001_cours016', 6, 48, 0, 35);
INSERT INTO `create_plan` VALUES (6262, 162, 'uni001_cours015', 6, 150, 0, 35);
INSERT INTO `create_plan` VALUES (6263, 162, 'uni001_cours014', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6264, 162, 'uni001_cours013', 6, 24, 0, 35);
INSERT INTO `create_plan` VALUES (6265, 162, 'uni001_cours012', 6, 32, 0, 35);
INSERT INTO `create_plan` VALUES (6266, 162, 'uni001_cours011', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6267, 162, 'uni001_cours010', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6268, 162, 'uni001_cours009', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6269, 162, 'uni001_cours008', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6270, 162, 'uni001_cours005', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6271, 162, 'uni001_cours004', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6272, 162, 'uni001_cours003', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6273, 162, 'uni001_cours002', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6274, 162, 'uni001_cours001', 6, 20, 0, 35);
INSERT INTO `create_plan` VALUES (6275, 162, 'uni003_Course6', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6276, 162, 'uni003_course032', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6277, 162, 'uni003_course031', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6278, 162, 'uni003_course030', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6279, 162, 'uni003_course029', 11, 40, 0, 34);
INSERT INTO `create_plan` VALUES (6280, 162, 'uni003_course028', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6281, 162, 'uni003_Course5', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6282, 162, 'uni003_Course4', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6283, 162, 'uni003_course026', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6284, 162, 'uni003_course025', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6285, 162, 'uni003_course024', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6286, 162, 'uni003_course023', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6287, 162, 'uni003_course022', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6288, 162, 'uni003_Course3', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6289, 162, 'uni003_course021', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6290, 162, 'uni003_course019', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6291, 162, 'uni003_uni002_uni002_Course160', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6292, 162, 'uni003_Course1', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6293, 162, 'uni003_course018', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6294, 162, 'uni003_course017', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6295, 162, 'uni003_course016', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6296, 162, 'uni003_course015', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6297, 162, 'uni003_course014', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6298, 162, 'uni003_course013', 11, 32, 0, 34);
INSERT INTO `create_plan` VALUES (6299, 162, 'uni003_uni002_uni002_Course150', 11, 40, 0, 34);
INSERT INTO `create_plan` VALUES (6300, 162, 'uni003_course012', 11, 40, 0, 34);
INSERT INTO `create_plan` VALUES (6301, 162, 'uni003_course011', 11, 40, 0, 34);
INSERT INTO `create_plan` VALUES (6302, 162, 'uni003_course010', 11, 40, 0, 34);
INSERT INTO `create_plan` VALUES (6303, 162, 'uni003_course009', 11, 40, 0, 34);
INSERT INTO `create_plan` VALUES (6304, 162, 'uni003_course008', 11, 40, 0, 34);
INSERT INTO `create_plan` VALUES (6305, 162, 'uni003_course007', 11, 40, 0, 34);
INSERT INTO `create_plan` VALUES (6306, 162, 'uni003_course006', 11, 40, 0, 34);
INSERT INTO `create_plan` VALUES (6307, 162, 'uni003_course005', 11, 40, 0, 34);
INSERT INTO `create_plan` VALUES (6308, 162, 'uni003_uni002_uni002_Course140', 11, 20, 0, 34);
INSERT INTO `create_plan` VALUES (6309, 162, 'uni003_Course104', 11, 20, 0, 34);
INSERT INTO `create_plan` VALUES (6310, 162, 'uni003_Course01', 11, 20, 0, 34);
INSERT INTO `create_plan` VALUES (6311, 162, 'uni003_course003', 11, 20, 0, 34);
INSERT INTO `create_plan` VALUES (6312, 162, 'uni003_course001', 11, 20, 0, 34);
INSERT INTO `create_plan` VALUES (6313, 162, 'uni004_fac037', 1, 35, 0, 6);
INSERT INTO `create_plan` VALUES (6314, 162, 'uni004_fac036', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6315, 162, 'uni004_fac035', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6316, 162, 'uni004_fac034', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6317, 162, 'uni004_fac033', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6318, 162, 'uni004_fac032', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6319, 162, 'uni004_fac031', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6320, 162, 'uni004_fac030', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6321, 162, 'uni004_fac029', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6322, 162, 'uni004_fac028', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6323, 162, 'uni004_fac027', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6324, 162, 'uni004_Course7', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6325, 162, 'uni004_fac026', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6326, 162, 'uni004_fac025', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6327, 162, 'uni004_fac024', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6328, 162, 'uni004_fac023', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6329, 162, 'uni004_fac022', 1, 56, 0, 6);
INSERT INTO `create_plan` VALUES (6330, 162, 'uni004_fac021', 1, 56, 0, 6);
INSERT INTO `create_plan` VALUES (6331, 162, 'uni004_fac020', 1, 56, 0, 6);
INSERT INTO `create_plan` VALUES (6332, 162, 'uni004_fac019', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6333, 162, 'uni004_fac018', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6334, 162, 'uni004_fac017', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6335, 162, 'uni004_fac016', 1, 105, 0, 6);
INSERT INTO `create_plan` VALUES (6336, 162, 'uni004_fac015', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6337, 162, 'uni004_fac014', 1, 45, 0, 6);
INSERT INTO `create_plan` VALUES (6338, 162, 'uni004_fac013', 1, 45, 0, 6);
INSERT INTO `create_plan` VALUES (6339, 162, 'uni004_fac012', 1, 45, 0, 6);
INSERT INTO `create_plan` VALUES (6340, 162, 'uni004_fac011', 1, 45, 0, 6);
INSERT INTO `create_plan` VALUES (6341, 162, 'uni004_fac010', 1, 45, 0, 6);
INSERT INTO `create_plan` VALUES (6342, 162, 'uni004_fac009', 1, 35, 0, 6);
INSERT INTO `create_plan` VALUES (6343, 162, 'uni004_fac008', 1, 35, 0, 6);
INSERT INTO `create_plan` VALUES (6344, 162, 'uni004_fac007', 1, 45, 0, 6);
INSERT INTO `create_plan` VALUES (6345, 162, 'uni004_fac006', 1, 27, 0, 6);
INSERT INTO `create_plan` VALUES (6346, 162, 'uni004_fac005', 1, 27, 0, 6);
INSERT INTO `create_plan` VALUES (6347, 162, 'uni004_fac004', 1, 27, 0, 6);
INSERT INTO `create_plan` VALUES (6348, 162, 'uni004_fac003', 1, 27, 0, 6);
INSERT INTO `create_plan` VALUES (6349, 162, 'uni004_fac002', 1, 27, 0, 6);
INSERT INTO `create_plan` VALUES (6350, 162, 'uni004_fac001', 1, 27, 0, 6);
INSERT INTO `create_plan` VALUES (6351, 162, 'uni003_Course6', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6352, 162, 'uni003_course032', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6353, 162, 'uni003_course031', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6354, 162, 'uni003_course030', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6355, 162, 'uni003_course029', 1, 40, 0, 6);
INSERT INTO `create_plan` VALUES (6356, 162, 'uni003_course028', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6357, 162, 'uni003_Course5', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6358, 162, 'uni003_Course4', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6359, 162, 'uni003_course026', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6360, 162, 'uni003_course024', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6361, 162, 'uni003_course023', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6362, 162, 'uni003_course022', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6363, 162, 'uni003_Course3', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6364, 162, 'uni003_course021', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6365, 162, 'uni003_course019', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6366, 162, 'uni003_uni002_uni002_Course160', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6367, 162, 'uni003_Course1', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6368, 162, 'uni003_course018', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6369, 162, 'uni003_course017', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6370, 162, 'uni003_course016', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6371, 162, 'uni003_course015', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6372, 162, 'uni003_course014', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6373, 162, 'uni003_course013', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6374, 162, 'uni003_uni002_uni002_Course150', 1, 40, 0, 6);
INSERT INTO `create_plan` VALUES (6375, 162, 'uni003_course012', 1, 40, 0, 6);
INSERT INTO `create_plan` VALUES (6376, 162, 'uni003_course011', 1, 40, 0, 6);
INSERT INTO `create_plan` VALUES (6377, 162, 'uni003_course010', 1, 40, 0, 6);
INSERT INTO `create_plan` VALUES (6378, 162, 'uni003_course009', 1, 40, 0, 6);
INSERT INTO `create_plan` VALUES (6379, 162, 'uni003_course008', 1, 40, 0, 6);
INSERT INTO `create_plan` VALUES (6380, 162, 'uni003_course007', 1, 40, 0, 6);
INSERT INTO `create_plan` VALUES (6381, 162, 'uni003_course006', 1, 40, 0, 6);
INSERT INTO `create_plan` VALUES (6382, 162, 'uni003_course005', 1, 40, 0, 6);
INSERT INTO `create_plan` VALUES (6383, 162, 'uni003_uni002_uni002_Course140', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6384, 162, 'uni003_Course104', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6385, 162, 'uni003_Course01', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6386, 162, 'uni003_course003', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6387, 162, 'uni003_course001', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6388, 162, 'uni002_Course026', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6389, 162, 'uni002_Course025', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6390, 162, 'uni002_Course024', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6391, 162, 'uni002_Course022', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6392, 162, 'uni002_Course021', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6393, 162, 'uni002_Course020', 1, 56, 0, 6);
INSERT INTO `create_plan` VALUES (6394, 162, 'uni002_Course019', 1, 56, 0, 6);
INSERT INTO `create_plan` VALUES (6395, 162, 'uni002_Course018', 1, 84, 0, 6);
INSERT INTO `create_plan` VALUES (6396, 162, 'uni002_Course017', 1, 84, 0, 6);
INSERT INTO `create_plan` VALUES (6397, 162, 'uni002_Course011', 1, 35, 0, 6);
INSERT INTO `create_plan` VALUES (6398, 162, 'uni002_Course010', 1, 70, 0, 6);
INSERT INTO `create_plan` VALUES (6399, 162, 'uni002_Course009', 1, 35, 0, 6);
INSERT INTO `create_plan` VALUES (6400, 162, 'uni002_Course008', 1, 35, 0, 6);
INSERT INTO `create_plan` VALUES (6401, 162, 'uni002_Course007', 1, 105, 0, 6);
INSERT INTO `create_plan` VALUES (6402, 162, 'uni002_Course006', 1, 105, 0, 6);
INSERT INTO `create_plan` VALUES (6403, 162, 'uni002_uni002_Course110', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6404, 162, 'uni002_Course005', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6405, 162, 'uni002_Course004', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6406, 162, 'uni002_Course003', 1, 25, 0, 6);
INSERT INTO `create_plan` VALUES (6407, 162, 'uni002_Course002', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6408, 162, 'uni002_Course001', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6409, 162, 'uni001_doc031', 1, 72, 0, 6);
INSERT INTO `create_plan` VALUES (6410, 162, 'uni001_Course13', 1, 60, 0, 6);
INSERT INTO `create_plan` VALUES (6411, 162, 'uni001_cours042', 1, 40, 0, 6);
INSERT INTO `create_plan` VALUES (6412, 162, 'uni001_cours106', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6413, 162, 'uni001_cours105', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6414, 162, 'uni001_cours104', 1, 8, 0, 6);
INSERT INTO `create_plan` VALUES (6415, 162, 'uni001_cours103', 1, 8, 0, 6);
INSERT INTO `create_plan` VALUES (6416, 162, 'uni001_cours102', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6417, 162, 'uni001_Course30', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6418, 162, 'uni001_Course21', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6419, 162, 'uni001_cours100', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6420, 162, 'uni001_cours099', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6421, 162, 'uni001_cours098', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6422, 162, 'uni001_Course19', 1, 27, 0, 6);
INSERT INTO `create_plan` VALUES (6423, 162, 'uni001_cours097', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6424, 162, 'uni001_cours096', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6425, 162, 'uni001_cours095', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6426, 162, 'uni001_cours094', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6427, 162, 'uni001_cours093', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6428, 162, 'uni001_cours092', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6429, 162, 'uni001_cours091', 1, 56, 0, 6);
INSERT INTO `create_plan` VALUES (6430, 162, 'uni001_cours090', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6431, 162, 'uni001_cours089', 1, 56, 0, 6);
INSERT INTO `create_plan` VALUES (6432, 162, 'uni001_cours088', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6433, 162, 'uni001_cours087', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6434, 162, 'uni001_cours086', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6435, 162, 'uni001_cours085', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6436, 162, 'uni001_cours084', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6437, 162, 'uni001_cours083', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6438, 162, 'uni001_cours082', 1, 40, 0, 6);
INSERT INTO `create_plan` VALUES (6439, 162, 'uni001_cours081', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6440, 162, 'uni001_cours080', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6441, 162, 'uni001_cours079', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6442, 162, 'uni001_cours078', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6443, 162, 'uni001_cours077', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6444, 162, 'uni001_Course17', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6445, 162, 'uni001_Course15', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6446, 162, 'uni001_cours076', 1, 64, 0, 6);
INSERT INTO `create_plan` VALUES (6447, 162, 'uni001_cours075', 1, 64, 0, 6);
INSERT INTO `create_plan` VALUES (6448, 162, 'uni001_cours074', 1, 64, 0, 6);
INSERT INTO `create_plan` VALUES (6449, 162, 'uni001_cours073', 1, 64, 0, 6);
INSERT INTO `create_plan` VALUES (6450, 162, 'uni001_cours072', 1, 64, 0, 6);
INSERT INTO `create_plan` VALUES (6451, 162, 'uni001_cours071', 1, 64, 0, 6);
INSERT INTO `create_plan` VALUES (6452, 162, 'uni001_cours070', 1, 64, 0, 6);
INSERT INTO `create_plan` VALUES (6453, 162, 'uni001_cours069', 1, 64, 0, 6);
INSERT INTO `create_plan` VALUES (6454, 162, 'uni001_cours068', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6455, 162, 'uni001_cours067', 1, 64, 0, 6);
INSERT INTO `create_plan` VALUES (6456, 162, 'uni001_cours066', 1, 64, 0, 6);
INSERT INTO `create_plan` VALUES (6457, 162, 'uni001_cours064', 1, 64, 0, 6);
INSERT INTO `create_plan` VALUES (6458, 162, 'uni001_cours063', 1, 64, 0, 6);
INSERT INTO `create_plan` VALUES (6459, 162, 'uni001_Course14', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6460, 162, 'uni001_cours062', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6461, 162, 'uni001_cours061', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6462, 162, 'uni001_cours060', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6463, 162, 'uni001_cours058', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6464, 162, 'uni001_cours057', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6465, 162, 'uni001_cours056', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6466, 162, 'uni001_cours055', 1, 28, 0, 6);
INSERT INTO `create_plan` VALUES (6467, 162, 'uni001_cours054', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6468, 162, 'uni001_cours053', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6469, 162, 'uni001_cours052', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6470, 162, 'uni001_cours051', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6471, 162, 'uni001_cours050', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6472, 162, 'uni001_cours049', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6473, 162, 'uni001_cours048', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6474, 162, 'uni001_cours047', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6475, 162, 'uni001_cours046', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6476, 162, 'uni001_cours045', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6477, 162, 'uni001_cours044', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6478, 162, 'uni001_Course8', 1, 30, 0, 6);
INSERT INTO `create_plan` VALUES (6479, 162, 'uni001_Course12', 1, 60, 0, 6);
INSERT INTO `create_plan` VALUES (6480, 162, 'uni001_Course11', 1, 60, 0, 6);
INSERT INTO `create_plan` VALUES (6481, 162, 'uni001_cours041', 1, 60, 0, 6);
INSERT INTO `create_plan` VALUES (6482, 162, 'uni001_cours040', 1, 60, 0, 6);
INSERT INTO `create_plan` VALUES (6483, 162, 'uni001_cours039', 1, 60, 0, 6);
INSERT INTO `create_plan` VALUES (6484, 162, 'uni001_cours038', 1, 60, 0, 6);
INSERT INTO `create_plan` VALUES (6485, 162, 'uni001_cours037', 1, 60, 0, 6);
INSERT INTO `create_plan` VALUES (6486, 162, 'uni001_cours036', 1, 60, 0, 6);
INSERT INTO `create_plan` VALUES (6487, 162, 'uni001_cours035', 1, 60, 0, 6);
INSERT INTO `create_plan` VALUES (6488, 162, 'uni001_cours034', 1, 60, 0, 6);
INSERT INTO `create_plan` VALUES (6489, 162, 'uni001_cours033', 1, 60, 0, 6);
INSERT INTO `create_plan` VALUES (6490, 162, 'uni001_cours032', 1, 60, 0, 6);
INSERT INTO `create_plan` VALUES (6491, 162, 'uni001_Course9', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6492, 162, 'uni001_Course10', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6493, 162, 'uni001_cours031', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6494, 162, 'uni001_cours030', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6495, 162, 'uni001_cours029', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6496, 162, 'uni001_cours028', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6497, 162, 'uni001_cours026', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6498, 162, 'uni001_cours025', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6499, 162, 'uni001_cours024', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6500, 162, 'uni001_cours023', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6501, 162, 'uni001_cours022', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6502, 162, 'uni001_cours021', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6503, 162, 'uni001_cours020', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6504, 162, 'uni001_cours019', 1, 40, 0, 6);
INSERT INTO `create_plan` VALUES (6505, 162, 'uni001_cours018', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6506, 162, 'uni001_cours017', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6507, 162, 'uni001_cours016', 1, 48, 0, 6);
INSERT INTO `create_plan` VALUES (6508, 162, 'uni001_cours015', 1, 150, 0, 6);
INSERT INTO `create_plan` VALUES (6509, 162, 'uni001_cours014', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6510, 162, 'uni001_cours013', 1, 24, 0, 6);
INSERT INTO `create_plan` VALUES (6511, 162, 'uni001_cours012', 1, 32, 0, 6);
INSERT INTO `create_plan` VALUES (6512, 162, 'uni001_cours011', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6513, 162, 'uni001_cours010', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6514, 162, 'uni001_cours009', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6515, 162, 'uni001_cours008', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6516, 162, 'uni001_cours005', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6517, 162, 'uni001_cours004', 1, 15, 0, 6);
INSERT INTO `create_plan` VALUES (6518, 162, 'uni001_cours003', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6519, 162, 'uni001_cours002', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6520, 162, 'uni001_cours001', 1, 20, 0, 6);
INSERT INTO `create_plan` VALUES (6521, 162, 'uni003_Course6', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6522, 162, 'uni003_course032', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6523, 162, 'uni003_course031', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6524, 162, 'uni003_course030', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6525, 162, 'uni003_course029', 12, 40, 0, 32);
INSERT INTO `create_plan` VALUES (6526, 162, 'uni003_course028', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6527, 162, 'uni003_Course5', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6528, 162, 'uni003_Course4', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6529, 162, 'uni003_course026', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6530, 162, 'uni003_course024', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6531, 162, 'uni003_course023', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6532, 162, 'uni003_course022', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6533, 162, 'uni003_Course3', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6534, 162, 'uni003_course021', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6535, 162, 'uni003_course019', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6536, 162, 'uni003_uni002_uni002_Course160', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6537, 162, 'uni003_Course1', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6538, 162, 'uni003_course018', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6539, 162, 'uni003_course017', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6540, 162, 'uni003_course016', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6541, 162, 'uni003_course015', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6542, 162, 'uni003_course014', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6543, 162, 'uni003_course013', 12, 32, 0, 32);
INSERT INTO `create_plan` VALUES (6544, 162, 'uni003_uni002_uni002_Course150', 12, 40, 0, 32);
INSERT INTO `create_plan` VALUES (6545, 162, 'uni003_course012', 12, 40, 0, 32);
INSERT INTO `create_plan` VALUES (6546, 162, 'uni003_course011', 12, 40, 0, 32);
INSERT INTO `create_plan` VALUES (6547, 162, 'uni003_course010', 12, 40, 0, 32);
INSERT INTO `create_plan` VALUES (6548, 162, 'uni003_course009', 12, 40, 0, 32);
INSERT INTO `create_plan` VALUES (6549, 162, 'uni003_course008', 12, 40, 0, 32);
INSERT INTO `create_plan` VALUES (6550, 162, 'uni003_course007', 12, 40, 0, 32);
INSERT INTO `create_plan` VALUES (6551, 162, 'uni003_course006', 12, 40, 0, 32);
INSERT INTO `create_plan` VALUES (6552, 162, 'uni003_course005', 12, 40, 0, 32);
INSERT INTO `create_plan` VALUES (6553, 162, 'uni003_uni002_uni002_Course140', 12, 20, 0, 32);
INSERT INTO `create_plan` VALUES (6554, 162, 'uni003_Course104', 12, 20, 0, 32);
INSERT INTO `create_plan` VALUES (6555, 162, 'uni003_Course01', 12, 20, 0, 32);
INSERT INTO `create_plan` VALUES (6556, 162, 'uni003_course003', 12, 20, 0, 32);
INSERT INTO `create_plan` VALUES (6557, 162, 'uni003_course001', 12, 20, 0, 32);
INSERT INTO `create_plan` VALUES (6558, 162, 'uni003_Course6', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6559, 162, 'uni003_course032', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6560, 162, 'uni003_course031', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6561, 162, 'uni003_course030', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6562, 162, 'uni003_course029', 13, 40, 0, 33);
INSERT INTO `create_plan` VALUES (6563, 162, 'uni003_course028', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6564, 162, 'uni003_Course5', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6565, 162, 'uni003_Course4', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6566, 162, 'uni003_course026', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6567, 162, 'uni003_course024', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6568, 162, 'uni003_course023', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6569, 162, 'uni003_course022', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6570, 162, 'uni003_Course3', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6571, 162, 'uni003_course021', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6572, 162, 'uni003_course019', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6573, 162, 'uni003_uni002_uni002_Course160', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6574, 162, 'uni003_Course1', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6575, 162, 'uni003_course018', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6576, 162, 'uni003_course017', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6577, 162, 'uni003_course016', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6578, 162, 'uni003_course015', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6579, 162, 'uni003_course014', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6580, 162, 'uni003_course013', 13, 32, 0, 33);
INSERT INTO `create_plan` VALUES (6581, 162, 'uni003_uni002_uni002_Course150', 13, 40, 0, 33);
INSERT INTO `create_plan` VALUES (6582, 162, 'uni003_course012', 13, 40, 0, 33);
INSERT INTO `create_plan` VALUES (6583, 162, 'uni003_course011', 13, 40, 0, 33);
INSERT INTO `create_plan` VALUES (6584, 162, 'uni003_course010', 13, 40, 0, 33);
INSERT INTO `create_plan` VALUES (6585, 162, 'uni003_course009', 13, 40, 0, 33);
INSERT INTO `create_plan` VALUES (6586, 162, 'uni003_course008', 13, 40, 0, 33);
INSERT INTO `create_plan` VALUES (6587, 162, 'uni003_course007', 13, 40, 0, 33);
INSERT INTO `create_plan` VALUES (6588, 162, 'uni003_course006', 13, 40, 0, 33);
INSERT INTO `create_plan` VALUES (6589, 162, 'uni003_course005', 13, 40, 0, 33);
INSERT INTO `create_plan` VALUES (6590, 162, 'uni003_uni002_uni002_Course140', 13, 20, 0, 33);
INSERT INTO `create_plan` VALUES (6591, 162, 'uni003_Course104', 13, 20, 0, 33);
INSERT INTO `create_plan` VALUES (6592, 162, 'uni003_Course01', 13, 20, 0, 33);
INSERT INTO `create_plan` VALUES (6593, 162, 'uni003_course003', 13, 20, 0, 33);
INSERT INTO `create_plan` VALUES (6594, 162, 'uni003_course001', 13, 20, 0, 33);
INSERT INTO `create_plan` VALUES (6595, 162, 'uni003_Course6', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6596, 162, 'uni003_course032', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6597, 162, 'uni003_course031', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6598, 162, 'uni003_course030', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6599, 162, 'uni003_course029', 14, 40, 0, 37);
INSERT INTO `create_plan` VALUES (6600, 162, 'uni003_course028', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6601, 162, 'uni003_Course5', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6602, 162, 'uni003_Course4', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6603, 162, 'uni003_course026', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6604, 162, 'uni003_course024', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6605, 162, 'uni003_course023', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6606, 162, 'uni003_course022', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6607, 162, 'uni003_Course3', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6608, 162, 'uni003_course021', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6609, 162, 'uni003_course019', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6610, 162, 'uni003_uni002_uni002_Course160', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6611, 162, 'uni003_Course1', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6612, 162, 'uni003_course018', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6613, 162, 'uni003_course017', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6614, 162, 'uni003_course016', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6615, 162, 'uni003_course015', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6616, 162, 'uni003_course014', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6617, 162, 'uni003_course013', 14, 32, 0, 37);
INSERT INTO `create_plan` VALUES (6618, 162, 'uni003_uni002_uni002_Course150', 14, 40, 0, 37);
INSERT INTO `create_plan` VALUES (6619, 162, 'uni003_course012', 14, 40, 0, 37);
INSERT INTO `create_plan` VALUES (6620, 162, 'uni003_course011', 14, 40, 0, 37);
INSERT INTO `create_plan` VALUES (6621, 162, 'uni003_course010', 14, 40, 0, 37);
INSERT INTO `create_plan` VALUES (6622, 162, 'uni003_course009', 14, 40, 0, 37);
INSERT INTO `create_plan` VALUES (6623, 162, 'uni003_course008', 14, 40, 0, 37);
INSERT INTO `create_plan` VALUES (6624, 162, 'uni003_course007', 14, 40, 0, 37);
INSERT INTO `create_plan` VALUES (6625, 162, 'uni003_course006', 14, 40, 0, 37);
INSERT INTO `create_plan` VALUES (6626, 162, 'uni003_course005', 14, 40, 0, 37);
INSERT INTO `create_plan` VALUES (6627, 162, 'uni003_uni002_uni002_Course140', 14, 20, 0, 37);
INSERT INTO `create_plan` VALUES (6628, 162, 'uni003_Course104', 14, 20, 0, 37);
INSERT INTO `create_plan` VALUES (6629, 162, 'uni003_Course01', 14, 20, 0, 37);
INSERT INTO `create_plan` VALUES (6630, 162, 'uni003_course003', 14, 20, 0, 37);
INSERT INTO `create_plan` VALUES (6631, 162, 'uni003_course001', 14, 20, 0, 37);
INSERT INTO `create_plan` VALUES (6632, 162, 'uni003_Course6', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6633, 162, 'uni003_course032', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6634, 162, 'uni003_course031', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6635, 162, 'uni003_course030', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6636, 162, 'uni003_course029', 15, 40, 0, 38);
INSERT INTO `create_plan` VALUES (6637, 162, 'uni003_course028', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6638, 162, 'uni003_Course5', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6639, 162, 'uni003_Course4', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6640, 162, 'uni003_course026', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6641, 162, 'uni003_course024', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6642, 162, 'uni003_course023', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6643, 162, 'uni003_course022', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6644, 162, 'uni003_Course3', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6645, 162, 'uni003_course021', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6646, 162, 'uni003_course019', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6647, 162, 'uni003_uni002_uni002_Course160', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6648, 162, 'uni003_Course1', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6649, 162, 'uni003_course018', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6650, 162, 'uni003_course017', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6651, 162, 'uni003_course016', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6652, 162, 'uni003_course015', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6653, 162, 'uni003_course014', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6654, 162, 'uni003_course013', 15, 32, 0, 38);
INSERT INTO `create_plan` VALUES (6655, 162, 'uni003_uni002_uni002_Course150', 15, 40, 0, 38);
INSERT INTO `create_plan` VALUES (6656, 162, 'uni003_course012', 15, 40, 0, 38);
INSERT INTO `create_plan` VALUES (6657, 162, 'uni003_course011', 15, 40, 0, 38);
INSERT INTO `create_plan` VALUES (6658, 162, 'uni003_course010', 15, 40, 0, 38);
INSERT INTO `create_plan` VALUES (6659, 162, 'uni003_course009', 15, 40, 0, 38);
INSERT INTO `create_plan` VALUES (6660, 162, 'uni003_course008', 15, 40, 0, 38);
INSERT INTO `create_plan` VALUES (6661, 162, 'uni003_course007', 15, 40, 0, 38);
INSERT INTO `create_plan` VALUES (6662, 162, 'uni003_course006', 15, 40, 0, 38);
INSERT INTO `create_plan` VALUES (6663, 162, 'uni003_course005', 15, 40, 0, 38);
INSERT INTO `create_plan` VALUES (6664, 162, 'uni003_uni002_uni002_Course140', 15, 20, 0, 38);
INSERT INTO `create_plan` VALUES (6665, 162, 'uni003_Course104', 15, 20, 0, 38);
INSERT INTO `create_plan` VALUES (6666, 162, 'uni003_Course01', 15, 20, 0, 38);
INSERT INTO `create_plan` VALUES (6667, 162, 'uni003_course003', 15, 20, 0, 38);
INSERT INTO `create_plan` VALUES (6668, 162, 'uni003_course001', 15, 20, 0, 38);
INSERT INTO `create_plan` VALUES (6669, 162, 'uni004_fac037', 7, 35, 0, 28);
INSERT INTO `create_plan` VALUES (6670, 162, 'uni004_fac036', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6671, 162, 'uni004_fac035', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6672, 162, 'uni004_fac034', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6673, 162, 'uni004_fac033', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6674, 162, 'uni004_fac032', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6675, 162, 'uni004_fac031', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6676, 162, 'uni004_fac030', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6677, 162, 'uni004_fac029', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6678, 162, 'uni004_fac028', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6679, 162, 'uni004_fac027', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6680, 162, 'uni004_Course7', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6681, 162, 'uni004_fac026', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6682, 162, 'uni004_fac025', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6683, 162, 'uni004_fac024', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6684, 162, 'uni004_fac023', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6685, 162, 'uni004_fac022', 7, 56, 0, 28);
INSERT INTO `create_plan` VALUES (6686, 162, 'uni004_fac021', 7, 56, 0, 28);
INSERT INTO `create_plan` VALUES (6687, 162, 'uni004_fac020', 7, 56, 0, 28);
INSERT INTO `create_plan` VALUES (6688, 162, 'uni004_fac019', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6689, 162, 'uni004_fac018', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6690, 162, 'uni004_fac017', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6691, 162, 'uni004_fac016', 7, 105, 0, 28);
INSERT INTO `create_plan` VALUES (6692, 162, 'uni004_fac015', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6693, 162, 'uni004_fac014', 7, 45, 0, 28);
INSERT INTO `create_plan` VALUES (6694, 162, 'uni004_fac013', 7, 45, 0, 28);
INSERT INTO `create_plan` VALUES (6695, 162, 'uni004_fac012', 7, 45, 0, 28);
INSERT INTO `create_plan` VALUES (6696, 162, 'uni004_fac011', 7, 45, 0, 28);
INSERT INTO `create_plan` VALUES (6697, 162, 'uni004_fac010', 7, 45, 0, 28);
INSERT INTO `create_plan` VALUES (6698, 162, 'uni004_fac009', 7, 35, 0, 28);
INSERT INTO `create_plan` VALUES (6699, 162, 'uni004_fac008', 7, 35, 0, 28);
INSERT INTO `create_plan` VALUES (6700, 162, 'uni004_fac007', 7, 45, 0, 28);
INSERT INTO `create_plan` VALUES (6701, 162, 'uni004_fac006', 7, 27, 0, 28);
INSERT INTO `create_plan` VALUES (6702, 162, 'uni004_fac005', 7, 27, 0, 28);
INSERT INTO `create_plan` VALUES (6703, 162, 'uni004_fac004', 7, 27, 0, 28);
INSERT INTO `create_plan` VALUES (6704, 162, 'uni004_fac003', 7, 27, 0, 28);
INSERT INTO `create_plan` VALUES (6705, 162, 'uni004_fac002', 7, 27, 0, 28);
INSERT INTO `create_plan` VALUES (6706, 162, 'uni004_fac001', 7, 27, 0, 28);
INSERT INTO `create_plan` VALUES (6707, 162, 'uni003_Course6', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6708, 162, 'uni003_course032', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6709, 162, 'uni003_course031', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6710, 162, 'uni003_course030', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6711, 162, 'uni003_course029', 7, 40, 0, 28);
INSERT INTO `create_plan` VALUES (6712, 162, 'uni003_course028', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6713, 162, 'uni003_Course5', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6714, 162, 'uni003_Course4', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6715, 162, 'uni003_course026', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6716, 162, 'uni003_course024', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6717, 162, 'uni003_course023', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6718, 162, 'uni003_course022', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6719, 162, 'uni003_Course3', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6720, 162, 'uni003_Course2', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6721, 162, 'uni003_course021', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6722, 162, 'uni003_course019', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6723, 162, 'uni003_uni002_uni002_Course160', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6724, 162, 'uni003_Course1', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6725, 162, 'uni003_course018', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6726, 162, 'uni003_course017', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6727, 162, 'uni003_course016', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6728, 162, 'uni003_course015', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6729, 162, 'uni003_course014', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6730, 162, 'uni003_course013', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6731, 162, 'uni003_uni002_uni002_Course150', 7, 40, 0, 28);
INSERT INTO `create_plan` VALUES (6732, 162, 'uni003_Course91', 7, 40, 0, 28);
INSERT INTO `create_plan` VALUES (6733, 162, 'uni003_course012', 7, 40, 0, 28);
INSERT INTO `create_plan` VALUES (6734, 162, 'uni003_course010', 7, 40, 0, 28);
INSERT INTO `create_plan` VALUES (6735, 162, 'uni003_course009', 7, 40, 0, 28);
INSERT INTO `create_plan` VALUES (6736, 162, 'uni003_course008', 7, 40, 0, 28);
INSERT INTO `create_plan` VALUES (6737, 162, 'uni003_course007', 7, 40, 0, 28);
INSERT INTO `create_plan` VALUES (6738, 162, 'uni003_course006', 7, 40, 0, 28);
INSERT INTO `create_plan` VALUES (6739, 162, 'uni003_course005', 7, 40, 0, 28);
INSERT INTO `create_plan` VALUES (6740, 162, 'uni003_uni002_uni002_Course140', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6741, 162, 'uni003_Course104', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6742, 162, 'uni003_Course01', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6743, 162, 'uni003_course003', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6744, 162, 'uni003_course001', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6745, 162, 'uni002_Course026', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6746, 162, 'uni002_Course025', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6747, 162, 'uni002_Course023', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6748, 162, 'uni002_Course022', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6749, 162, 'uni002_Course021', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6750, 162, 'uni002_Course020', 7, 56, 0, 28);
INSERT INTO `create_plan` VALUES (6751, 162, 'uni002_Course019', 7, 56, 0, 28);
INSERT INTO `create_plan` VALUES (6752, 162, 'uni002_Course018', 7, 84, 0, 28);
INSERT INTO `create_plan` VALUES (6753, 162, 'uni002_Course017', 7, 84, 0, 28);
INSERT INTO `create_plan` VALUES (6754, 162, 'uni002_uni002_uni002_Course130', 7, 56, 0, 28);
INSERT INTO `create_plan` VALUES (6755, 162, 'uni002_uni002_uni002_Course120', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6756, 162, 'uni002_Course035', 7, 56, 0, 28);
INSERT INTO `create_plan` VALUES (6757, 162, 'uni002_Course015', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6758, 162, 'uni002_Course014', 7, 56, 0, 28);
INSERT INTO `create_plan` VALUES (6759, 162, 'uni002_Course011', 7, 35, 0, 28);
INSERT INTO `create_plan` VALUES (6760, 162, 'uni002_Course010', 7, 70, 0, 28);
INSERT INTO `create_plan` VALUES (6761, 162, 'uni002_Course009', 7, 35, 0, 28);
INSERT INTO `create_plan` VALUES (6762, 162, 'uni002_Course008', 7, 35, 0, 28);
INSERT INTO `create_plan` VALUES (6763, 162, 'uni002_Course007', 7, 105, 0, 28);
INSERT INTO `create_plan` VALUES (6764, 162, 'uni002_Course006', 7, 105, 0, 28);
INSERT INTO `create_plan` VALUES (6765, 162, 'uni002_uni002_Course110', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6766, 162, 'uni002_Course005', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6767, 162, 'uni002_Course004', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6768, 162, 'uni002_Course003', 7, 25, 0, 28);
INSERT INTO `create_plan` VALUES (6769, 162, 'uni002_Course002', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6770, 162, 'uni002_Course001', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6771, 162, 'uni001_doc031', 7, 72, 0, 28);
INSERT INTO `create_plan` VALUES (6772, 162, 'uni001_Course13', 7, 60, 0, 28);
INSERT INTO `create_plan` VALUES (6773, 162, 'uni001_cours042', 7, 40, 0, 28);
INSERT INTO `create_plan` VALUES (6774, 162, 'uni001_cours106', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6775, 162, 'uni001_cours105', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6776, 162, 'uni001_cours104', 7, 8, 0, 28);
INSERT INTO `create_plan` VALUES (6777, 162, 'uni001_cours103', 7, 8, 0, 28);
INSERT INTO `create_plan` VALUES (6778, 162, 'uni001_cours102', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6779, 162, 'uni001_Course30', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6780, 162, 'uni001_Course21', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6781, 162, 'uni001_cours100', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6782, 162, 'uni001_cours099', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6783, 162, 'uni001_cours098', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6784, 162, 'uni001_Course19', 7, 27, 0, 28);
INSERT INTO `create_plan` VALUES (6785, 162, 'uni001_cours097', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6786, 162, 'uni001_cours096', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6787, 162, 'uni001_cours095', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6788, 162, 'uni001_cours094', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6789, 162, 'uni001_cours093', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6790, 162, 'uni001_cours092', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6791, 162, 'uni001_cours091', 7, 56, 0, 28);
INSERT INTO `create_plan` VALUES (6792, 162, 'uni001_cours090', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6793, 162, 'uni001_cours089', 7, 56, 0, 28);
INSERT INTO `create_plan` VALUES (6794, 162, 'uni001_cours088', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6795, 162, 'uni001_cours087', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6796, 162, 'uni001_cours086', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6797, 162, 'uni001_cours085', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6798, 162, 'uni001_cours084', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6799, 162, 'uni001_cours083', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6800, 162, 'uni001_cours082', 7, 40, 0, 28);
INSERT INTO `create_plan` VALUES (6801, 162, 'uni001_cours081', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6802, 162, 'uni001_cours080', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6803, 162, 'uni001_cours079', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6804, 162, 'uni001_cours078', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6805, 162, 'uni001_cours077', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6806, 162, 'uni001_Course56', 7, 64, 0, 28);
INSERT INTO `create_plan` VALUES (6807, 162, 'uni001_Course17', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6808, 162, 'uni001_Course15', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6809, 162, 'uni001_cours076', 7, 64, 0, 28);
INSERT INTO `create_plan` VALUES (6810, 162, 'uni001_cours075', 7, 64, 0, 28);
INSERT INTO `create_plan` VALUES (6811, 162, 'uni001_cours074', 7, 64, 0, 28);
INSERT INTO `create_plan` VALUES (6812, 162, 'uni001_cours073', 7, 64, 0, 28);
INSERT INTO `create_plan` VALUES (6813, 162, 'uni001_cours072', 7, 64, 0, 28);
INSERT INTO `create_plan` VALUES (6814, 162, 'uni001_cours071', 7, 64, 0, 28);
INSERT INTO `create_plan` VALUES (6815, 162, 'uni001_cours070', 7, 64, 0, 28);
INSERT INTO `create_plan` VALUES (6816, 162, 'uni001_cours069', 7, 64, 0, 28);
INSERT INTO `create_plan` VALUES (6817, 162, 'uni001_cours068', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6818, 162, 'uni001_cours067', 7, 64, 0, 28);
INSERT INTO `create_plan` VALUES (6819, 162, 'uni001_cours066', 7, 64, 0, 28);
INSERT INTO `create_plan` VALUES (6820, 162, 'uni001_cours064', 7, 64, 0, 28);
INSERT INTO `create_plan` VALUES (6821, 162, 'uni001_cours063', 7, 64, 0, 28);
INSERT INTO `create_plan` VALUES (6822, 162, 'uni001_Course14', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6823, 162, 'uni001_cours062', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6824, 162, 'uni001_cours061', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6825, 162, 'uni001_cours060', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6826, 162, 'uni001_cours058', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6827, 162, 'uni001_cours057', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6828, 162, 'uni001_cours056', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6829, 162, 'uni001_cours055', 7, 28, 0, 28);
INSERT INTO `create_plan` VALUES (6830, 162, 'uni001_cours054', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6831, 162, 'uni001_cours053', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6832, 162, 'uni001_cours052', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6833, 162, 'uni001_cours051', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6834, 162, 'uni001_cours050', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6835, 162, 'uni001_cours049', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6836, 162, 'uni001_cours048', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6837, 162, 'uni001_cours047', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6838, 162, 'uni001_cours046', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6839, 162, 'uni001_cours045', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6840, 162, 'uni001_cours044', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6841, 162, 'uni001_Course8', 7, 30, 0, 28);
INSERT INTO `create_plan` VALUES (6842, 162, 'uni001_Course12', 7, 60, 0, 28);
INSERT INTO `create_plan` VALUES (6843, 162, 'uni001_Course11', 7, 60, 0, 28);
INSERT INTO `create_plan` VALUES (6844, 162, 'uni001_cours041', 7, 60, 0, 28);
INSERT INTO `create_plan` VALUES (6845, 162, 'uni001_cours040', 7, 60, 0, 28);
INSERT INTO `create_plan` VALUES (6846, 162, 'uni001_cours039', 7, 60, 0, 28);
INSERT INTO `create_plan` VALUES (6847, 162, 'uni001_cours038', 7, 60, 0, 28);
INSERT INTO `create_plan` VALUES (6848, 162, 'uni001_cours037', 7, 60, 0, 28);
INSERT INTO `create_plan` VALUES (6849, 162, 'uni001_cours036', 7, 60, 0, 28);
INSERT INTO `create_plan` VALUES (6850, 162, 'uni001_cours035', 7, 60, 0, 28);
INSERT INTO `create_plan` VALUES (6851, 162, 'uni001_cours034', 7, 60, 0, 28);
INSERT INTO `create_plan` VALUES (6852, 162, 'uni001_cours033', 7, 60, 0, 28);
INSERT INTO `create_plan` VALUES (6853, 162, 'uni001_cours032', 7, 60, 0, 28);
INSERT INTO `create_plan` VALUES (6854, 162, 'uni001_Course9', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6855, 162, 'uni001_Course10', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6856, 162, 'uni001_cours031', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6857, 162, 'uni001_cours030', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6858, 162, 'uni001_cours029', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6859, 162, 'uni001_cours028', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6860, 162, 'uni001_cours026', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6861, 162, 'uni001_cours025', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6862, 162, 'uni001_cours024', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6863, 162, 'uni001_cours023', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6864, 162, 'uni001_cours022', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6865, 162, 'uni001_cours021', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6866, 162, 'uni001_cours020', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6867, 162, 'uni001_cours019', 7, 40, 0, 28);
INSERT INTO `create_plan` VALUES (6868, 162, 'uni001_cours018', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6869, 162, 'uni001_cours017', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6870, 162, 'uni001_cours016', 7, 48, 0, 28);
INSERT INTO `create_plan` VALUES (6871, 162, 'uni001_cours015', 7, 150, 0, 28);
INSERT INTO `create_plan` VALUES (6872, 162, 'uni001_cours014', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6873, 162, 'uni001_cours013', 7, 24, 0, 28);
INSERT INTO `create_plan` VALUES (6874, 162, 'uni001_cours012', 7, 32, 0, 28);
INSERT INTO `create_plan` VALUES (6875, 162, 'uni001_cours011', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6876, 162, 'uni001_cours010', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6877, 162, 'uni001_cours009', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6878, 162, 'uni001_cours008', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6879, 162, 'uni001_cours005', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6880, 162, 'uni001_cours004', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6881, 162, 'uni001_cours003', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6882, 162, 'uni001_cours002', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6883, 162, 'uni001_cours001', 7, 20, 0, 28);
INSERT INTO `create_plan` VALUES (6884, 162, 'uni004_fac037', 2, 35, 0, 10);
INSERT INTO `create_plan` VALUES (6885, 162, 'uni004_fac036', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (6886, 162, 'uni004_fac035', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (6887, 162, 'uni004_fac034', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (6888, 162, 'uni004_fac033', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (6889, 162, 'uni004_fac032', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (6890, 162, 'uni004_fac031', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (6891, 162, 'uni004_fac030', 2, 20, 0, 10);
INSERT INTO `create_plan` VALUES (6892, 162, 'uni004_fac029', 2, 20, 0, 10);
INSERT INTO `create_plan` VALUES (6893, 162, 'uni004_fac028', 2, 20, 0, 10);
INSERT INTO `create_plan` VALUES (6894, 162, 'uni004_fac027', 2, 20, 0, 10);
INSERT INTO `create_plan` VALUES (6895, 162, 'uni004_Course7', 2, 20, 0, 10);
INSERT INTO `create_plan` VALUES (6896, 162, 'uni004_fac026', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (6897, 162, 'uni004_fac025', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (6898, 162, 'uni004_fac024', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (6899, 162, 'uni004_fac023', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (6900, 162, 'uni004_fac022', 2, 56, 0, 10);
INSERT INTO `create_plan` VALUES (6901, 162, 'uni004_fac021', 2, 56, 0, 10);
INSERT INTO `create_plan` VALUES (6902, 162, 'uni004_fac020', 2, 56, 0, 10);
INSERT INTO `create_plan` VALUES (6903, 162, 'uni004_fac019', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (6904, 162, 'uni004_fac018', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (6905, 162, 'uni004_fac017', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (6906, 162, 'uni004_fac016', 2, 105, 0, 10);
INSERT INTO `create_plan` VALUES (6907, 162, 'uni004_fac015', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (6908, 162, 'uni004_fac014', 2, 45, 0, 10);
INSERT INTO `create_plan` VALUES (6909, 162, 'uni004_fac013', 2, 45, 0, 10);
INSERT INTO `create_plan` VALUES (6910, 162, 'uni004_fac012', 2, 45, 0, 10);
INSERT INTO `create_plan` VALUES (6911, 162, 'uni004_fac011', 2, 45, 0, 10);
INSERT INTO `create_plan` VALUES (6912, 162, 'uni004_fac010', 2, 45, 0, 10);
INSERT INTO `create_plan` VALUES (6913, 162, 'uni004_fac009', 2, 35, 0, 10);
INSERT INTO `create_plan` VALUES (6914, 162, 'uni004_fac008', 2, 35, 0, 10);
INSERT INTO `create_plan` VALUES (6915, 162, 'uni004_fac007', 2, 45, 0, 10);
INSERT INTO `create_plan` VALUES (6916, 162, 'uni004_fac006', 2, 27, 0, 10);
INSERT INTO `create_plan` VALUES (6917, 162, 'uni004_fac005', 2, 27, 0, 10);
INSERT INTO `create_plan` VALUES (6918, 162, 'uni004_fac004', 2, 27, 0, 10);
INSERT INTO `create_plan` VALUES (6919, 162, 'uni004_fac003', 2, 27, 0, 10);
INSERT INTO `create_plan` VALUES (6920, 162, 'uni004_fac002', 2, 27, 0, 10);
INSERT INTO `create_plan` VALUES (6921, 162, 'uni004_fac001', 2, 27, 0, 10);
INSERT INTO `create_plan` VALUES (6922, 162, 'uni003_Course6', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6923, 162, 'uni003_course032', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6924, 162, 'uni003_course031', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6925, 162, 'uni003_course030', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6926, 162, 'uni003_course029', 2, 40, 0, 10);
INSERT INTO `create_plan` VALUES (6927, 162, 'uni003_course028', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6928, 162, 'uni003_Course5', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6929, 162, 'uni003_Course4', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6930, 162, 'uni003_course026', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6931, 162, 'uni003_course024', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6932, 162, 'uni003_course023', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6933, 162, 'uni003_course022', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6934, 162, 'uni003_Course3', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6935, 162, 'uni003_course021', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6936, 162, 'uni003_course019', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6937, 162, 'uni003_uni002_uni002_Course160', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6938, 162, 'uni003_Course1', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6939, 162, 'uni003_course018', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6940, 162, 'uni003_course017', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6941, 162, 'uni003_course016', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6942, 162, 'uni003_course015', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6943, 162, 'uni003_course014', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6944, 162, 'uni003_course013', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6945, 162, 'uni003_uni002_uni002_Course150', 2, 40, 0, 10);
INSERT INTO `create_plan` VALUES (6946, 162, 'uni003_course012', 2, 40, 0, 10);
INSERT INTO `create_plan` VALUES (6947, 162, 'uni003_course011', 2, 40, 0, 10);
INSERT INTO `create_plan` VALUES (6948, 162, 'uni003_course010', 2, 40, 0, 10);
INSERT INTO `create_plan` VALUES (6949, 162, 'uni003_course009', 2, 40, 0, 10);
INSERT INTO `create_plan` VALUES (6950, 162, 'uni003_course008', 2, 40, 0, 10);
INSERT INTO `create_plan` VALUES (6951, 162, 'uni003_course007', 2, 40, 0, 10);
INSERT INTO `create_plan` VALUES (6952, 162, 'uni003_course006', 2, 40, 0, 10);
INSERT INTO `create_plan` VALUES (6953, 162, 'uni003_course005', 2, 40, 0, 10);
INSERT INTO `create_plan` VALUES (6954, 162, 'uni003_uni002_uni002_Course140', 2, 20, 0, 10);
INSERT INTO `create_plan` VALUES (6955, 162, 'uni003_Course104', 2, 20, 0, 10);
INSERT INTO `create_plan` VALUES (6956, 162, 'uni003_Course01', 2, 20, 0, 10);
INSERT INTO `create_plan` VALUES (6957, 162, 'uni003_course003', 2, 20, 0, 10);
INSERT INTO `create_plan` VALUES (6958, 162, 'uni003_course001', 2, 20, 0, 10);
INSERT INTO `create_plan` VALUES (6959, 162, 'uni002_Course026', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (6960, 162, 'uni002_Course025', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (6961, 162, 'uni002_Course023', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (6962, 162, 'uni002_Course022', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (6963, 162, 'uni002_Course021', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (6964, 162, 'uni002_Course020', 2, 56, 0, 10);
INSERT INTO `create_plan` VALUES (6965, 162, 'uni002_Course019', 2, 56, 0, 10);
INSERT INTO `create_plan` VALUES (6966, 162, 'uni002_Course018', 2, 84, 0, 10);
INSERT INTO `create_plan` VALUES (6967, 162, 'uni002_Course017', 2, 84, 0, 10);
INSERT INTO `create_plan` VALUES (6968, 162, 'uni002_Course011', 2, 35, 0, 10);
INSERT INTO `create_plan` VALUES (6969, 162, 'uni002_Course010', 2, 70, 0, 10);
INSERT INTO `create_plan` VALUES (6970, 162, 'uni002_Course009', 2, 35, 0, 10);
INSERT INTO `create_plan` VALUES (6971, 162, 'uni002_Course008', 2, 35, 0, 10);
INSERT INTO `create_plan` VALUES (6972, 162, 'uni002_Course007', 2, 105, 0, 10);
INSERT INTO `create_plan` VALUES (6973, 162, 'uni002_Course006', 2, 105, 0, 10);
INSERT INTO `create_plan` VALUES (6974, 162, 'uni002_uni002_Course110', 2, 20, 0, 10);
INSERT INTO `create_plan` VALUES (6975, 162, 'uni002_Course005', 2, 20, 0, 10);
INSERT INTO `create_plan` VALUES (6976, 162, 'uni002_Course004', 2, 20, 0, 10);
INSERT INTO `create_plan` VALUES (6977, 162, 'uni002_Course003', 2, 25, 0, 10);
INSERT INTO `create_plan` VALUES (6978, 162, 'uni002_Course002', 2, 20, 0, 10);
INSERT INTO `create_plan` VALUES (6979, 162, 'uni002_Course001', 2, 20, 0, 10);
INSERT INTO `create_plan` VALUES (6980, 162, 'uni001_doc031', 2, 72, 0, 10);
INSERT INTO `create_plan` VALUES (6981, 162, 'uni001_Course13', 2, 60, 0, 10);
INSERT INTO `create_plan` VALUES (6982, 162, 'uni001_cours042', 2, 40, 0, 10);
INSERT INTO `create_plan` VALUES (6983, 162, 'uni001_cours106', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (6984, 162, 'uni001_cours105', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (6985, 162, 'uni001_cours104', 2, 8, 0, 10);
INSERT INTO `create_plan` VALUES (6986, 162, 'uni001_cours103', 2, 8, 0, 10);
INSERT INTO `create_plan` VALUES (6987, 162, 'uni001_cours102', 2, 48, 0, 10);
INSERT INTO `create_plan` VALUES (6988, 162, 'uni001_Course30', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (6989, 162, 'uni001_Course21', 2, 48, 0, 10);
INSERT INTO `create_plan` VALUES (6990, 162, 'uni001_cours100', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (6991, 162, 'uni001_cours099', 2, 48, 0, 10);
INSERT INTO `create_plan` VALUES (6992, 162, 'uni001_cours098', 2, 48, 0, 10);
INSERT INTO `create_plan` VALUES (6993, 162, 'uni001_Course19', 2, 27, 0, 10);
INSERT INTO `create_plan` VALUES (6994, 162, 'uni001_cours097', 2, 48, 0, 10);
INSERT INTO `create_plan` VALUES (6995, 162, 'uni001_cours096', 2, 48, 0, 10);
INSERT INTO `create_plan` VALUES (6996, 162, 'uni001_cours095', 2, 48, 0, 10);
INSERT INTO `create_plan` VALUES (6997, 162, 'uni001_cours094', 2, 48, 0, 10);
INSERT INTO `create_plan` VALUES (6998, 162, 'uni001_cours093', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (6999, 162, 'uni001_cours092', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7000, 162, 'uni001_cours091', 2, 56, 0, 10);
INSERT INTO `create_plan` VALUES (7001, 162, 'uni001_cours090', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7002, 162, 'uni001_cours089', 2, 56, 0, 10);
INSERT INTO `create_plan` VALUES (7003, 162, 'uni001_cours088', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7004, 162, 'uni001_cours087', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7005, 162, 'uni001_cours086', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7006, 162, 'uni001_cours085', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7007, 162, 'uni001_cours084', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7008, 162, 'uni001_cours083', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7009, 162, 'uni001_cours082', 2, 40, 0, 10);
INSERT INTO `create_plan` VALUES (7010, 162, 'uni001_cours081', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7011, 162, 'uni001_cours080', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7012, 162, 'uni001_cours079', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (7013, 162, 'uni001_cours078', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7014, 162, 'uni001_cours077', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7015, 162, 'uni001_Course17', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7016, 162, 'uni001_Course15', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7017, 162, 'uni001_cours076', 2, 64, 0, 10);
INSERT INTO `create_plan` VALUES (7018, 162, 'uni001_cours075', 2, 64, 0, 10);
INSERT INTO `create_plan` VALUES (7019, 162, 'uni001_cours074', 2, 64, 0, 10);
INSERT INTO `create_plan` VALUES (7020, 162, 'uni001_cours073', 2, 64, 0, 10);
INSERT INTO `create_plan` VALUES (7021, 162, 'uni001_cours072', 2, 64, 0, 10);
INSERT INTO `create_plan` VALUES (7022, 162, 'uni001_cours071', 2, 64, 0, 10);
INSERT INTO `create_plan` VALUES (7023, 162, 'uni001_cours070', 2, 64, 0, 10);
INSERT INTO `create_plan` VALUES (7024, 162, 'uni001_cours069', 2, 64, 0, 10);
INSERT INTO `create_plan` VALUES (7025, 162, 'uni001_cours068', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7026, 162, 'uni001_cours067', 2, 64, 0, 10);
INSERT INTO `create_plan` VALUES (7027, 162, 'uni001_cours066', 2, 64, 0, 10);
INSERT INTO `create_plan` VALUES (7028, 162, 'uni001_cours064', 2, 64, 0, 10);
INSERT INTO `create_plan` VALUES (7029, 162, 'uni001_cours063', 2, 64, 0, 10);
INSERT INTO `create_plan` VALUES (7030, 162, 'uni001_Course14', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (7031, 162, 'uni001_cours062', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (7032, 162, 'uni001_cours061', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (7033, 162, 'uni001_cours060', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (7034, 162, 'uni001_cours058', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (7035, 162, 'uni001_cours057', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (7036, 162, 'uni001_cours056', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7037, 162, 'uni001_cours055', 2, 28, 0, 10);
INSERT INTO `create_plan` VALUES (7038, 162, 'uni001_cours054', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (7039, 162, 'uni001_cours053', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (7040, 162, 'uni001_cours052', 2, 24, 0, 10);
INSERT INTO `create_plan` VALUES (7041, 162, 'uni001_cours051', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7042, 162, 'uni001_cours050', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7043, 162, 'uni001_cours049', 2, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7044, 162, 'uni001_cours048', 2, 48, 0, 10);
INSERT INTO `create_plan` VALUES (7045, 162, 'uni001_cours047', 2, 48, 0, 10);
INSERT INTO `create_plan` VALUES (7046, 162, 'uni001_cours046', 2, 48, 0, 10);
INSERT INTO `create_plan` VALUES (7047, 162, 'uni001_cours045', 2, 48, 0, 10);
INSERT INTO `create_plan` VALUES (7048, 162, 'uni001_cours044', 2, 48, 0, 10);
INSERT INTO `create_plan` VALUES (7049, 162, 'uni001_Course8', 2, 30, 0, 10);
INSERT INTO `create_plan` VALUES (7050, 162, 'uni001_Course12', 2, 60, 0, 10);
INSERT INTO `create_plan` VALUES (7051, 162, 'uni001_Course11', 2, 60, 0, 10);
INSERT INTO `create_plan` VALUES (7052, 162, 'uni001_cours041', 2, 60, 0, 10);
INSERT INTO `create_plan` VALUES (7053, 162, 'uni001_cours040', 2, 60, 0, 10);
INSERT INTO `create_plan` VALUES (7054, 162, 'uni001_cours039', 2, 60, 0, 10);
INSERT INTO `create_plan` VALUES (7055, 162, 'uni001_cours038', 2, 60, 0, 10);
INSERT INTO `create_plan` VALUES (7056, 162, 'uni001_cours037', 2, 60, 0, 10);
INSERT INTO `create_plan` VALUES (7057, 162, 'uni001_cours036', 2, 60, 0, 10);
INSERT INTO `create_plan` VALUES (7058, 162, 'uni001_cours035', 2, 60, 0, 10);
INSERT INTO `create_plan` VALUES (7059, 162, 'uni001_cours034', 2, 60, 0, 10);
INSERT INTO `create_plan` VALUES (7060, 162, 'uni001_cours033', 20, 60, 0, 10);
INSERT INTO `create_plan` VALUES (7061, 162, 'uni001_cours032', 20, 60, 0, 10);
INSERT INTO `create_plan` VALUES (7062, 162, 'uni001_Course9', 20, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7063, 162, 'uni001_Course10', 20, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7064, 162, 'uni001_cours031', 20, 48, 0, 10);
INSERT INTO `create_plan` VALUES (7065, 162, 'uni001_cours030', 20, 48, 0, 10);
INSERT INTO `create_plan` VALUES (7066, 162, 'uni001_cours029', 20, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7067, 162, 'uni001_cours028', 20, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7068, 162, 'uni001_cours026', 20, 48, 0, 10);
INSERT INTO `create_plan` VALUES (7069, 162, 'uni001_cours025', 20, 48, 0, 10);
INSERT INTO `create_plan` VALUES (7070, 162, 'uni001_cours024', 20, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7071, 162, 'uni001_cours023', 20, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7072, 162, 'uni001_cours022', 20, 24, 0, 10);
INSERT INTO `create_plan` VALUES (7073, 162, 'uni001_cours021', 20, 24, 0, 10);
INSERT INTO `create_plan` VALUES (7074, 162, 'uni001_cours020', 20, 24, 0, 10);
INSERT INTO `create_plan` VALUES (7075, 162, 'uni001_cours019', 20, 40, 0, 10);
INSERT INTO `create_plan` VALUES (7076, 162, 'uni001_cours018', 20, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7077, 162, 'uni001_cours017', 20, 48, 0, 10);
INSERT INTO `create_plan` VALUES (7078, 162, 'uni001_cours016', 20, 48, 0, 10);
INSERT INTO `create_plan` VALUES (7079, 162, 'uni001_cours015', 20, 150, 0, 10);
INSERT INTO `create_plan` VALUES (7080, 162, 'uni001_cours014', 20, 24, 0, 10);
INSERT INTO `create_plan` VALUES (7081, 162, 'uni001_cours013', 20, 24, 0, 10);
INSERT INTO `create_plan` VALUES (7082, 162, 'uni001_cours012', 20, 32, 0, 10);
INSERT INTO `create_plan` VALUES (7083, 162, 'uni001_cours011', 20, 20, 0, 10);
INSERT INTO `create_plan` VALUES (7084, 162, 'uni001_cours010', 20, 20, 0, 10);
INSERT INTO `create_plan` VALUES (7085, 162, 'uni001_cours009', 20, 20, 0, 10);
INSERT INTO `create_plan` VALUES (7086, 162, 'uni001_cours008', 20, 20, 0, 10);
INSERT INTO `create_plan` VALUES (7087, 162, 'uni001_cours005', 20, 20, 0, 10);
INSERT INTO `create_plan` VALUES (7088, 162, 'uni001_cours004', 20, 20, 0, 10);
INSERT INTO `create_plan` VALUES (7089, 162, 'uni001_cours003', 20, 20, 0, 10);
INSERT INTO `create_plan` VALUES (7090, 162, 'uni001_cours002', 20, 20, 0, 10);
INSERT INTO `create_plan` VALUES (7091, 162, 'uni001_cours001', 20, 20, 0, 10);
INSERT INTO `create_plan` VALUES (7092, 162, 'uni003_Course6', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7093, 162, 'uni003_course032', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7094, 162, 'uni003_course031', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7095, 162, 'uni003_course030', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7096, 162, 'uni003_course029', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7097, 162, 'uni003_course028', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7098, 162, 'uni003_Course5', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7099, 162, 'uni003_Course4', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7100, 162, 'uni003_course026', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7101, 162, 'uni003_course024', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7102, 162, 'uni003_course023', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7103, 162, 'uni003_course022', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7104, 162, 'uni003_Course3', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7105, 162, 'uni003_course021', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7106, 162, 'uni003_course019', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7107, 162, 'uni003_uni002_uni002_Course160', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7108, 162, 'uni003_Course1', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7109, 162, 'uni003_course018', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7110, 162, 'uni003_course017', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7111, 162, 'uni003_course016', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7112, 162, 'uni003_course015', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7113, 162, 'uni003_course014', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7114, 162, 'uni003_course013', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7115, 162, 'uni003_uni002_uni002_Course150', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7116, 162, 'uni003_course012', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7117, 162, 'uni003_course011', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7118, 162, 'uni003_course010', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7119, 162, 'uni003_course009', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7120, 162, 'uni003_course008', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7121, 162, 'uni003_course007', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7122, 162, 'uni003_course006', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7123, 162, 'uni003_course005', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7124, 162, 'uni003_uni002_uni002_Course140', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7125, 162, 'uni003_Course104', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7126, 162, 'uni003_Course01', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7127, 162, 'uni003_course003', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7128, 162, 'uni003_course001', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7129, 162, 'uni004_fac037', 8, 35, 0, 29);
INSERT INTO `create_plan` VALUES (7130, 162, 'uni004_fac036', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7131, 162, 'uni004_fac035', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7132, 162, 'uni004_fac034', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7133, 162, 'uni004_fac033', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7134, 162, 'uni004_fac032', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7135, 162, 'uni004_fac031', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7136, 162, 'uni004_fac030', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7137, 162, 'uni004_fac029', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7138, 162, 'uni004_fac028', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7139, 162, 'uni004_fac027', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7140, 162, 'uni004_Course7', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7141, 162, 'uni004_fac026', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7142, 162, 'uni004_fac025', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7143, 162, 'uni004_fac024', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7144, 162, 'uni004_fac023', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7145, 162, 'uni004_fac022', 8, 56, 0, 29);
INSERT INTO `create_plan` VALUES (7146, 162, 'uni004_fac021', 8, 56, 0, 29);
INSERT INTO `create_plan` VALUES (7147, 162, 'uni004_fac020', 8, 56, 0, 29);
INSERT INTO `create_plan` VALUES (7148, 162, 'uni004_fac019', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7149, 162, 'uni004_fac018', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7150, 162, 'uni004_fac017', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7151, 162, 'uni004_fac016', 8, 105, 0, 29);
INSERT INTO `create_plan` VALUES (7152, 162, 'uni004_fac015', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7153, 162, 'uni004_fac038', 8, 45, 0, 29);
INSERT INTO `create_plan` VALUES (7154, 162, 'uni004_fac014', 8, 45, 0, 29);
INSERT INTO `create_plan` VALUES (7155, 162, 'uni004_fac012', 8, 45, 0, 29);
INSERT INTO `create_plan` VALUES (7156, 162, 'uni004_fac011', 8, 45, 0, 29);
INSERT INTO `create_plan` VALUES (7157, 162, 'uni004_fac010', 8, 45, 0, 29);
INSERT INTO `create_plan` VALUES (7158, 162, 'uni004_fac009', 8, 35, 0, 29);
INSERT INTO `create_plan` VALUES (7159, 162, 'uni004_fac008', 8, 35, 0, 29);
INSERT INTO `create_plan` VALUES (7160, 162, 'uni004_fac007', 8, 45, 0, 29);
INSERT INTO `create_plan` VALUES (7161, 162, 'uni004_fac006', 8, 27, 0, 29);
INSERT INTO `create_plan` VALUES (7162, 162, 'uni004_fac005', 8, 27, 0, 29);
INSERT INTO `create_plan` VALUES (7163, 162, 'uni004_fac004', 8, 27, 0, 29);
INSERT INTO `create_plan` VALUES (7164, 162, 'uni004_fac003', 8, 27, 0, 29);
INSERT INTO `create_plan` VALUES (7165, 162, 'uni004_fac002', 8, 27, 0, 29);
INSERT INTO `create_plan` VALUES (7166, 162, 'uni004_fac001', 8, 27, 0, 29);
INSERT INTO `create_plan` VALUES (7167, 162, 'uni003_Course6', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7168, 162, 'uni003_course032', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7169, 162, 'uni003_course031', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7170, 162, 'uni003_course030', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7171, 162, 'uni003_course029', 8, 40, 0, 29);
INSERT INTO `create_plan` VALUES (7172, 162, 'uni003_course028', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7173, 162, 'uni003_Course5', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7174, 162, 'uni003_course026', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7175, 162, 'uni003_course025', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7176, 162, 'uni003_course024', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7177, 162, 'uni003_course023', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7178, 162, 'uni003_course022', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7179, 162, 'uni003_Course97', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7180, 162, 'uni003_Course3', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7181, 162, 'uni003_course021', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7182, 162, 'uni003_course019', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7183, 162, 'uni003_uni002_uni002_Course160', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7184, 162, 'uni003_Course1', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7185, 162, 'uni003_course018', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7186, 162, 'uni003_course017', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7187, 162, 'uni003_course016', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7188, 162, 'uni003_course015', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7189, 162, 'uni003_course014', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7190, 162, 'uni003_course013', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7191, 162, 'uni003_uni002_uni002_Course150', 8, 40, 0, 29);
INSERT INTO `create_plan` VALUES (7192, 162, 'uni003_Course91', 8, 40, 0, 29);
INSERT INTO `create_plan` VALUES (7193, 162, 'uni003_course012', 8, 40, 0, 29);
INSERT INTO `create_plan` VALUES (7194, 162, 'uni003_course010', 8, 40, 0, 29);
INSERT INTO `create_plan` VALUES (7195, 162, 'uni003_course009', 8, 40, 0, 29);
INSERT INTO `create_plan` VALUES (7196, 162, 'uni003_course008', 8, 40, 0, 29);
INSERT INTO `create_plan` VALUES (7197, 162, 'uni003_course007', 8, 40, 0, 29);
INSERT INTO `create_plan` VALUES (7198, 162, 'uni003_course006', 8, 40, 0, 29);
INSERT INTO `create_plan` VALUES (7199, 162, 'uni003_course005', 8, 40, 0, 29);
INSERT INTO `create_plan` VALUES (7200, 162, 'uni003_uni002_uni002_Course140', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7201, 162, 'uni003_Course104', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7202, 162, 'uni003_Course01', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7203, 162, 'uni003_course003', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7204, 162, 'uni003_course001', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7205, 162, 'uni002_Course026', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7206, 162, 'uni002_Course025', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7207, 162, 'uni002_Course023', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7208, 162, 'uni002_Course022', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7209, 162, 'uni002_Course021', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7210, 162, 'uni002_Course020', 8, 56, 0, 29);
INSERT INTO `create_plan` VALUES (7211, 162, 'uni002_Course019', 8, 56, 0, 29);
INSERT INTO `create_plan` VALUES (7212, 162, 'uni002_Course018', 8, 84, 0, 29);
INSERT INTO `create_plan` VALUES (7213, 162, 'uni002_Course017', 8, 84, 0, 29);
INSERT INTO `create_plan` VALUES (7214, 162, 'uni002_uni002_uni002_Course130', 8, 56, 0, 29);
INSERT INTO `create_plan` VALUES (7215, 162, 'uni002_uni002_uni002_Course120', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7216, 162, 'uni002_Course035', 8, 56, 0, 29);
INSERT INTO `create_plan` VALUES (7217, 162, 'uni002_Course015', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7218, 162, 'uni002_Course014', 8, 56, 0, 29);
INSERT INTO `create_plan` VALUES (7219, 162, 'uni002_Course011', 8, 35, 0, 29);
INSERT INTO `create_plan` VALUES (7220, 162, 'uni002_Course010', 8, 70, 0, 29);
INSERT INTO `create_plan` VALUES (7221, 162, 'uni002_Course009', 8, 35, 0, 29);
INSERT INTO `create_plan` VALUES (7222, 162, 'uni002_Course008', 8, 35, 0, 29);
INSERT INTO `create_plan` VALUES (7223, 162, 'uni002_Course007', 8, 105, 0, 29);
INSERT INTO `create_plan` VALUES (7224, 162, 'uni002_Course006', 8, 105, 0, 29);
INSERT INTO `create_plan` VALUES (7225, 162, 'uni002_uni002_Course110', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7226, 162, 'uni002_Course005', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7227, 162, 'uni002_Course004', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7228, 162, 'uni002_Course003', 8, 25, 0, 29);
INSERT INTO `create_plan` VALUES (7229, 162, 'uni002_Course002', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7230, 162, 'uni002_Course001', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7231, 162, 'uni001_doc031', 8, 72, 0, 29);
INSERT INTO `create_plan` VALUES (7232, 162, 'uni001_Course13', 8, 60, 0, 29);
INSERT INTO `create_plan` VALUES (7233, 162, 'uni001_cours042', 8, 40, 0, 29);
INSERT INTO `create_plan` VALUES (7234, 162, 'uni001_cours106', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7235, 162, 'uni001_cours105', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7236, 162, 'uni001_cours104', 8, 8, 0, 29);
INSERT INTO `create_plan` VALUES (7237, 162, 'uni001_cours103', 8, 8, 0, 29);
INSERT INTO `create_plan` VALUES (7238, 162, 'uni001_cours102', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7239, 162, 'uni001_Course30', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7240, 162, 'uni001_Course21', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7241, 162, 'uni001_cours100', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7242, 162, 'uni001_cours099', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7243, 162, 'uni001_cours098', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7244, 162, 'uni001_Course19', 8, 27, 0, 29);
INSERT INTO `create_plan` VALUES (7245, 162, 'uni001_cours097', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7246, 162, 'uni001_cours096', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7247, 162, 'uni001_cours095', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7248, 162, 'uni001_cours094', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7249, 162, 'uni001_cours093', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7250, 162, 'uni001_cours092', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7251, 162, 'uni001_cours091', 8, 56, 0, 29);
INSERT INTO `create_plan` VALUES (7252, 162, 'uni001_cours090', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7253, 162, 'uni001_cours089', 8, 56, 0, 29);
INSERT INTO `create_plan` VALUES (7254, 162, 'uni001_cours088', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7255, 162, 'uni001_cours087', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7256, 162, 'uni001_cours086', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7257, 162, 'uni001_cours085', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7258, 162, 'uni001_cours084', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7259, 162, 'uni001_cours083', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7260, 162, 'uni001_cours082', 8, 40, 0, 29);
INSERT INTO `create_plan` VALUES (7261, 162, 'uni001_cours081', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7262, 162, 'uni001_cours080', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7263, 162, 'uni001_cours079', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7264, 162, 'uni001_cours078', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7265, 162, 'uni001_cours077', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7266, 162, 'uni001_Course56', 8, 64, 0, 29);
INSERT INTO `create_plan` VALUES (7267, 162, 'uni001_Course17', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7268, 162, 'uni001_Course15', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7270, 162, 'uni001_cours076', 8, 64, 0, 29);
INSERT INTO `create_plan` VALUES (7271, 162, 'uni001_cours074', 8, 64, 0, 29);
INSERT INTO `create_plan` VALUES (7272, 162, 'uni001_cours073', 8, 64, 0, 29);
INSERT INTO `create_plan` VALUES (7273, 162, 'uni001_cours072', 8, 64, 0, 29);
INSERT INTO `create_plan` VALUES (7274, 162, 'uni001_cours071', 8, 64, 0, 29);
INSERT INTO `create_plan` VALUES (7275, 162, 'uni001_cours070', 8, 64, 0, 29);
INSERT INTO `create_plan` VALUES (7276, 162, 'uni001_cours069', 8, 64, 0, 29);
INSERT INTO `create_plan` VALUES (7277, 162, 'uni001_cours068', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7278, 162, 'uni001_cours067', 8, 64, 0, 29);
INSERT INTO `create_plan` VALUES (7279, 162, 'uni001_cours066', 8, 64, 0, 29);
INSERT INTO `create_plan` VALUES (7280, 162, 'uni001_cours064', 8, 64, 0, 29);
INSERT INTO `create_plan` VALUES (7281, 162, 'uni001_cours063', 8, 64, 0, 29);
INSERT INTO `create_plan` VALUES (7282, 162, 'uni001_Course14', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7283, 162, 'uni001_cours062', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7284, 162, 'uni001_cours061', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7285, 162, 'uni001_cours060', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7286, 162, 'uni001_cours058', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7287, 162, 'uni001_cours057', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7288, 162, 'uni001_cours056', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7289, 162, 'uni001_cours055', 8, 28, 0, 29);
INSERT INTO `create_plan` VALUES (7290, 162, 'uni001_cours054', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7291, 162, 'uni001_cours053', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7292, 162, 'uni001_cours052', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7293, 162, 'uni001_cours051', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7294, 162, 'uni001_cours050', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7295, 162, 'uni001_cours049', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7296, 162, 'uni001_cours048', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7297, 162, 'uni001_cours047', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7298, 162, 'uni001_cours046', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7299, 162, 'uni001_cours045', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7300, 162, 'uni001_cours044', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7301, 162, 'uni001_Course8', 8, 30, 0, 29);
INSERT INTO `create_plan` VALUES (7302, 162, 'uni001_Course12', 8, 60, 0, 29);
INSERT INTO `create_plan` VALUES (7303, 162, 'uni001_Course11', 8, 60, 0, 29);
INSERT INTO `create_plan` VALUES (7304, 162, 'uni001_cours041', 8, 60, 0, 29);
INSERT INTO `create_plan` VALUES (7305, 162, 'uni001_cours040', 8, 60, 0, 29);
INSERT INTO `create_plan` VALUES (7306, 162, 'uni001_cours039', 8, 60, 0, 29);
INSERT INTO `create_plan` VALUES (7307, 162, 'uni001_cours038', 8, 60, 0, 29);
INSERT INTO `create_plan` VALUES (7308, 162, 'uni001_cours037', 8, 60, 0, 29);
INSERT INTO `create_plan` VALUES (7309, 162, 'uni001_cours036', 8, 60, 0, 29);
INSERT INTO `create_plan` VALUES (7310, 162, 'uni001_cours035', 8, 60, 0, 29);
INSERT INTO `create_plan` VALUES (7311, 162, 'uni001_cours034', 8, 60, 0, 29);
INSERT INTO `create_plan` VALUES (7312, 162, 'uni001_cours033', 8, 60, 0, 29);
INSERT INTO `create_plan` VALUES (7313, 162, 'uni001_cours032', 8, 60, 0, 29);
INSERT INTO `create_plan` VALUES (7314, 162, 'uni001_Course9', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7315, 162, 'uni001_Course10', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7316, 162, 'uni001_cours031', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7317, 162, 'uni001_cours030', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7318, 162, 'uni001_cours029', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7319, 162, 'uni001_cours028', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7320, 162, 'uni001_cours026', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7321, 162, 'uni001_cours025', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7322, 162, 'uni001_cours024', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7323, 162, 'uni001_cours023', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7324, 162, 'uni001_cours022', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7325, 162, 'uni001_cours021', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7326, 162, 'uni001_cours020', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7327, 162, 'uni001_cours019', 8, 40, 0, 29);
INSERT INTO `create_plan` VALUES (7328, 162, 'uni001_cours018', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7329, 162, 'uni001_cours017', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7330, 162, 'uni001_cours016', 8, 48, 0, 29);
INSERT INTO `create_plan` VALUES (7331, 162, 'uni001_cours015', 8, 150, 0, 29);
INSERT INTO `create_plan` VALUES (7332, 162, 'uni001_cours014', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7333, 162, 'uni001_cours013', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (7334, 162, 'uni001_cours012', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (7335, 162, 'uni001_cours011', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7336, 162, 'uni001_cours010', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7337, 162, 'uni001_cours009', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7338, 162, 'uni001_cours008', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7339, 162, 'uni001_cours005', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7340, 162, 'uni001_cours004', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7341, 162, 'uni001_cours003', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7342, 162, 'uni001_cours002', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7343, 162, 'uni001_cours001', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (7344, 162, 'uni076_CS004', 18, 80, 0, 41);
INSERT INTO `create_plan` VALUES (7345, 162, 'uni076_CS003', 18, 70, 0, 41);
INSERT INTO `create_plan` VALUES (7346, 162, 'uni076_CS001', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7347, 162, 'uni075_CS040', 18, 25, 0, 41);
INSERT INTO `create_plan` VALUES (7348, 162, 'uni075_CS039', 18, 18, 0, 41);
INSERT INTO `create_plan` VALUES (7349, 162, 'uni075_CS038', 18, 50, 0, 41);
INSERT INTO `create_plan` VALUES (7350, 162, 'uni075_CS037', 18, 60, 0, 41);
INSERT INTO `create_plan` VALUES (7351, 162, 'uni075_CS036', 18, 50, 0, 41);
INSERT INTO `create_plan` VALUES (7352, 162, 'uni075_CS035', 18, 30, 0, 41);
INSERT INTO `create_plan` VALUES (7353, 162, 'uni075_CS034', 18, 31, 0, 41);
INSERT INTO `create_plan` VALUES (7354, 162, 'uni075_CS033', 18, 31, 0, 41);
INSERT INTO `create_plan` VALUES (7355, 162, 'uni075_CS032', 18, 90, 0, 41);
INSERT INTO `create_plan` VALUES (7356, 162, 'uni075_CS031', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7357, 162, 'uni075_CS030', 18, 65, 0, 41);
INSERT INTO `create_plan` VALUES (7358, 162, 'uni075_CS029', 18, 76, 0, 41);
INSERT INTO `create_plan` VALUES (7359, 162, 'uni075_CS028', 18, 45, 0, 41);
INSERT INTO `create_plan` VALUES (7360, 162, 'uni075_CS027', 18, 39, 0, 41);
INSERT INTO `create_plan` VALUES (7361, 162, 'uni075_CS026', 18, 69, 0, 41);
INSERT INTO `create_plan` VALUES (7362, 162, 'uni075_CS025', 18, 43, 0, 41);
INSERT INTO `create_plan` VALUES (7363, 162, 'uni075_CS024', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7364, 162, 'uni075_CS023', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7365, 162, 'uni075_CS021', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7366, 162, 'uni075_CS020', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7367, 162, 'uni075_CS019', 18, 50, 0, 41);
INSERT INTO `create_plan` VALUES (7368, 162, 'uni075_CS018', 18, 44, 0, 41);
INSERT INTO `create_plan` VALUES (7369, 162, 'uni075_CS017', 18, 58, 0, 41);
INSERT INTO `create_plan` VALUES (7370, 162, 'uni075_CS016', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7371, 162, 'uni075_CS015', 18, 49, 0, 41);
INSERT INTO `create_plan` VALUES (7372, 162, 'uni075_CS013', 18, 29, 0, 41);
INSERT INTO `create_plan` VALUES (7373, 162, 'uni075_CS011', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7374, 162, 'uni075_CS010', 18, 38, 0, 41);
INSERT INTO `create_plan` VALUES (7375, 162, 'uni075_CS009', 18, 39, 0, 41);
INSERT INTO `create_plan` VALUES (7376, 162, 'uni075_CS042', 18, 120, 0, 41);
INSERT INTO `create_plan` VALUES (7377, 162, 'uni075_CS008', 18, 60, 0, 41);
INSERT INTO `create_plan` VALUES (7378, 162, 'uni074_cs064', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7379, 162, 'uni074_CS063', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7380, 162, 'uni074_CS062', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7381, 162, 'uni074_CS061', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7382, 162, 'uni074_CS060', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7383, 162, 'uni074_CS059', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7384, 162, 'uni074_CS058', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7385, 162, 'uni074_CS057', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7386, 162, 'uni074_CS056', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7387, 162, 'uni074_CS055', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7388, 162, 'uni073_CS053', 18, 30, 0, 41);
INSERT INTO `create_plan` VALUES (7389, 162, 'uni073_CS052', 18, 30, 0, 41);
INSERT INTO `create_plan` VALUES (7390, 162, 'uni073_CS051', 18, 30, 0, 41);
INSERT INTO `create_plan` VALUES (7391, 162, 'uni073_CS050', 18, 35, 0, 41);
INSERT INTO `create_plan` VALUES (7392, 162, 'uni073_CS049', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7393, 162, 'uni073_CS048', 18, 70, 0, 41);
INSERT INTO `create_plan` VALUES (7394, 162, 'uni073_CS047', 18, 70, 0, 41);
INSERT INTO `create_plan` VALUES (7395, 162, 'uni073_CS046', 18, 35, 0, 41);
INSERT INTO `create_plan` VALUES (7396, 162, 'uni073_CS045', 18, 70, 0, 41);
INSERT INTO `create_plan` VALUES (7397, 162, 'uni073_CS044', 18, 70, 0, 41);
INSERT INTO `create_plan` VALUES (7398, 162, 'uni072_CS003', 18, 35, 0, 41);
INSERT INTO `create_plan` VALUES (7399, 162, 'uni072_CS002', 18, 35, 0, 41);
INSERT INTO `create_plan` VALUES (7400, 162, 'uni072_CS001', 18, 35, 0, 41);
INSERT INTO `create_plan` VALUES (7401, 162, 'uni004_fac037', 18, 35, 0, 41);
INSERT INTO `create_plan` VALUES (7402, 162, 'uni004_fac036', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7403, 162, 'uni004_fac035', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7404, 162, 'uni004_fac034', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7405, 162, 'uni004_fac033', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7406, 162, 'uni004_fac032', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7407, 162, 'uni004_fac031', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7408, 162, 'uni004_fac030', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7409, 162, 'uni004_fac029', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7410, 162, 'uni004_fac028', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7411, 162, 'uni004_fac027', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7412, 162, 'uni004_Course7', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7413, 162, 'uni004_fac026', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7414, 162, 'uni004_fac025', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7415, 162, 'uni004_fac024', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7416, 162, 'uni004_fac023', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7417, 162, 'uni004_fac022', 18, 56, 0, 41);
INSERT INTO `create_plan` VALUES (7418, 162, 'uni004_fac021', 18, 56, 0, 41);
INSERT INTO `create_plan` VALUES (7419, 162, 'uni004_fac020', 18, 56, 0, 41);
INSERT INTO `create_plan` VALUES (7420, 162, 'uni004_fac019', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7421, 162, 'uni004_fac018', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7422, 162, 'uni004_fac017', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7423, 162, 'uni004_fac016', 18, 105, 0, 41);
INSERT INTO `create_plan` VALUES (7424, 162, 'uni004_fac015', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7425, 162, 'uni004_fac014', 18, 45, 0, 41);
INSERT INTO `create_plan` VALUES (7426, 162, 'uni004_fac013', 18, 45, 0, 41);
INSERT INTO `create_plan` VALUES (7427, 162, 'uni004_fac012', 18, 45, 0, 41);
INSERT INTO `create_plan` VALUES (7428, 162, 'uni004_fac011', 18, 45, 0, 41);
INSERT INTO `create_plan` VALUES (7429, 162, 'uni004_fac010', 18, 45, 0, 41);
INSERT INTO `create_plan` VALUES (7430, 162, 'uni004_fac009', 18, 35, 0, 41);
INSERT INTO `create_plan` VALUES (7431, 162, 'uni004_fac008', 18, 35, 0, 41);
INSERT INTO `create_plan` VALUES (7432, 162, 'uni004_fac007', 18, 45, 0, 41);
INSERT INTO `create_plan` VALUES (7433, 162, 'uni004_fac006', 18, 27, 0, 41);
INSERT INTO `create_plan` VALUES (7434, 162, 'uni004_fac005', 18, 27, 0, 41);
INSERT INTO `create_plan` VALUES (7435, 162, 'uni004_fac004', 18, 27, 0, 41);
INSERT INTO `create_plan` VALUES (7436, 162, 'uni004_fac003', 18, 27, 0, 41);
INSERT INTO `create_plan` VALUES (7437, 162, 'uni004_fac002', 18, 27, 0, 41);
INSERT INTO `create_plan` VALUES (7438, 162, 'uni004_fac001', 18, 27, 0, 41);
INSERT INTO `create_plan` VALUES (7439, 162, 'uni002_Course026', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7440, 162, 'uni002_Course025', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7441, 162, 'uni002_Course023', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7442, 162, 'uni002_Course022', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7443, 162, 'uni002_Course021', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7444, 162, 'uni002_Course020', 18, 56, 0, 41);
INSERT INTO `create_plan` VALUES (7445, 162, 'uni002_Course019', 18, 56, 0, 41);
INSERT INTO `create_plan` VALUES (7446, 162, 'uni002_Course018', 18, 84, 0, 41);
INSERT INTO `create_plan` VALUES (7447, 162, 'uni002_Course017', 18, 84, 0, 41);
INSERT INTO `create_plan` VALUES (7448, 162, 'uni002_Course015', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7449, 162, 'uni002_Course014', 18, 56, 0, 41);
INSERT INTO `create_plan` VALUES (7450, 162, 'uni002_Course013', 18, 56, 0, 41);
INSERT INTO `create_plan` VALUES (7451, 162, 'uni002_Course011', 18, 35, 0, 41);
INSERT INTO `create_plan` VALUES (7452, 162, 'uni002_Course010', 18, 70, 0, 41);
INSERT INTO `create_plan` VALUES (7453, 162, 'uni002_Course009', 18, 35, 0, 41);
INSERT INTO `create_plan` VALUES (7454, 162, 'uni002_Course008', 18, 35, 0, 41);
INSERT INTO `create_plan` VALUES (7455, 162, 'uni002_Course007', 18, 105, 0, 41);
INSERT INTO `create_plan` VALUES (7456, 162, 'uni002_Course006', 18, 105, 0, 41);
INSERT INTO `create_plan` VALUES (7457, 162, 'uni002_uni002_Course110', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7458, 162, 'uni002_Course005', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7459, 162, 'uni002_Course004', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7460, 162, 'uni002_Course003', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7461, 162, 'uni002_Course002', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7462, 162, 'uni002_Course001', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7463, 162, 'uni001_doc031', 18, 72, 0, 41);
INSERT INTO `create_plan` VALUES (7464, 162, 'uni001_Course13', 18, 60, 0, 41);
INSERT INTO `create_plan` VALUES (7465, 162, 'uni001_cours042', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7466, 162, 'uni001_cours106', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7467, 162, 'uni001_cours105', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7468, 162, 'uni001_cours104', 18, 8, 0, 41);
INSERT INTO `create_plan` VALUES (7469, 162, 'uni001_cours103', 18, 8, 0, 41);
INSERT INTO `create_plan` VALUES (7470, 162, 'uni001_cours102', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7471, 162, 'uni001_Course30', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7472, 162, 'uni001_Course21', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7473, 162, 'uni001_cours100', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7474, 162, 'uni001_cours099', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7475, 162, 'uni001_cours098', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7476, 162, 'uni001_Course19', 18, 27, 0, 41);
INSERT INTO `create_plan` VALUES (7477, 162, 'uni001_cours097', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7478, 162, 'uni001_cours096', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7479, 162, 'uni001_cours095', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7480, 162, 'uni001_cours094', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7481, 162, 'uni001_cours093', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7482, 162, 'uni001_cours092', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7483, 162, 'uni001_cours091', 18, 56, 0, 41);
INSERT INTO `create_plan` VALUES (7484, 162, 'uni001_cours090', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7485, 162, 'uni001_cours089', 18, 56, 0, 41);
INSERT INTO `create_plan` VALUES (7486, 162, 'uni001_cours088', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7487, 162, 'uni001_cours087', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7488, 162, 'uni001_cours086', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7489, 162, 'uni001_cours085', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7490, 162, 'uni001_cours084', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7491, 162, 'uni001_cours083', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7492, 162, 'uni001_cours082', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7493, 162, 'uni001_cours081', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7494, 162, 'uni001_cours080', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7495, 162, 'uni001_cours079', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7496, 162, 'uni001_cours078', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7497, 162, 'uni001_cours077', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7498, 162, 'uni001_Course17', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7499, 162, 'uni001_Course15', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7500, 162, 'uni001_cours076', 18, 64, 0, 41);
INSERT INTO `create_plan` VALUES (7501, 162, 'uni001_cours075', 18, 64, 0, 41);
INSERT INTO `create_plan` VALUES (7502, 162, 'uni001_cours074', 18, 64, 0, 41);
INSERT INTO `create_plan` VALUES (7503, 162, 'uni001_cours073', 18, 64, 0, 41);
INSERT INTO `create_plan` VALUES (7504, 162, 'uni001_cours072', 18, 64, 0, 41);
INSERT INTO `create_plan` VALUES (7505, 162, 'uni001_cours071', 18, 64, 0, 41);
INSERT INTO `create_plan` VALUES (7506, 162, 'uni001_cours070', 18, 64, 0, 41);
INSERT INTO `create_plan` VALUES (7507, 162, 'uni001_cours069', 18, 64, 0, 41);
INSERT INTO `create_plan` VALUES (7508, 162, 'uni001_cours068', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7509, 162, 'uni001_cours067', 18, 64, 0, 41);
INSERT INTO `create_plan` VALUES (7510, 162, 'uni001_cours066', 18, 64, 0, 41);
INSERT INTO `create_plan` VALUES (7511, 162, 'uni001_cours065', 18, 64, 0, 41);
INSERT INTO `create_plan` VALUES (7512, 162, 'uni001_cours064', 18, 64, 0, 41);
INSERT INTO `create_plan` VALUES (7513, 162, 'uni001_cours063', 18, 64, 0, 41);
INSERT INTO `create_plan` VALUES (7514, 162, 'uni001_Course14', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7515, 162, 'uni001_cours062', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7516, 162, 'uni001_cours061', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7517, 162, 'uni001_cours060', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7518, 162, 'uni001_cours058', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7519, 162, 'uni001_cours057', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7520, 162, 'uni001_cours056', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7521, 162, 'uni001_cours055', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7522, 162, 'uni001_cours054', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7523, 162, 'uni001_cours053', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7524, 162, 'uni001_cours052', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7525, 162, 'uni001_cours051', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7526, 162, 'uni001_cours050', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7527, 162, 'uni001_cours049', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7528, 162, 'uni001_cours048', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7529, 162, 'uni001_cours047', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7530, 162, 'uni001_cours046', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7531, 162, 'uni001_cours045', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7532, 162, 'uni001_cours044', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7533, 162, 'uni001_Course8', 18, 30, 0, 41);
INSERT INTO `create_plan` VALUES (7534, 162, 'uni001_Course12', 18, 60, 0, 41);
INSERT INTO `create_plan` VALUES (7535, 162, 'uni001_Course11', 18, 60, 0, 41);
INSERT INTO `create_plan` VALUES (7536, 162, 'uni001_cours041', 18, 60, 0, 41);
INSERT INTO `create_plan` VALUES (7537, 162, 'uni001_cours040', 18, 60, 0, 41);
INSERT INTO `create_plan` VALUES (7538, 162, 'uni001_cours039', 18, 60, 0, 41);
INSERT INTO `create_plan` VALUES (7539, 162, 'uni001_cours038', 18, 60, 0, 41);
INSERT INTO `create_plan` VALUES (7540, 162, 'uni001_cours037', 18, 60, 0, 41);
INSERT INTO `create_plan` VALUES (7541, 162, 'uni001_cours036', 18, 60, 0, 41);
INSERT INTO `create_plan` VALUES (7542, 162, 'uni001_cours035', 18, 60, 0, 41);
INSERT INTO `create_plan` VALUES (7543, 162, 'uni001_cours034', 18, 60, 0, 41);
INSERT INTO `create_plan` VALUES (7544, 162, 'uni001_cours033', 18, 60, 0, 41);
INSERT INTO `create_plan` VALUES (7545, 162, 'uni001_cours032', 18, 60, 0, 41);
INSERT INTO `create_plan` VALUES (7546, 162, 'uni001_Course9', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7547, 162, 'uni001_Course10', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7548, 162, 'uni001_cours031', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7549, 162, 'uni001_cours030', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7550, 162, 'uni001_cours029', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7551, 162, 'uni001_cours028', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7552, 162, 'uni001_cours026', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7553, 162, 'uni001_cours025', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7554, 162, 'uni001_cours024', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7555, 162, 'uni001_cours023', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7556, 162, 'uni001_cours022', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7557, 162, 'uni001_cours021', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7558, 162, 'uni001_cours020', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7559, 162, 'uni001_cours019', 18, 40, 0, 41);
INSERT INTO `create_plan` VALUES (7560, 162, 'uni001_cours018', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7561, 162, 'uni001_cours017', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7562, 162, 'uni001_cours016', 18, 48, 0, 41);
INSERT INTO `create_plan` VALUES (7563, 162, 'uni001_cours015', 18, 150, 0, 41);
INSERT INTO `create_plan` VALUES (7564, 162, 'uni001_cours014', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7565, 162, 'uni001_cours013', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7566, 162, 'uni001_cours012', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7567, 162, 'uni001_cours011', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7568, 162, 'uni001_cours010', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7569, 162, 'uni001_cours009', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7570, 162, 'uni001_cours008', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7571, 162, 'uni001_cours005', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7572, 162, 'uni001_cours004', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7573, 162, 'uni001_cours003', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7574, 162, 'uni001_cours002', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7575, 162, 'uni001_cours001', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7576, 162, 'uni003_CS101', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7577, 162, 'uni003_CS100', 18, 32, 0, 41);
INSERT INTO `create_plan` VALUES (7578, 162, 'uni002_CS101', 18, 28, 0, 41);
INSERT INTO `create_plan` VALUES (7579, 162, 'uni002_CS100', 18, 56, 0, 41);
INSERT INTO `create_plan` VALUES (7580, 162, 'uni001_CS102', 18, 8, 0, 41);
INSERT INTO `create_plan` VALUES (7581, 162, 'uni001_CS101', 18, 24, 0, 41);
INSERT INTO `create_plan` VALUES (7582, 162, 'uni001_CS100', 18, 20, 0, 41);
INSERT INTO `create_plan` VALUES (7583, 162, 'uni001_Course13', 4, 40, 0, 27);
INSERT INTO `create_plan` VALUES (7584, 162, 'uni001_cours042', 4, 60, 0, 27);
INSERT INTO `create_plan` VALUES (7585, 162, 'uni001_Course17', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7586, 162, 'uni001_Course15', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7587, 162, 'uni001_cours076', 4, 64, 0, 27);
INSERT INTO `create_plan` VALUES (7588, 162, 'uni001_cours075', 4, 64, 0, 27);
INSERT INTO `create_plan` VALUES (7589, 162, 'uni001_cours074', 4, 64, 0, 27);
INSERT INTO `create_plan` VALUES (7590, 162, 'uni001_cours073', 4, 64, 0, 27);
INSERT INTO `create_plan` VALUES (7591, 162, 'uni001_cours072', 4, 64, 0, 27);
INSERT INTO `create_plan` VALUES (7592, 162, 'uni001_cours070', 4, 64, 0, 27);
INSERT INTO `create_plan` VALUES (7593, 162, 'uni001_cours069', 4, 64, 0, 27);
INSERT INTO `create_plan` VALUES (7594, 162, 'uni001_cours068', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7595, 162, 'uni001_cours067', 4, 64, 0, 27);
INSERT INTO `create_plan` VALUES (7596, 162, 'uni001_cours066', 4, 64, 0, 27);
INSERT INTO `create_plan` VALUES (7597, 162, 'uni001_cours064', 4, 64, 0, 27);
INSERT INTO `create_plan` VALUES (7598, 162, 'uni001_cours063', 4, 64, 0, 27);
INSERT INTO `create_plan` VALUES (7599, 162, 'uni001_Course14', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7600, 162, 'uni001_cours062', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7601, 162, 'uni001_cours061', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7602, 162, 'uni001_cours060', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7603, 162, 'uni001_cours058', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7604, 162, 'uni001_cours057', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7605, 162, 'uni001_cours056', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7606, 162, 'uni001_cours055', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7607, 162, 'uni001_cours054', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7608, 162, 'uni001_cours053', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7609, 162, 'uni001_cours052', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7610, 162, 'uni001_cours051', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7611, 162, 'uni001_cours050', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7612, 162, 'uni001_cours049', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7613, 162, 'uni001_cours048', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7614, 162, 'uni001_cours047', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7615, 162, 'uni001_cours046', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7616, 162, 'uni001_cours045', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7617, 162, 'uni001_cours044', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7618, 162, 'uni001_Course8', 4, 30, 0, 27);
INSERT INTO `create_plan` VALUES (7619, 162, 'uni001_Course12', 4, 60, 0, 27);
INSERT INTO `create_plan` VALUES (7620, 162, 'uni001_Course11', 4, 60, 0, 27);
INSERT INTO `create_plan` VALUES (7621, 162, 'uni001_cours041', 4, 60, 0, 27);
INSERT INTO `create_plan` VALUES (7622, 162, 'uni001_cours040', 4, 60, 0, 27);
INSERT INTO `create_plan` VALUES (7623, 162, 'uni001_cours039', 4, 60, 0, 27);
INSERT INTO `create_plan` VALUES (7624, 162, 'uni001_cours038', 4, 60, 0, 27);
INSERT INTO `create_plan` VALUES (7625, 162, 'uni001_cours037', 4, 60, 0, 27);
INSERT INTO `create_plan` VALUES (7626, 162, 'uni001_cours036', 4, 60, 0, 27);
INSERT INTO `create_plan` VALUES (7627, 162, 'uni001_cours035', 4, 60, 0, 27);
INSERT INTO `create_plan` VALUES (7628, 162, 'uni001_cours034', 4, 60, 0, 27);
INSERT INTO `create_plan` VALUES (7629, 162, 'uni001_cours033', 4, 60, 0, 27);
INSERT INTO `create_plan` VALUES (7630, 162, 'uni001_cours032', 4, 60, 0, 27);
INSERT INTO `create_plan` VALUES (7631, 162, 'uni001_Course9', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7632, 162, 'uni001_Course10', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7633, 162, 'uni001_cours031', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7634, 162, 'uni001_cours030', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7635, 162, 'uni001_cours029', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7636, 162, 'uni001_cours028', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7637, 162, 'uni001_cours026', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7638, 162, 'uni001_cours025', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7639, 162, 'uni001_cours024', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7640, 162, 'uni001_cours023', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7641, 162, 'uni001_CS101', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7642, 162, 'uni001_cours022', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7643, 162, 'uni001_cours021', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7644, 162, 'uni001_cours020', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7645, 162, 'uni001_cours019', 4, 40, 0, 27);
INSERT INTO `create_plan` VALUES (7646, 162, 'uni001_cours018', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7647, 162, 'uni001_cours017', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7648, 162, 'uni001_cours016', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7649, 162, 'uni001_cours015', 4, 150, 0, 27);
INSERT INTO `create_plan` VALUES (7650, 162, 'uni001_cours014', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7651, 162, 'uni001_cours013', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7652, 162, 'uni001_cours012', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7653, 162, 'uni001_CS100', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7654, 162, 'uni001_cours011', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7655, 162, 'uni001_cours010', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7656, 162, 'uni001_cours009', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7657, 162, 'uni001_cours008', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7658, 162, 'uni001_cours005', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7659, 162, 'uni001_cours004', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7660, 162, 'uni001_cours003', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7661, 162, 'uni001_cours002', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7662, 162, 'uni001_cours001', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7663, 162, 'uni001_doc031', 4, 72, 0, 27);
INSERT INTO `create_plan` VALUES (7664, 162, 'uni001_CS102', 4, 8, 0, 27);
INSERT INTO `create_plan` VALUES (7665, 162, 'uni001_cours106', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7666, 162, 'uni001_cours105', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7667, 162, 'uni001_cours104', 4, 8, 0, 27);
INSERT INTO `create_plan` VALUES (7668, 162, 'uni001_cours103', 4, 8, 0, 27);
INSERT INTO `create_plan` VALUES (7669, 162, 'uni001_cours102', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7670, 162, 'uni001_Course30', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7671, 162, 'uni001_Course21', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7672, 162, 'uni001_cours100', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7673, 162, 'uni001_cours099', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7674, 162, 'uni001_cours098', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7675, 162, 'uni001_Course19', 4, 27, 0, 27);
INSERT INTO `create_plan` VALUES (7676, 162, 'uni001_cours097', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7677, 162, 'uni001_cours096', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7678, 162, 'uni001_cours095', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7679, 162, 'uni001_cours094', 4, 48, 0, 27);
INSERT INTO `create_plan` VALUES (7680, 162, 'uni001_cours093', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7681, 162, 'uni001_cours092', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7682, 162, 'uni001_cours091', 4, 56, 0, 27);
INSERT INTO `create_plan` VALUES (7683, 162, 'uni001_cours090', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7684, 162, 'uni001_cours089', 4, 56, 0, 27);
INSERT INTO `create_plan` VALUES (7685, 162, 'uni001_cours088', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7686, 162, 'uni001_cours087', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7687, 162, 'uni001_cours086', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7688, 162, 'uni001_cours085', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7689, 162, 'uni001_cours084', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7690, 162, 'uni001_cours083', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7691, 162, 'uni001_cours082', 4, 40, 0, 27);
INSERT INTO `create_plan` VALUES (7692, 162, 'uni001_cours081', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7693, 162, 'uni001_cours080', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7694, 162, 'uni001_cours079', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7695, 162, 'uni001_cours078', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7696, 162, 'uni001_cours077', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7697, 162, 'uni002_Course026', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7698, 162, 'uni002_Course025', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7699, 162, 'uni002_Course023', 4, 204, 0, 27);
INSERT INTO `create_plan` VALUES (7700, 162, 'uni002_Course022', 4, 24, 0, 27);
INSERT INTO `create_plan` VALUES (7701, 162, 'uni002_Course021', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7702, 162, 'uni002_Course020', 4, 56, 0, 27);
INSERT INTO `create_plan` VALUES (7703, 162, 'uni002_Course019', 4, 56, 0, 27);
INSERT INTO `create_plan` VALUES (7704, 162, 'uni002_Course018', 4, 84, 0, 27);
INSERT INTO `create_plan` VALUES (7705, 162, 'uni002_Course017', 4, 84, 0, 27);
INSERT INTO `create_plan` VALUES (7706, 162, 'uni002_CS101', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7707, 162, 'uni002_CS100', 4, 56, 0, 27);
INSERT INTO `create_plan` VALUES (7708, 162, 'uni002_Course015', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7709, 162, 'uni002_Course014', 4, 56, 0, 27);
INSERT INTO `create_plan` VALUES (7710, 162, 'uni002_Course013', 4, 56, 0, 27);
INSERT INTO `create_plan` VALUES (7711, 162, 'uni002_Course011', 4, 35, 0, 27);
INSERT INTO `create_plan` VALUES (7712, 162, 'uni002_Course010', 4, 70, 0, 27);
INSERT INTO `create_plan` VALUES (7713, 162, 'uni002_Course009', 4, 35, 0, 27);
INSERT INTO `create_plan` VALUES (7714, 162, 'uni002_Course008', 4, 35, 0, 27);
INSERT INTO `create_plan` VALUES (7715, 162, 'uni002_Course007', 4, 105, 0, 27);
INSERT INTO `create_plan` VALUES (7716, 162, 'uni002_Course006', 4, 105, 0, 27);
INSERT INTO `create_plan` VALUES (7717, 162, 'uni002_uni002_Course110', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7718, 162, 'uni002_Course005', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7719, 162, 'uni002_Course004', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7720, 162, 'uni002_Course003', 4, 25, 0, 27);
INSERT INTO `create_plan` VALUES (7721, 162, 'uni002_Course002', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7722, 162, 'uni002_Course001', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7723, 162, 'uni004_fac037', 9, 35, 0, 31);
INSERT INTO `create_plan` VALUES (7724, 162, 'uni004_fac036', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7725, 162, 'uni004_fac035', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7726, 162, 'uni004_fac034', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7727, 162, 'uni004_fac033', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7728, 162, 'uni004_fac032', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7729, 162, 'uni004_fac031', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7730, 162, 'uni004_fac030', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7731, 162, 'uni004_fac029', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7732, 162, 'uni004_fac028', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7733, 162, 'uni004_fac027', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7734, 162, 'uni004_Course7', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7735, 162, 'uni004_fac026', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7736, 162, 'uni004_fac025', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7737, 162, 'uni004_fac024', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7738, 162, 'uni004_fac023', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7739, 162, 'uni004_fac022', 9, 56, 0, 31);
INSERT INTO `create_plan` VALUES (7740, 162, 'uni004_fac021', 9, 56, 0, 31);
INSERT INTO `create_plan` VALUES (7741, 162, 'uni004_fac020', 9, 56, 0, 31);
INSERT INTO `create_plan` VALUES (7742, 162, 'uni004_fac019', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7743, 162, 'uni004_fac018', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7744, 162, 'uni004_fac017', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7745, 162, 'uni004_fac016', 9, 105, 0, 31);
INSERT INTO `create_plan` VALUES (7746, 162, 'uni004_fac015', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7747, 162, 'uni004_fac014', 9, 45, 0, 31);
INSERT INTO `create_plan` VALUES (7748, 162, 'uni004_fac013', 9, 45, 0, 31);
INSERT INTO `create_plan` VALUES (7749, 162, 'uni004_fac012', 9, 45, 0, 31);
INSERT INTO `create_plan` VALUES (7750, 162, 'uni004_fac011', 9, 45, 0, 31);
INSERT INTO `create_plan` VALUES (7751, 162, 'uni004_fac010', 9, 45, 0, 31);
INSERT INTO `create_plan` VALUES (7752, 162, 'uni004_fac009', 9, 35, 0, 31);
INSERT INTO `create_plan` VALUES (7753, 162, 'uni004_fac008', 9, 35, 0, 31);
INSERT INTO `create_plan` VALUES (7754, 162, 'uni004_fac007', 9, 45, 0, 31);
INSERT INTO `create_plan` VALUES (7755, 162, 'uni004_fac006', 9, 27, 0, 31);
INSERT INTO `create_plan` VALUES (7756, 162, 'uni004_fac005', 9, 27, 0, 31);
INSERT INTO `create_plan` VALUES (7757, 162, 'uni004_fac004', 9, 27, 0, 31);
INSERT INTO `create_plan` VALUES (7758, 162, 'uni004_fac003', 9, 27, 0, 31);
INSERT INTO `create_plan` VALUES (7759, 162, 'uni004_fac002', 9, 27, 0, 31);
INSERT INTO `create_plan` VALUES (7760, 162, 'uni004_fac001', 9, 27, 0, 31);
INSERT INTO `create_plan` VALUES (7761, 162, 'uni003_Course6', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7762, 162, 'uni003_course032', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7763, 162, 'uni003_course031', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7764, 162, 'uni003_course030', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7765, 162, 'uni003_course029', 9, 40, 0, 31);
INSERT INTO `create_plan` VALUES (7766, 162, 'uni003_course028', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7767, 162, 'uni003_Course5', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7768, 162, 'uni003_Course4', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7769, 162, 'uni003_course026', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7770, 162, 'uni003_course024', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7771, 162, 'uni003_course023', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7772, 162, 'uni003_course022', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7773, 162, 'uni003_Course97', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7774, 162, 'uni003_Course3', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7775, 162, 'uni003_course021', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7776, 162, 'uni003_course019', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7777, 162, 'uni003_uni002_uni002_Course160', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7778, 162, 'uni003_Course1', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7779, 162, 'uni003_course018', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7780, 162, 'uni003_course017', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7781, 162, 'uni003_course016', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7782, 162, 'uni003_course015', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7783, 162, 'uni003_course014', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7784, 162, 'uni003_course013', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7785, 162, 'uni003_uni002_uni002_Course150', 9, 40, 0, 31);
INSERT INTO `create_plan` VALUES (7786, 162, 'uni003_Course91', 9, 40, 0, 31);
INSERT INTO `create_plan` VALUES (7787, 162, 'uni003_course012', 9, 40, 0, 31);
INSERT INTO `create_plan` VALUES (7788, 162, 'uni003_course010', 9, 40, 0, 31);
INSERT INTO `create_plan` VALUES (7789, 162, 'uni003_course009', 9, 40, 0, 31);
INSERT INTO `create_plan` VALUES (7790, 162, 'uni003_course008', 9, 40, 0, 31);
INSERT INTO `create_plan` VALUES (7791, 162, 'uni003_course007', 9, 40, 0, 31);
INSERT INTO `create_plan` VALUES (7792, 162, 'uni003_course006', 9, 40, 0, 31);
INSERT INTO `create_plan` VALUES (7793, 162, 'uni003_course005', 9, 40, 0, 31);
INSERT INTO `create_plan` VALUES (7794, 162, 'uni003_uni002_uni002_Course140', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7795, 162, 'uni003_Course104', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7796, 162, 'uni003_Course01', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7797, 162, 'uni003_course003', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7798, 162, 'uni003_course001', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7799, 162, 'uni002_Course026', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7800, 162, 'uni002_Course025', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7801, 162, 'uni002_Course023', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7802, 162, 'uni002_Course022', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7803, 162, 'uni002_Course021', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7804, 162, 'uni002_Course020', 9, 56, 0, 31);
INSERT INTO `create_plan` VALUES (7805, 162, 'uni002_Course019', 9, 56, 0, 31);
INSERT INTO `create_plan` VALUES (7806, 162, 'uni002_Course018', 9, 84, 0, 31);
INSERT INTO `create_plan` VALUES (7807, 162, 'uni002_Course017', 9, 84, 0, 31);
INSERT INTO `create_plan` VALUES (7808, 162, 'uni002_uni002_uni002_Course130', 9, 56, 0, 31);
INSERT INTO `create_plan` VALUES (7809, 162, 'uni002_uni002_uni002_Course120', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7810, 162, 'uni002_Course035', 9, 56, 0, 31);
INSERT INTO `create_plan` VALUES (7811, 162, 'uni002_Course015', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7812, 162, 'uni002_Course014', 9, 56, 0, 31);
INSERT INTO `create_plan` VALUES (7813, 162, 'uni002_Course011', 9, 35, 0, 31);
INSERT INTO `create_plan` VALUES (7814, 162, 'uni002_Course010', 9, 70, 0, 31);
INSERT INTO `create_plan` VALUES (7815, 162, 'uni002_Course009', 9, 35, 0, 31);
INSERT INTO `create_plan` VALUES (7816, 162, 'uni002_Course008', 9, 35, 0, 31);
INSERT INTO `create_plan` VALUES (7817, 162, 'uni002_Course007', 9, 105, 0, 31);
INSERT INTO `create_plan` VALUES (7818, 162, 'uni002_Course006', 9, 105, 0, 31);
INSERT INTO `create_plan` VALUES (7819, 162, 'uni002_uni002_Course110', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7820, 162, 'uni002_Course005', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7821, 162, 'uni002_Course004', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7822, 162, 'uni002_Course003', 9, 25, 0, 31);
INSERT INTO `create_plan` VALUES (7823, 162, 'uni002_Course002', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7824, 162, 'uni002_Course001', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7825, 162, 'uni001_doc031', 9, 72, 0, 31);
INSERT INTO `create_plan` VALUES (7826, 162, 'uni001_Course13', 9, 60, 0, 31);
INSERT INTO `create_plan` VALUES (7827, 162, 'uni001_cours042', 9, 40, 0, 31);
INSERT INTO `create_plan` VALUES (7828, 162, 'uni001_cours106', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7829, 162, 'uni001_cours105', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7830, 162, 'uni001_cours104', 9, 8, 0, 31);
INSERT INTO `create_plan` VALUES (7831, 162, 'uni001_cours103', 9, 8, 0, 31);
INSERT INTO `create_plan` VALUES (7832, 162, 'uni001_cours102', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7833, 162, 'uni001_Course30', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7834, 162, 'uni001_Course21', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7835, 162, 'uni001_cours100', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7836, 162, 'uni001_cours099', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7837, 162, 'uni001_cours098', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7838, 162, 'uni001_Course19', 9, 27, 0, 31);
INSERT INTO `create_plan` VALUES (7839, 162, 'uni001_cours097', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7840, 162, 'uni001_cours096', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7841, 162, 'uni001_cours095', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7842, 162, 'uni001_cours094', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7843, 162, 'uni001_cours093', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7844, 162, 'uni001_cours092', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7845, 162, 'uni001_cours091', 9, 56, 0, 31);
INSERT INTO `create_plan` VALUES (7846, 162, 'uni001_cours090', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7847, 162, 'uni001_cours089', 9, 56, 0, 31);
INSERT INTO `create_plan` VALUES (7848, 162, 'uni001_cours088', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7849, 162, 'uni001_cours087', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7850, 162, 'uni001_cours086', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7851, 162, 'uni001_cours085', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7852, 162, 'uni001_cours084', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7853, 162, 'uni001_cours083', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7854, 162, 'uni001_cours082', 9, 40, 0, 31);
INSERT INTO `create_plan` VALUES (7855, 162, 'uni001_cours081', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7856, 162, 'uni001_cours080', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7857, 162, 'uni001_cours079', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7858, 162, 'uni001_cours078', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7859, 162, 'uni001_cours077', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7860, 162, 'uni001_Course56', 9, 64, 0, 31);
INSERT INTO `create_plan` VALUES (7861, 162, 'uni001_Course17', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7862, 162, 'uni001_Course15', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7863, 162, 'uni001_cours076', 9, 64, 0, 31);
INSERT INTO `create_plan` VALUES (7864, 162, 'uni001_cours075', 9, 64, 0, 31);
INSERT INTO `create_plan` VALUES (7865, 162, 'uni001_cours074', 9, 64, 0, 31);
INSERT INTO `create_plan` VALUES (7866, 162, 'uni001_cours073', 9, 64, 0, 31);
INSERT INTO `create_plan` VALUES (7867, 162, 'uni001_cours072', 9, 64, 0, 31);
INSERT INTO `create_plan` VALUES (7868, 162, 'uni001_cours071', 9, 64, 0, 31);
INSERT INTO `create_plan` VALUES (7869, 162, 'uni001_cours070', 9, 64, 0, 31);
INSERT INTO `create_plan` VALUES (7870, 162, 'uni001_cours069', 9, 64, 0, 31);
INSERT INTO `create_plan` VALUES (7871, 162, 'uni001_cours068', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7872, 162, 'uni001_cours067', 9, 64, 0, 31);
INSERT INTO `create_plan` VALUES (7873, 162, 'uni001_cours066', 9, 64, 0, 31);
INSERT INTO `create_plan` VALUES (7874, 162, 'uni001_cours064', 9, 64, 0, 31);
INSERT INTO `create_plan` VALUES (7875, 162, 'uni001_cours063', 9, 64, 0, 31);
INSERT INTO `create_plan` VALUES (7876, 162, 'uni001_Course14', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7877, 162, 'uni001_cours062', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7878, 162, 'uni001_cours061', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7879, 162, 'uni001_cours060', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7880, 162, 'uni001_cours058', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7881, 162, 'uni001_cours057', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7882, 162, 'uni001_cours056', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7883, 162, 'uni001_cours055', 9, 28, 0, 31);
INSERT INTO `create_plan` VALUES (7884, 162, 'uni001_cours054', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7885, 162, 'uni001_cours053', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7886, 162, 'uni001_cours052', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7887, 162, 'uni001_cours051', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7888, 162, 'uni001_cours050', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7889, 162, 'uni001_cours049', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7890, 162, 'uni001_cours048', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7891, 162, 'uni001_cours047', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7892, 162, 'uni001_cours046', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7893, 162, 'uni001_cours045', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7894, 162, 'uni001_cours044', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7895, 162, 'uni001_Course8', 9, 30, 0, 31);
INSERT INTO `create_plan` VALUES (7896, 162, 'uni001_Course12', 9, 60, 0, 31);
INSERT INTO `create_plan` VALUES (7897, 162, 'uni001_Course11', 9, 60, 0, 31);
INSERT INTO `create_plan` VALUES (7898, 162, 'uni001_cours041', 9, 60, 0, 31);
INSERT INTO `create_plan` VALUES (7899, 162, 'uni001_cours040', 9, 60, 0, 31);
INSERT INTO `create_plan` VALUES (7900, 162, 'uni001_cours039', 9, 60, 0, 31);
INSERT INTO `create_plan` VALUES (7901, 162, 'uni001_cours038', 9, 60, 0, 31);
INSERT INTO `create_plan` VALUES (7902, 162, 'uni001_cours037', 9, 60, 0, 31);
INSERT INTO `create_plan` VALUES (7903, 162, 'uni001_cours036', 9, 60, 0, 31);
INSERT INTO `create_plan` VALUES (7904, 162, 'uni001_cours035', 9, 60, 0, 31);
INSERT INTO `create_plan` VALUES (7905, 162, 'uni001_cours034', 9, 60, 0, 31);
INSERT INTO `create_plan` VALUES (7906, 162, 'uni001_cours033', 9, 60, 0, 31);
INSERT INTO `create_plan` VALUES (7907, 162, 'uni001_cours032', 9, 60, 0, 31);
INSERT INTO `create_plan` VALUES (7908, 162, 'uni001_Course9', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7909, 162, 'uni001_Course10', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7910, 162, 'uni001_cours031', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7911, 162, 'uni001_cours030', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7912, 162, 'uni001_cours029', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7913, 162, 'uni001_cours028', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7914, 162, 'uni001_cours026', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7915, 162, 'uni001_cours025', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7916, 162, 'uni001_cours024', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7917, 162, 'uni001_cours023', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7918, 162, 'uni001_cours022', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7919, 162, 'uni001_cours021', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7920, 162, 'uni001_cours020', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7921, 162, 'uni001_cours019', 9, 40, 0, 31);
INSERT INTO `create_plan` VALUES (7922, 162, 'uni001_cours018', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7923, 162, 'uni001_cours017', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7924, 162, 'uni001_cours016', 9, 48, 0, 31);
INSERT INTO `create_plan` VALUES (7925, 162, 'uni001_cours015', 9, 150, 0, 31);
INSERT INTO `create_plan` VALUES (7926, 162, 'uni001_cours014', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7927, 162, 'uni001_cours013', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (7928, 162, 'uni001_cours012', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (7929, 162, 'uni001_cours011', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7930, 162, 'uni001_cours010', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7931, 162, 'uni001_cours009', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7932, 162, 'uni001_cours008', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7933, 162, 'uni001_cours005', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7934, 162, 'uni001_cours004', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7935, 162, 'uni001_cours003', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7936, 162, 'uni001_cours002', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7937, 162, 'uni001_cours001', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (7938, 162, 'uni003_Course6', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7939, 162, 'uni003_course032', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7940, 162, 'uni003_course031', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7941, 162, 'uni003_course030', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7942, 162, 'uni003_course029', 4, 40, 0, 27);
INSERT INTO `create_plan` VALUES (7943, 162, 'uni003_course028', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7944, 162, 'uni003_CS101', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7945, 162, 'uni003_Course5', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7946, 162, 'uni003_Course4', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7947, 162, 'uni003_course026', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7948, 162, 'uni003_course024', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7949, 162, 'uni003_course023', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7950, 162, 'uni003_course022', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7951, 162, 'uni003_CS100', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7952, 162, 'uni003_Course3', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7953, 162, 'uni003_course021', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7954, 162, 'uni003_course020', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7955, 162, 'uni003_course019', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7956, 162, 'uni003_uni002_uni002_Course160', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7957, 162, 'uni003_Course1', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7958, 162, 'uni003_course018', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7959, 162, 'uni003_course017', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7960, 162, 'uni003_course016', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7961, 162, 'uni003_course015', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7962, 162, 'uni003_course014', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7963, 162, 'uni003_course013', 4, 32, 0, 27);
INSERT INTO `create_plan` VALUES (7964, 162, 'uni003_uni002_uni002_Course150', 4, 40, 0, 27);
INSERT INTO `create_plan` VALUES (7965, 162, 'uni003_course012', 4, 40, 0, 27);
INSERT INTO `create_plan` VALUES (7966, 162, 'uni003_course011', 4, 40, 0, 27);
INSERT INTO `create_plan` VALUES (7967, 162, 'uni003_course010', 4, 40, 0, 27);
INSERT INTO `create_plan` VALUES (7968, 162, 'uni003_course009', 4, 40, 0, 27);
INSERT INTO `create_plan` VALUES (7969, 162, 'uni003_course008', 4, 40, 0, 27);
INSERT INTO `create_plan` VALUES (7970, 162, 'uni003_course007', 4, 40, 0, 27);
INSERT INTO `create_plan` VALUES (7971, 162, 'uni003_course006', 4, 40, 0, 27);
INSERT INTO `create_plan` VALUES (7972, 162, 'uni003_course005', 4, 40, 0, 27);
INSERT INTO `create_plan` VALUES (7973, 162, 'uni003_uni002_uni002_Course140', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7974, 162, 'uni003_Course104', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7975, 162, 'uni003_Course01', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7976, 162, 'uni003_course003', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7977, 162, 'uni003_course001', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7978, 162, 'uni004_fac037', 4, 35, 0, 27);
INSERT INTO `create_plan` VALUES (7979, 162, 'uni004_fac036', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7980, 162, 'uni004_fac035', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7981, 162, 'uni004_fac034', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7982, 162, 'uni004_fac033', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7983, 162, 'uni004_fac032', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7984, 162, 'uni004_fac031', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7985, 162, 'uni004_fac030', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7986, 162, 'uni004_fac029', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7987, 162, 'uni004_fac028', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7988, 162, 'uni004_fac027', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7989, 162, 'uni004_Course7', 4, 20, 0, 27);
INSERT INTO `create_plan` VALUES (7990, 162, 'uni004_fac026', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7991, 162, 'uni004_fac025', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7992, 162, 'uni004_fac024', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7993, 162, 'uni004_fac023', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7994, 162, 'uni004_fac022', 4, 56, 0, 27);
INSERT INTO `create_plan` VALUES (7995, 162, 'uni004_fac021', 4, 56, 0, 27);
INSERT INTO `create_plan` VALUES (7996, 162, 'uni004_fac020', 4, 56, 0, 27);
INSERT INTO `create_plan` VALUES (7997, 162, 'uni004_fac019', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7998, 162, 'uni004_fac018', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (7999, 162, 'uni004_fac017', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (8000, 162, 'uni004_fac016', 4, 105, 0, 27);
INSERT INTO `create_plan` VALUES (8001, 162, 'uni004_fac015', 4, 28, 0, 27);
INSERT INTO `create_plan` VALUES (8002, 162, 'uni004_fac014', 4, 45, 0, 27);
INSERT INTO `create_plan` VALUES (8003, 162, 'uni004_fac013', 4, 45, 0, 27);
INSERT INTO `create_plan` VALUES (8004, 162, 'uni004_fac012', 4, 45, 0, 27);
INSERT INTO `create_plan` VALUES (8005, 162, 'uni004_fac011', 4, 45, 0, 27);
INSERT INTO `create_plan` VALUES (8006, 162, 'uni004_fac010', 4, 45, 0, 27);
INSERT INTO `create_plan` VALUES (8007, 162, 'uni004_fac009', 4, 35, 0, 27);
INSERT INTO `create_plan` VALUES (8008, 162, 'uni004_fac008', 4, 35, 0, 27);
INSERT INTO `create_plan` VALUES (8009, 162, 'uni004_fac007', 4, 45, 0, 27);
INSERT INTO `create_plan` VALUES (8010, 162, 'uni004_fac006', 4, 27, 0, 27);
INSERT INTO `create_plan` VALUES (8011, 162, 'uni004_fac005', 4, 27, 0, 27);
INSERT INTO `create_plan` VALUES (8012, 162, 'uni004_fac004', 4, 27, 0, 27);
INSERT INTO `create_plan` VALUES (8013, 162, 'uni004_fac003', 4, 27, 0, 27);
INSERT INTO `create_plan` VALUES (8014, 162, 'uni004_fac002', 4, 27, 0, 27);
INSERT INTO `create_plan` VALUES (8015, 162, 'uni004_fac001', 4, 27, 0, 27);
INSERT INTO `create_plan` VALUES (8016, 162, 'uni001_doc031', 5, 72, 0, 36);
INSERT INTO `create_plan` VALUES (8017, 162, 'uni001_Course13', 5, 60, 0, 36);
INSERT INTO `create_plan` VALUES (8018, 162, 'uni001_cours042', 5, 60, 0, 36);
INSERT INTO `create_plan` VALUES (8019, 162, 'uni001_CS102', 5, 8, 0, 36);
INSERT INTO `create_plan` VALUES (8020, 162, 'uni001_cours106', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8021, 162, 'uni001_cours105', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8022, 162, 'uni001_cours104', 5, 8, 0, 36);
INSERT INTO `create_plan` VALUES (8023, 162, 'uni001_cours103', 5, 8, 0, 36);
INSERT INTO `create_plan` VALUES (8024, 162, 'uni001_cours102', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8025, 162, 'uni001_Course30', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8026, 162, 'uni001_Course21', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8027, 162, 'uni001_cours100', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8028, 162, 'uni001_cours099', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8029, 162, 'uni001_cours098', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8030, 162, 'uni001_Course19', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8031, 162, 'uni001_cours097', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8032, 162, 'uni001_cours096', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8033, 162, 'uni001_cours095', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8034, 162, 'uni001_cours094', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8035, 162, 'uni001_cours093', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8036, 162, 'uni001_cours092', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8037, 162, 'uni001_cours091', 5, 56, 0, 36);
INSERT INTO `create_plan` VALUES (8038, 162, 'uni001_cours090', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8039, 162, 'uni001_cours089', 5, 56, 0, 36);
INSERT INTO `create_plan` VALUES (8040, 162, 'uni001_cours088', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8041, 162, 'uni001_cours087', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8042, 162, 'uni001_cours086', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8043, 162, 'uni001_cours085', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8044, 162, 'uni001_cours084', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8045, 162, 'uni001_cours083', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8046, 162, 'uni001_cours082', 5, 40, 0, 36);
INSERT INTO `create_plan` VALUES (8047, 162, 'uni001_cours081', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8048, 162, 'uni001_cours080', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8049, 162, 'uni001_cours079', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8050, 162, 'uni001_cours078', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8051, 162, 'uni001_cours077', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8053, 162, 'uni001_Course17', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8054, 162, 'uni001_Course15', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8055, 162, 'uni001_cours076', 5, 64, 0, 36);
INSERT INTO `create_plan` VALUES (8056, 162, 'uni001_cours075', 5, 64, 0, 36);
INSERT INTO `create_plan` VALUES (8057, 162, 'uni001_cours074', 5, 64, 0, 36);
INSERT INTO `create_plan` VALUES (8058, 162, 'uni001_cours073', 5, 64, 0, 36);
INSERT INTO `create_plan` VALUES (8059, 162, 'uni001_cours072', 5, 64, 0, 36);
INSERT INTO `create_plan` VALUES (8060, 162, 'uni001_cours070', 5, 64, 0, 36);
INSERT INTO `create_plan` VALUES (8061, 162, 'uni001_cours069', 5, 64, 0, 36);
INSERT INTO `create_plan` VALUES (8062, 162, 'uni001_cours068', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8063, 162, 'uni001_cours067', 5, 64, 0, 36);
INSERT INTO `create_plan` VALUES (8064, 162, 'uni001_cours066', 5, 64, 0, 36);
INSERT INTO `create_plan` VALUES (8065, 162, 'uni001_cours065', 5, 64, 0, 36);
INSERT INTO `create_plan` VALUES (8066, 162, 'uni001_cours064', 5, 64, 0, 36);
INSERT INTO `create_plan` VALUES (8067, 162, 'uni001_cours063', 5, 64, 0, 36);
INSERT INTO `create_plan` VALUES (8068, 162, 'uni001_Course14', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8069, 162, 'uni001_cours062', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8070, 162, 'uni001_cours061', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8071, 162, 'uni001_cours060', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8072, 162, 'uni001_cours058', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8073, 162, 'uni001_cours057', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8074, 162, 'uni001_cours056', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8075, 162, 'uni001_cours055', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8076, 162, 'uni001_cours054', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8077, 162, 'uni001_cours053', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8078, 162, 'uni001_cours052', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8079, 162, 'uni001_cours051', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8080, 162, 'uni001_cours050', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8081, 162, 'uni001_cours049', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8082, 162, 'uni001_cours048', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8083, 162, 'uni001_cours047', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8084, 162, 'uni001_cours046', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8085, 162, 'uni001_cours045', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8086, 162, 'uni001_cours044', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8087, 162, 'uni001_Course8', 5, 30, 0, 36);
INSERT INTO `create_plan` VALUES (8088, 162, 'uni001_Course12', 5, 60, 0, 36);
INSERT INTO `create_plan` VALUES (8089, 162, 'uni001_Course11', 5, 60, 0, 36);
INSERT INTO `create_plan` VALUES (8090, 162, 'uni001_cours041', 5, 60, 0, 36);
INSERT INTO `create_plan` VALUES (8091, 162, 'uni001_cours040', 5, 60, 0, 36);
INSERT INTO `create_plan` VALUES (8092, 162, 'uni001_cours039', 5, 60, 0, 36);
INSERT INTO `create_plan` VALUES (8093, 162, 'uni001_cours038', 5, 60, 0, 36);
INSERT INTO `create_plan` VALUES (8094, 162, 'uni001_cours037', 5, 60, 0, 36);
INSERT INTO `create_plan` VALUES (8095, 162, 'uni001_cours036', 5, 60, 0, 36);
INSERT INTO `create_plan` VALUES (8096, 162, 'uni001_cours035', 5, 60, 0, 36);
INSERT INTO `create_plan` VALUES (8097, 162, 'uni001_cours034', 5, 60, 0, 36);
INSERT INTO `create_plan` VALUES (8098, 162, 'uni001_cours033', 5, 60, 0, 36);
INSERT INTO `create_plan` VALUES (8099, 162, 'uni001_cours032', 5, 60, 0, 36);
INSERT INTO `create_plan` VALUES (8100, 162, 'uni001_Course9', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8101, 162, 'uni001_Course10', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8102, 162, 'uni001_cours031', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8103, 162, 'uni001_cours030', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8104, 162, 'uni001_cours029', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8105, 162, 'uni001_cours028', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8106, 162, 'uni001_cours026', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8107, 162, 'uni001_cours025', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8108, 162, 'uni001_cours024', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8109, 162, 'uni001_cours023', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8110, 162, 'uni001_CS101', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8111, 162, 'uni001_cours022', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8112, 162, 'uni001_cours021', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8113, 162, 'uni001_cours020', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8114, 162, 'uni001_cours019', 5, 40, 0, 36);
INSERT INTO `create_plan` VALUES (8115, 162, 'uni001_cours018', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8116, 162, 'uni001_cours017', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8117, 162, 'uni001_cours016', 5, 48, 0, 36);
INSERT INTO `create_plan` VALUES (8118, 162, 'uni001_cours015', 5, 150, 0, 36);
INSERT INTO `create_plan` VALUES (8119, 162, 'uni001_cours014', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8120, 162, 'uni001_cours013', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8121, 162, 'uni001_cours012', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8122, 162, 'uni001_CS100', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8123, 162, 'uni001_cours011', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8124, 162, 'uni001_cours010', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8125, 162, 'uni001_cours009', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8126, 162, 'uni001_cours008', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8127, 162, 'uni001_cours005', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8128, 162, 'uni001_cours004', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8129, 162, 'uni001_cours003', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8130, 162, 'uni001_cours002', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8131, 162, 'uni001_cours001', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8132, 162, 'uni002_Course026', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8133, 162, 'uni002_Course025', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8134, 162, 'uni002_Course023', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8135, 162, 'uni002_Course022', 5, 24, 0, 36);
INSERT INTO `create_plan` VALUES (8136, 162, 'uni002_Course021', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8137, 162, 'uni002_Course020', 5, 56, 0, 36);
INSERT INTO `create_plan` VALUES (8138, 162, 'uni002_Course019', 5, 56, 0, 36);
INSERT INTO `create_plan` VALUES (8139, 162, 'uni002_Course018', 5, 84, 0, 36);
INSERT INTO `create_plan` VALUES (8140, 162, 'uni002_Course017', 5, 84, 0, 36);
INSERT INTO `create_plan` VALUES (8141, 162, 'uni002_CS101', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8142, 162, 'uni002_CS100', 5, 56, 0, 36);
INSERT INTO `create_plan` VALUES (8143, 162, 'uni002_Course015', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8144, 162, 'uni002_Course014', 5, 56, 0, 36);
INSERT INTO `create_plan` VALUES (8145, 162, 'uni002_Course013', 5, 56, 0, 36);
INSERT INTO `create_plan` VALUES (8146, 162, 'uni002_Course011', 5, 35, 0, 36);
INSERT INTO `create_plan` VALUES (8147, 162, 'uni002_Course010', 5, 70, 0, 36);
INSERT INTO `create_plan` VALUES (8148, 162, 'uni002_Course009', 5, 35, 0, 36);
INSERT INTO `create_plan` VALUES (8149, 162, 'uni002_Course008', 5, 35, 0, 36);
INSERT INTO `create_plan` VALUES (8150, 162, 'uni002_Course007', 5, 105, 0, 36);
INSERT INTO `create_plan` VALUES (8151, 162, 'uni002_Course006', 5, 105, 0, 36);
INSERT INTO `create_plan` VALUES (8152, 162, 'uni002_uni002_Course110', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8153, 162, 'uni002_Course005', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8154, 162, 'uni002_Course004', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8155, 162, 'uni002_Course003', 5, 25, 0, 36);
INSERT INTO `create_plan` VALUES (8156, 162, 'uni002_Course002', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8157, 162, 'uni002_Course001', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8158, 162, 'uni003_Course6', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8159, 162, 'uni003_course031', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8160, 162, 'uni003_course030', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8161, 162, 'uni003_course029', 5, 40, 0, 36);
INSERT INTO `create_plan` VALUES (8162, 162, 'uni003_course028', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8163, 162, 'uni003_CS101', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8164, 162, 'uni003_Course5', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8165, 162, 'uni003_Course4', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8166, 162, 'uni003_course026', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8167, 162, 'uni003_course025', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8168, 162, 'uni003_course023', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8169, 162, 'uni003_course022', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8170, 162, 'uni003_CS100', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8171, 162, 'uni003_Course3', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8172, 162, 'uni003_course021', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8173, 162, 'uni003_course020', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8174, 162, 'uni003_course019', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8175, 162, 'uni003_uni002_uni002_Course160', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8176, 162, 'uni003_Course1', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8177, 162, 'uni003_course018', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8178, 162, 'uni003_course017', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8179, 162, 'uni003_course016', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8180, 162, 'uni003_course015', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8181, 162, 'uni003_course014', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8182, 162, 'uni003_course013', 5, 32, 0, 36);
INSERT INTO `create_plan` VALUES (8183, 162, 'uni003_uni002_uni002_Course150', 5, 40, 0, 36);
INSERT INTO `create_plan` VALUES (8184, 162, 'uni003_course012', 5, 40, 0, 36);
INSERT INTO `create_plan` VALUES (8185, 162, 'uni003_course011', 5, 40, 0, 36);
INSERT INTO `create_plan` VALUES (8186, 162, 'uni003_course010', 5, 40, 0, 36);
INSERT INTO `create_plan` VALUES (8187, 162, 'uni003_course009', 5, 40, 0, 36);
INSERT INTO `create_plan` VALUES (8188, 162, 'uni003_course008', 5, 40, 0, 36);
INSERT INTO `create_plan` VALUES (8189, 162, 'uni003_course007', 5, 40, 0, 36);
INSERT INTO `create_plan` VALUES (8190, 162, 'uni003_course006', 5, 40, 0, 36);
INSERT INTO `create_plan` VALUES (8191, 162, 'uni003_course005', 5, 40, 0, 36);
INSERT INTO `create_plan` VALUES (8192, 162, 'uni003_uni002_uni002_Course140', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8193, 162, 'uni003_Course104', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8194, 162, 'uni003_Course01', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8195, 162, 'uni003_course003', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8196, 162, 'uni003_course001', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8197, 162, 'uni004_fac037', 5, 35, 0, 36);
INSERT INTO `create_plan` VALUES (8198, 162, 'uni004_fac036', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8199, 162, 'uni004_fac035', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8200, 162, 'uni004_fac034', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8201, 162, 'uni004_fac033', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8202, 162, 'uni004_fac032', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8203, 162, 'uni004_fac031', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8204, 162, 'uni004_fac030', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8205, 162, 'uni004_fac029', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8206, 162, 'uni004_fac028', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8207, 162, 'uni004_fac027', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8208, 162, 'uni004_Course7', 5, 20, 0, 36);
INSERT INTO `create_plan` VALUES (8209, 162, 'uni004_fac026', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8210, 162, 'uni004_fac025', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8211, 162, 'uni004_fac024', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8212, 162, 'uni004_fac023', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8213, 162, 'uni004_fac022', 5, 56, 0, 36);
INSERT INTO `create_plan` VALUES (8214, 162, 'uni004_fac021', 5, 56, 0, 36);
INSERT INTO `create_plan` VALUES (8215, 162, 'uni004_fac020', 5, 56, 0, 36);
INSERT INTO `create_plan` VALUES (8216, 162, 'uni004_fac019', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8217, 162, 'uni004_fac018', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8218, 162, 'uni004_fac017', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8219, 162, 'uni004_fac016', 5, 105, 0, 36);
INSERT INTO `create_plan` VALUES (8220, 162, 'uni004_fac015', 5, 28, 0, 36);
INSERT INTO `create_plan` VALUES (8221, 162, 'uni004_fac014', 5, 45, 0, 36);
INSERT INTO `create_plan` VALUES (8222, 162, 'uni004_fac013', 5, 45, 0, 36);
INSERT INTO `create_plan` VALUES (8223, 162, 'uni004_fac012', 5, 45, 0, 36);
INSERT INTO `create_plan` VALUES (8224, 162, 'uni004_fac011', 5, 45, 0, 36);
INSERT INTO `create_plan` VALUES (8225, 162, 'uni004_fac010', 5, 45, 0, 36);
INSERT INTO `create_plan` VALUES (8226, 162, 'uni004_fac009', 5, 35, 0, 36);
INSERT INTO `create_plan` VALUES (8227, 162, 'uni004_fac008', 5, 35, 0, 36);
INSERT INTO `create_plan` VALUES (8228, 162, 'uni004_fac007', 5, 45, 0, 36);
INSERT INTO `create_plan` VALUES (8229, 162, 'uni004_fac006', 5, 27, 0, 36);
INSERT INTO `create_plan` VALUES (8230, 162, 'uni004_fac005', 5, 27, 0, 36);
INSERT INTO `create_plan` VALUES (8231, 162, 'uni004_fac004', 5, 27, 0, 36);
INSERT INTO `create_plan` VALUES (8232, 162, 'uni004_fac003', 5, 27, 0, 36);
INSERT INTO `create_plan` VALUES (8233, 162, 'uni004_fac002', 5, 27, 0, 36);
INSERT INTO `create_plan` VALUES (8234, 162, 'uni004_fac001', 5, 27, 0, 36);
INSERT INTO `create_plan` VALUES (8235, 162, 'uni004_fac037', 10, 35, 0, 30);
INSERT INTO `create_plan` VALUES (8236, 162, 'uni004_fac036', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8237, 162, 'uni004_fac035', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8238, 162, 'uni004_fac034', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8239, 162, 'uni004_fac033', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8240, 162, 'uni004_fac032', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8241, 162, 'uni004_fac031', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8242, 162, 'uni004_fac030', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8243, 162, 'uni004_fac029', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8244, 162, 'uni004_fac028', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8245, 162, 'uni004_fac027', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8246, 162, 'uni004_Course7', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8247, 162, 'uni004_fac026', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8248, 162, 'uni004_fac025', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8249, 162, 'uni004_fac024', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8250, 162, 'uni004_fac023', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8251, 162, 'uni004_fac022', 10, 56, 0, 30);
INSERT INTO `create_plan` VALUES (8252, 162, 'uni004_fac021', 10, 56, 0, 30);
INSERT INTO `create_plan` VALUES (8253, 162, 'uni004_fac020', 10, 56, 0, 30);
INSERT INTO `create_plan` VALUES (8254, 162, 'uni004_fac019', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8255, 162, 'uni004_fac018', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8256, 162, 'uni004_fac017', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8257, 162, 'uni004_fac016', 10, 105, 0, 30);
INSERT INTO `create_plan` VALUES (8258, 162, 'uni004_fac015', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8259, 162, 'uni004_fac014', 10, 45, 0, 30);
INSERT INTO `create_plan` VALUES (8260, 162, 'uni004_fac013', 10, 45, 0, 30);
INSERT INTO `create_plan` VALUES (8261, 162, 'uni004_fac012', 10, 45, 0, 30);
INSERT INTO `create_plan` VALUES (8262, 162, 'uni004_fac011', 10, 45, 0, 30);
INSERT INTO `create_plan` VALUES (8263, 162, 'uni004_fac010', 10, 45, 0, 30);
INSERT INTO `create_plan` VALUES (8264, 162, 'uni004_fac009', 10, 35, 0, 30);
INSERT INTO `create_plan` VALUES (8265, 162, 'uni004_fac008', 10, 35, 0, 30);
INSERT INTO `create_plan` VALUES (8266, 162, 'uni004_fac007', 10, 45, 0, 30);
INSERT INTO `create_plan` VALUES (8267, 162, 'uni004_fac006', 10, 27, 0, 30);
INSERT INTO `create_plan` VALUES (8268, 162, 'uni004_fac005', 10, 27, 0, 30);
INSERT INTO `create_plan` VALUES (8269, 162, 'uni004_fac004', 10, 27, 0, 30);
INSERT INTO `create_plan` VALUES (8270, 162, 'uni004_fac003', 10, 27, 0, 30);
INSERT INTO `create_plan` VALUES (8271, 162, 'uni004_fac002', 10, 27, 0, 30);
INSERT INTO `create_plan` VALUES (8272, 162, 'uni004_fac001', 10, 27, 0, 30);
INSERT INTO `create_plan` VALUES (8273, 162, 'uni003_Course6', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8274, 162, 'uni003_course032', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8275, 162, 'uni003_course031', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8276, 162, 'uni003_course030', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8277, 162, 'uni003_course029', 10, 40, 0, 30);
INSERT INTO `create_plan` VALUES (8278, 162, 'uni003_course028', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8279, 162, 'uni003_CS101', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8280, 162, 'uni003_Course5', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8281, 162, 'uni003_Course4', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8282, 162, 'uni003_course026', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8283, 162, 'uni003_course024', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8284, 162, 'uni003_course023', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8285, 162, 'uni003_course022', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8286, 162, 'uni003_CS100', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8287, 162, 'uni003_Course3', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8288, 162, 'uni003_course021', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8289, 162, 'uni003_course019', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8290, 162, 'uni003_uni002_uni002_Course160', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8291, 162, 'uni003_Course1', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8292, 162, 'uni003_course018', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8293, 162, 'uni003_course017', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8294, 162, 'uni003_course016', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8295, 162, 'uni003_course015', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8296, 162, 'uni003_course014', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8297, 162, 'uni003_course013', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8298, 162, 'uni003_uni002_uni002_Course150', 10, 40, 0, 30);
INSERT INTO `create_plan` VALUES (8299, 162, 'uni003_course012', 10, 40, 0, 30);
INSERT INTO `create_plan` VALUES (8300, 162, 'uni003_course011', 10, 40, 0, 30);
INSERT INTO `create_plan` VALUES (8301, 162, 'uni003_course010', 10, 40, 0, 30);
INSERT INTO `create_plan` VALUES (8302, 162, 'uni003_course009', 10, 40, 0, 30);
INSERT INTO `create_plan` VALUES (8303, 162, 'uni003_course008', 10, 40, 0, 30);
INSERT INTO `create_plan` VALUES (8304, 162, 'uni003_course007', 10, 40, 0, 30);
INSERT INTO `create_plan` VALUES (8305, 162, 'uni003_course006', 10, 40, 0, 30);
INSERT INTO `create_plan` VALUES (8306, 162, 'uni003_course005', 10, 40, 0, 30);
INSERT INTO `create_plan` VALUES (8307, 162, 'uni003_uni002_uni002_Course140', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8308, 162, 'uni003_Course104', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8309, 162, 'uni003_Course01', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8310, 162, 'uni003_course003', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8311, 162, 'uni003_course001', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8312, 162, 'uni002_Course026', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8313, 162, 'uni002_Course025', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8314, 162, 'uni002_Course023', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8315, 162, 'uni002_Course022', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8316, 162, 'uni002_Course021', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8317, 162, 'uni002_Course020', 10, 56, 0, 30);
INSERT INTO `create_plan` VALUES (8318, 162, 'uni002_Course019', 10, 56, 0, 30);
INSERT INTO `create_plan` VALUES (8319, 162, 'uni002_Course018', 10, 84, 0, 30);
INSERT INTO `create_plan` VALUES (8320, 162, 'uni002_Course017', 10, 84, 0, 30);
INSERT INTO `create_plan` VALUES (8321, 162, 'uni002_CS101', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8322, 162, 'uni002_CS100', 10, 56, 0, 30);
INSERT INTO `create_plan` VALUES (8323, 162, 'uni002_Course035', 10, 56, 0, 30);
INSERT INTO `create_plan` VALUES (8324, 162, 'uni002_Course015', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8325, 162, 'uni002_Course014', 10, 56, 0, 30);
INSERT INTO `create_plan` VALUES (8326, 162, 'uni002_Course011', 10, 35, 0, 30);
INSERT INTO `create_plan` VALUES (8327, 162, 'uni002_Course010', 10, 70, 0, 30);
INSERT INTO `create_plan` VALUES (8328, 162, 'uni002_Course009', 10, 35, 0, 30);
INSERT INTO `create_plan` VALUES (8329, 162, 'uni002_Course008', 10, 35, 0, 30);
INSERT INTO `create_plan` VALUES (8330, 162, 'uni002_Course007', 10, 105, 0, 30);
INSERT INTO `create_plan` VALUES (8331, 162, 'uni002_Course006', 10, 105, 0, 30);
INSERT INTO `create_plan` VALUES (8332, 162, 'uni002_uni002_Course110', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8333, 162, 'uni002_Course005', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8334, 162, 'uni002_Course004', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8335, 162, 'uni002_Course003', 10, 25, 0, 30);
INSERT INTO `create_plan` VALUES (8336, 162, 'uni002_Course002', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8337, 162, 'uni002_Course001', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8338, 162, 'uni001_doc031', 10, 72, 0, 30);
INSERT INTO `create_plan` VALUES (8339, 162, 'uni001_Course13', 10, 60, 0, 30);
INSERT INTO `create_plan` VALUES (8340, 162, 'uni001_cours042', 10, 40, 0, 30);
INSERT INTO `create_plan` VALUES (8341, 162, 'uni001_CS102', 10, 8, 0, 30);
INSERT INTO `create_plan` VALUES (8342, 162, 'uni001_cours106', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8343, 162, 'uni001_cours105', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8344, 162, 'uni001_cours104', 10, 8, 0, 30);
INSERT INTO `create_plan` VALUES (8345, 162, 'uni001_cours103', 10, 8, 0, 30);
INSERT INTO `create_plan` VALUES (8346, 162, 'uni001_cours102', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8347, 162, 'uni001_Course30', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8348, 162, 'uni001_Course21', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8349, 162, 'uni001_cours100', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8350, 162, 'uni001_cours099', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8351, 162, 'uni001_cours098', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8352, 162, 'uni001_Course19', 10, 27, 0, 30);
INSERT INTO `create_plan` VALUES (8353, 162, 'uni001_cours097', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8354, 162, 'uni001_cours096', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8355, 162, 'uni001_cours095', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8356, 162, 'uni001_cours094', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8357, 162, 'uni001_cours093', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8358, 162, 'uni001_cours092', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8359, 162, 'uni001_cours091', 10, 56, 0, 30);
INSERT INTO `create_plan` VALUES (8360, 162, 'uni001_cours090', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8361, 162, 'uni001_cours089', 10, 56, 0, 30);
INSERT INTO `create_plan` VALUES (8362, 162, 'uni001_cours088', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8363, 162, 'uni001_cours087', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8364, 162, 'uni001_cours086', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8365, 162, 'uni001_cours085', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8366, 162, 'uni001_cours084', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8367, 162, 'uni001_cours083', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8368, 162, 'uni001_cours082', 10, 40, 0, 30);
INSERT INTO `create_plan` VALUES (8369, 162, 'uni001_cours081', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8370, 162, 'uni001_cours080', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8371, 162, 'uni001_cours079', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8372, 162, 'uni001_cours078', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8373, 162, 'uni001_cours077', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8374, 162, 'uni001_Course56', 10, 64, 0, 30);
INSERT INTO `create_plan` VALUES (8375, 162, 'uni001_Course17', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8376, 162, 'uni001_Course15', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8377, 162, 'uni001_cours076', 10, 64, 0, 30);
INSERT INTO `create_plan` VALUES (8378, 162, 'uni001_cours075', 10, 64, 0, 30);
INSERT INTO `create_plan` VALUES (8379, 162, 'uni001_cours074', 10, 64, 0, 30);
INSERT INTO `create_plan` VALUES (8380, 162, 'uni001_cours073', 10, 64, 0, 30);
INSERT INTO `create_plan` VALUES (8381, 162, 'uni001_cours072', 10, 64, 0, 30);
INSERT INTO `create_plan` VALUES (8382, 162, 'uni001_cours071', 10, 64, 0, 30);
INSERT INTO `create_plan` VALUES (8383, 162, 'uni001_cours070', 10, 64, 0, 30);
INSERT INTO `create_plan` VALUES (8384, 162, 'uni001_cours069', 10, 64, 0, 30);
INSERT INTO `create_plan` VALUES (8385, 162, 'uni001_cours068', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8386, 162, 'uni001_cours067', 10, 64, 0, 30);
INSERT INTO `create_plan` VALUES (8387, 162, 'uni001_cours066', 10, 64, 0, 30);
INSERT INTO `create_plan` VALUES (8388, 162, 'uni001_cours064', 10, 64, 0, 30);
INSERT INTO `create_plan` VALUES (8389, 162, 'uni001_cours063', 10, 64, 0, 30);
INSERT INTO `create_plan` VALUES (8390, 162, 'uni001_Course14', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8391, 162, 'uni001_cours062', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8392, 162, 'uni001_cours061', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8393, 162, 'uni001_cours060', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8394, 162, 'uni001_cours058', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8395, 162, 'uni001_cours057', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8396, 162, 'uni001_cours056', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8397, 162, 'uni001_cours055', 10, 28, 0, 30);
INSERT INTO `create_plan` VALUES (8398, 162, 'uni001_cours054', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8399, 162, 'uni001_cours053', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8400, 162, 'uni001_cours052', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8401, 162, 'uni001_cours051', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8402, 162, 'uni001_cours050', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8403, 162, 'uni001_cours049', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8404, 162, 'uni001_cours048', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8405, 162, 'uni001_cours047', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8406, 162, 'uni001_cours046', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8407, 162, 'uni001_cours045', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8408, 162, 'uni001_cours044', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8409, 162, 'uni001_Course8', 10, 30, 0, 30);
INSERT INTO `create_plan` VALUES (8410, 162, 'uni001_Course12', 10, 60, 0, 30);
INSERT INTO `create_plan` VALUES (8411, 162, 'uni001_Course11', 10, 60, 0, 30);
INSERT INTO `create_plan` VALUES (8412, 162, 'uni001_cours041', 10, 60, 0, 30);
INSERT INTO `create_plan` VALUES (8413, 162, 'uni001_cours040', 10, 60, 0, 30);
INSERT INTO `create_plan` VALUES (8414, 162, 'uni001_cours039', 10, 60, 0, 30);
INSERT INTO `create_plan` VALUES (8415, 162, 'uni001_cours038', 10, 60, 0, 30);
INSERT INTO `create_plan` VALUES (8416, 162, 'uni001_cours037', 10, 60, 0, 30);
INSERT INTO `create_plan` VALUES (8417, 162, 'uni001_cours036', 10, 60, 0, 30);
INSERT INTO `create_plan` VALUES (8418, 162, 'uni001_cours035', 10, 60, 0, 30);
INSERT INTO `create_plan` VALUES (8419, 162, 'uni001_cours034', 10, 60, 0, 30);
INSERT INTO `create_plan` VALUES (8420, 162, 'uni001_cours033', 10, 60, 0, 30);
INSERT INTO `create_plan` VALUES (8421, 162, 'uni001_cours032', 10, 60, 0, 30);
INSERT INTO `create_plan` VALUES (8422, 162, 'uni001_Course9', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8423, 162, 'uni001_Course10', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8424, 162, 'uni001_cours031', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8425, 162, 'uni001_cours030', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8426, 162, 'uni001_cours029', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8427, 162, 'uni001_cours028', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8428, 162, 'uni001_cours026', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8429, 162, 'uni001_cours025', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8430, 162, 'uni001_cours024', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8431, 162, 'uni001_cours023', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8432, 162, 'uni001_CS101', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8433, 162, 'uni001_cours022', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8434, 162, 'uni001_cours021', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8435, 162, 'uni001_cours020', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8436, 162, 'uni001_cours019', 10, 40, 0, 30);
INSERT INTO `create_plan` VALUES (8437, 162, 'uni001_cours018', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8438, 162, 'uni001_cours017', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8439, 162, 'uni001_cours016', 10, 48, 0, 30);
INSERT INTO `create_plan` VALUES (8440, 162, 'uni001_cours015', 10, 150, 0, 30);
INSERT INTO `create_plan` VALUES (8441, 162, 'uni001_cours014', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8442, 162, 'uni001_cours013', 10, 24, 0, 30);
INSERT INTO `create_plan` VALUES (8443, 162, 'uni001_cours012', 10, 32, 0, 30);
INSERT INTO `create_plan` VALUES (8444, 162, 'uni001_CS100', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8445, 162, 'uni001_cours011', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8446, 162, 'uni001_cours010', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8447, 162, 'uni001_cours009', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8448, 162, 'uni001_cours008', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8449, 162, 'uni001_cours005', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8450, 162, 'uni001_cours004', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8451, 162, 'uni001_cours003', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8452, 162, 'uni001_cours002', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8453, 162, 'uni001_cours001', 10, 20, 0, 30);
INSERT INTO `create_plan` VALUES (8454, 162, 'uni076_CS004', 17, 80, 0, 40);
INSERT INTO `create_plan` VALUES (8455, 162, 'uni076_CS003', 17, 70, 0, 40);
INSERT INTO `create_plan` VALUES (8456, 162, 'uni076_CS001', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8457, 162, 'uni075_CS040', 17, 25, 0, 40);
INSERT INTO `create_plan` VALUES (8458, 162, 'uni075_CS039', 17, 18, 0, 40);
INSERT INTO `create_plan` VALUES (8459, 162, 'uni075_CS038', 17, 50, 0, 40);
INSERT INTO `create_plan` VALUES (8460, 162, 'uni075_CS037', 17, 60, 0, 40);
INSERT INTO `create_plan` VALUES (8461, 162, 'uni075_CS036', 17, 50, 0, 40);
INSERT INTO `create_plan` VALUES (8462, 162, 'uni075_CS035', 17, 30, 0, 40);
INSERT INTO `create_plan` VALUES (8463, 162, 'uni075_CS034', 17, 31, 0, 40);
INSERT INTO `create_plan` VALUES (8464, 162, 'uni075_CS033', 17, 31, 0, 40);
INSERT INTO `create_plan` VALUES (8465, 162, 'uni075_CS032', 17, 90, 0, 40);
INSERT INTO `create_plan` VALUES (8466, 162, 'uni075_CS031', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8467, 162, 'uni075_CS030', 17, 65, 0, 40);
INSERT INTO `create_plan` VALUES (8468, 162, 'uni075_CS029', 17, 76, 0, 40);
INSERT INTO `create_plan` VALUES (8469, 162, 'uni075_CS028', 17, 45, 0, 40);
INSERT INTO `create_plan` VALUES (8470, 162, 'uni075_CS027', 17, 39, 0, 40);
INSERT INTO `create_plan` VALUES (8471, 162, 'uni075_CS026', 17, 69, 0, 40);
INSERT INTO `create_plan` VALUES (8472, 162, 'uni075_CS025', 17, 43, 0, 40);
INSERT INTO `create_plan` VALUES (8473, 162, 'uni075_CS024', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8474, 162, 'uni075_CS023', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8475, 162, 'uni075_CS021', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8476, 162, 'uni075_CS020', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8477, 162, 'uni075_CS019', 17, 50, 0, 40);
INSERT INTO `create_plan` VALUES (8478, 162, 'uni075_CS018', 17, 44, 0, 40);
INSERT INTO `create_plan` VALUES (8479, 162, 'uni075_CS017', 17, 58, 0, 40);
INSERT INTO `create_plan` VALUES (8480, 162, 'uni075_CS016', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8481, 162, 'uni075_CS015', 17, 49, 0, 40);
INSERT INTO `create_plan` VALUES (8482, 162, 'uni075_CS013', 17, 29, 0, 40);
INSERT INTO `create_plan` VALUES (8483, 162, 'uni075_CS011', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8484, 162, 'uni075_CS010', 17, 38, 0, 40);
INSERT INTO `create_plan` VALUES (8485, 162, 'uni075_CS009', 17, 39, 0, 40);
INSERT INTO `create_plan` VALUES (8486, 162, 'uni075_CS042', 17, 120, 0, 40);
INSERT INTO `create_plan` VALUES (8487, 162, 'uni075_CS008', 17, 60, 0, 40);
INSERT INTO `create_plan` VALUES (8488, 162, 'uni074_cs064', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8489, 162, 'uni074_CS063', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8490, 162, 'uni074_CS062', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8491, 162, 'uni074_CS061', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8492, 162, 'uni074_CS060', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8493, 162, 'uni074_CS059', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8494, 162, 'uni074_CS058', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8495, 162, 'uni074_CS057', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8496, 162, 'uni074_CS056', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8497, 162, 'uni074_CS055', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8498, 162, 'uni073_CS053', 17, 30, 0, 40);
INSERT INTO `create_plan` VALUES (8499, 162, 'uni073_CS052', 17, 30, 0, 40);
INSERT INTO `create_plan` VALUES (8500, 162, 'uni073_CS051', 17, 30, 0, 40);
INSERT INTO `create_plan` VALUES (8501, 162, 'uni073_CS050', 17, 35, 0, 40);
INSERT INTO `create_plan` VALUES (8502, 162, 'uni073_CS049', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8503, 162, 'uni073_CS048', 17, 70, 0, 40);
INSERT INTO `create_plan` VALUES (8504, 162, 'uni073_CS047', 17, 70, 0, 40);
INSERT INTO `create_plan` VALUES (8505, 162, 'uni073_CS046', 17, 35, 0, 40);
INSERT INTO `create_plan` VALUES (8506, 162, 'uni073_CS045', 17, 70, 0, 40);
INSERT INTO `create_plan` VALUES (8507, 162, 'uni073_CS044', 17, 70, 0, 40);
INSERT INTO `create_plan` VALUES (8508, 162, 'uni072_CS003', 17, 35, 0, 40);
INSERT INTO `create_plan` VALUES (8509, 162, 'uni072_CS002', 17, 35, 0, 40);
INSERT INTO `create_plan` VALUES (8510, 162, 'uni072_CS001', 17, 35, 0, 40);
INSERT INTO `create_plan` VALUES (8511, 162, 'uni004_fac037', 17, 35, 0, 40);
INSERT INTO `create_plan` VALUES (8512, 162, 'uni004_fac036', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8513, 162, 'uni004_fac035', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8514, 162, 'uni004_fac034', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8515, 162, 'uni004_fac033', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8516, 162, 'uni004_fac032', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8517, 162, 'uni004_fac031', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8518, 162, 'uni004_fac030', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8519, 162, 'uni004_fac029', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8520, 162, 'uni004_fac028', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8521, 162, 'uni004_fac027', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8522, 162, 'uni004_Course7', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8523, 162, 'uni004_fac026', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8524, 162, 'uni004_fac025', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8525, 162, 'uni004_fac024', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8526, 162, 'uni004_fac023', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8527, 162, 'uni004_fac022', 17, 56, 0, 40);
INSERT INTO `create_plan` VALUES (8528, 162, 'uni004_fac021', 17, 56, 0, 40);
INSERT INTO `create_plan` VALUES (8529, 162, 'uni004_fac020', 17, 56, 0, 40);
INSERT INTO `create_plan` VALUES (8530, 162, 'uni004_fac019', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8531, 162, 'uni004_fac018', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8532, 162, 'uni004_fac017', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8533, 162, 'uni004_fac016', 17, 105, 0, 40);
INSERT INTO `create_plan` VALUES (8534, 162, 'uni004_fac015', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8535, 162, 'uni004_fac014', 17, 45, 0, 40);
INSERT INTO `create_plan` VALUES (8536, 162, 'uni004_fac013', 17, 45, 0, 40);
INSERT INTO `create_plan` VALUES (8537, 162, 'uni004_fac012', 17, 45, 0, 40);
INSERT INTO `create_plan` VALUES (8538, 162, 'uni004_fac011', 17, 45, 0, 40);
INSERT INTO `create_plan` VALUES (8539, 162, 'uni004_fac010', 17, 45, 0, 40);
INSERT INTO `create_plan` VALUES (8540, 162, 'uni004_fac009', 17, 35, 0, 40);
INSERT INTO `create_plan` VALUES (8541, 162, 'uni004_fac008', 17, 35, 0, 40);
INSERT INTO `create_plan` VALUES (8542, 162, 'uni004_fac007', 17, 45, 0, 40);
INSERT INTO `create_plan` VALUES (8543, 162, 'uni004_fac006', 17, 27, 0, 40);
INSERT INTO `create_plan` VALUES (8544, 162, 'uni004_fac005', 17, 27, 0, 40);
INSERT INTO `create_plan` VALUES (8545, 162, 'uni004_fac004', 17, 27, 0, 40);
INSERT INTO `create_plan` VALUES (8546, 162, 'uni004_fac003', 17, 27, 0, 40);
INSERT INTO `create_plan` VALUES (8547, 162, 'uni004_fac002', 17, 27, 0, 40);
INSERT INTO `create_plan` VALUES (8548, 162, 'uni004_fac001', 17, 27, 0, 40);
INSERT INTO `create_plan` VALUES (8549, 162, 'uni003_Course6', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8550, 162, 'uni003_course032', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8551, 162, 'uni003_course031', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8552, 162, 'uni003_course030', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8553, 162, 'uni003_course029', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8554, 162, 'uni003_course028', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8555, 162, 'uni003_CS101', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8556, 162, 'uni003_Course5', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8557, 162, 'uni003_Course4', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8558, 162, 'uni003_course026', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8559, 162, 'uni003_course024', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8560, 162, 'uni003_course023', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8561, 162, 'uni003_course022', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8562, 162, 'uni003_CS100', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8563, 162, 'uni003_Course3', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8564, 162, 'uni003_course021', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8565, 162, 'uni003_course019', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8566, 162, 'uni003_uni002_uni002_Course160', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8567, 162, 'uni003_Course1', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8568, 162, 'uni003_course018', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8569, 162, 'uni003_course017', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8570, 162, 'uni003_course016', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8571, 162, 'uni003_course014', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8572, 162, 'uni003_course013', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8573, 162, 'uni003_uni002_uni002_Course150', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8574, 162, 'uni003_course012', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8575, 162, 'uni003_course011', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8576, 162, 'uni003_course010', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8577, 162, 'uni003_course009', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8578, 162, 'uni003_course008', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8579, 162, 'uni003_course007', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8580, 162, 'uni003_course006', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8581, 162, 'uni003_course005', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8582, 162, 'uni003_uni002_uni002_Course140', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8583, 162, 'uni003_Course104', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8584, 162, 'uni003_Course01', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8585, 162, 'uni003_course003', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8586, 162, 'uni003_course001', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8587, 162, 'uni002_Course026', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8588, 162, 'uni002_Course025', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8589, 162, 'uni002_Course023', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8590, 162, 'uni002_Course022', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8591, 162, 'uni002_Course021', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8592, 162, 'uni002_Course020', 17, 56, 0, 40);
INSERT INTO `create_plan` VALUES (8593, 162, 'uni002_Course019', 17, 56, 0, 40);
INSERT INTO `create_plan` VALUES (8594, 162, 'uni002_Course018', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8595, 162, 'uni002_Course017', 17, 84, 0, 40);
INSERT INTO `create_plan` VALUES (8596, 162, 'uni002_CS101', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8597, 162, 'uni002_CS100', 17, 56, 0, 40);
INSERT INTO `create_plan` VALUES (8598, 162, 'uni002_Course015', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8599, 162, 'uni002_Course014', 17, 56, 0, 40);
INSERT INTO `create_plan` VALUES (8600, 162, 'uni002_Course013', 17, 56, 0, 40);
INSERT INTO `create_plan` VALUES (8601, 162, 'uni002_Course011', 17, 35, 0, 40);
INSERT INTO `create_plan` VALUES (8602, 162, 'uni002_Course010', 17, 70, 0, 40);
INSERT INTO `create_plan` VALUES (8603, 162, 'uni002_Course009', 17, 35, 0, 40);
INSERT INTO `create_plan` VALUES (8604, 162, 'uni002_Course008', 17, 35, 0, 40);
INSERT INTO `create_plan` VALUES (8605, 162, 'uni002_Course007', 17, 105, 0, 40);
INSERT INTO `create_plan` VALUES (8606, 162, 'uni002_Course006', 17, 105, 0, 40);
INSERT INTO `create_plan` VALUES (8607, 162, 'uni002_uni002_Course110', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8608, 162, 'uni002_Course005', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8609, 162, 'uni002_Course004', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8610, 162, 'uni002_Course003', 17, 25, 0, 40);
INSERT INTO `create_plan` VALUES (8611, 162, 'uni002_Course002', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8612, 162, 'uni002_Course001', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8613, 162, 'uni001_doc031', 17, 72, 0, 40);
INSERT INTO `create_plan` VALUES (8614, 162, 'uni001_Course13', 17, 60, 0, 40);
INSERT INTO `create_plan` VALUES (8615, 162, 'uni001_cours042', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8616, 162, 'uni001_CS102', 17, 8, 0, 40);
INSERT INTO `create_plan` VALUES (8617, 162, 'uni001_cours106', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8618, 162, 'uni001_cours105', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8619, 162, 'uni001_cours104', 17, 8, 0, 40);
INSERT INTO `create_plan` VALUES (8620, 162, 'uni001_cours103', 17, 8, 0, 40);
INSERT INTO `create_plan` VALUES (8621, 162, 'uni001_cours102', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8622, 162, 'uni001_Course30', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8623, 162, 'uni001_Course21', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8624, 162, 'uni001_cours100', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8625, 162, 'uni001_cours099', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8626, 162, 'uni001_cours098', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8627, 162, 'uni001_Course19', 17, 27, 0, 40);
INSERT INTO `create_plan` VALUES (8628, 162, 'uni001_cours097', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8629, 162, 'uni001_cours096', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8630, 162, 'uni001_cours095', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8631, 162, 'uni001_cours094', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8632, 162, 'uni001_cours093', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8633, 162, 'uni001_cours092', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8634, 162, 'uni001_cours091', 17, 56, 0, 40);
INSERT INTO `create_plan` VALUES (8635, 162, 'uni001_cours090', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8636, 162, 'uni001_cours089', 17, 56, 0, 40);
INSERT INTO `create_plan` VALUES (8637, 162, 'uni001_cours088', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8638, 162, 'uni001_cours087', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8639, 162, 'uni001_cours086', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8640, 162, 'uni001_cours085', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8641, 162, 'uni001_cours084', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8642, 162, 'uni001_cours083', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8643, 162, 'uni001_cours082', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8644, 162, 'uni001_cours081', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8645, 162, 'uni001_cours080', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8646, 162, 'uni001_cours079', 17, 28, 0, 40);
INSERT INTO `create_plan` VALUES (8647, 162, 'uni001_cours078', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8648, 162, 'uni001_cours077', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8649, 162, 'uni001_Course17', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8650, 162, 'uni001_Course15', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8651, 162, 'uni001_cours076', 17, 64, 0, 40);
INSERT INTO `create_plan` VALUES (8652, 162, 'uni001_cours075', 17, 64, 0, 40);
INSERT INTO `create_plan` VALUES (8653, 162, 'uni001_cours074', 17, 64, 0, 40);
INSERT INTO `create_plan` VALUES (8654, 162, 'uni001_cours073', 17, 64, 0, 40);
INSERT INTO `create_plan` VALUES (8655, 162, 'uni001_cours072', 17, 64, 0, 40);
INSERT INTO `create_plan` VALUES (8656, 162, 'uni001_cours071', 17, 64, 0, 40);
INSERT INTO `create_plan` VALUES (8657, 162, 'uni001_cours070', 17, 64, 0, 40);
INSERT INTO `create_plan` VALUES (8658, 162, 'uni001_cours069', 17, 64, 0, 40);
INSERT INTO `create_plan` VALUES (8659, 162, 'uni001_cours068', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8660, 162, 'uni001_cours067', 17, 64, 0, 40);
INSERT INTO `create_plan` VALUES (8661, 162, 'uni001_cours066', 17, 64, 0, 40);
INSERT INTO `create_plan` VALUES (8662, 162, 'uni001_cours065', 17, 64, 0, 40);
INSERT INTO `create_plan` VALUES (8663, 162, 'uni001_cours064', 17, 64, 0, 40);
INSERT INTO `create_plan` VALUES (8664, 162, 'uni001_cours063', 17, 64, 0, 40);
INSERT INTO `create_plan` VALUES (8665, 162, 'uni001_Course14', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8666, 162, 'uni001_cours062', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8667, 162, 'uni001_cours061', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8668, 162, 'uni001_cours060', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8669, 162, 'uni001_cours058', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8670, 162, 'uni001_cours057', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8671, 162, 'uni001_cours056', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8672, 162, 'uni001_cours055', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8673, 162, 'uni001_cours054', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8674, 162, 'uni001_cours053', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8675, 162, 'uni001_cours052', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8676, 162, 'uni001_cours051', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8677, 162, 'uni001_cours050', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8678, 162, 'uni001_cours049', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8679, 162, 'uni001_cours048', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8680, 162, 'uni001_cours047', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8681, 162, 'uni001_cours046', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8682, 162, 'uni001_cours045', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8683, 162, 'uni001_cours044', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8684, 162, 'uni001_Course8', 17, 30, 0, 40);
INSERT INTO `create_plan` VALUES (8685, 162, 'uni001_Course12', 17, 60, 0, 40);
INSERT INTO `create_plan` VALUES (8686, 162, 'uni001_Course11', 17, 60, 0, 40);
INSERT INTO `create_plan` VALUES (8687, 162, 'uni001_cours041', 17, 60, 0, 40);
INSERT INTO `create_plan` VALUES (8688, 162, 'uni001_cours040', 17, 60, 0, 40);
INSERT INTO `create_plan` VALUES (8689, 162, 'uni001_cours039', 17, 60, 0, 40);
INSERT INTO `create_plan` VALUES (8690, 162, 'uni001_cours038', 17, 60, 0, 40);
INSERT INTO `create_plan` VALUES (8691, 162, 'uni001_cours037', 17, 60, 0, 40);
INSERT INTO `create_plan` VALUES (8692, 162, 'uni001_cours036', 17, 60, 0, 40);
INSERT INTO `create_plan` VALUES (8693, 162, 'uni001_cours035', 17, 60, 0, 40);
INSERT INTO `create_plan` VALUES (8694, 162, 'uni001_cours034', 17, 60, 0, 40);
INSERT INTO `create_plan` VALUES (8695, 162, 'uni001_cours033', 17, 60, 0, 40);
INSERT INTO `create_plan` VALUES (8696, 162, 'uni001_cours032', 17, 60, 0, 40);
INSERT INTO `create_plan` VALUES (8697, 162, 'uni001_Course9', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8698, 162, 'uni001_Course10', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8699, 162, 'uni001_cours031', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8700, 162, 'uni001_cours030', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8701, 162, 'uni001_cours029', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8702, 162, 'uni001_cours028', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8703, 162, 'uni001_cours026', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8704, 162, 'uni001_cours025', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8705, 162, 'uni001_cours024', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8706, 162, 'uni001_cours023', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8707, 162, 'uni001_CS101', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8708, 162, 'uni001_cours022', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8709, 162, 'uni001_cours021', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8710, 162, 'uni001_cours020', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8711, 162, 'uni001_cours019', 17, 40, 0, 40);
INSERT INTO `create_plan` VALUES (8712, 162, 'uni001_cours018', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8713, 162, 'uni001_cours017', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8714, 162, 'uni001_cours016', 17, 48, 0, 40);
INSERT INTO `create_plan` VALUES (8715, 162, 'uni001_cours015', 17, 150, 0, 40);
INSERT INTO `create_plan` VALUES (8716, 162, 'uni001_cours014', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8717, 162, 'uni001_cours013', 17, 24, 0, 40);
INSERT INTO `create_plan` VALUES (8718, 162, 'uni001_cours012', 17, 32, 0, 40);
INSERT INTO `create_plan` VALUES (8719, 162, 'uni001_CS100', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8720, 162, 'uni001_cours011', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8721, 162, 'uni001_cours010', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8722, 162, 'uni001_cours009', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8723, 162, 'uni001_cours008', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8724, 162, 'uni001_cours005', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8725, 162, 'uni001_cours004', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8726, 162, 'uni001_cours003', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8727, 162, 'uni001_cours002', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8728, 162, 'uni001_cours001', 17, 20, 0, 40);
INSERT INTO `create_plan` VALUES (8729, 162, 'uni003_CS101', 24, 32, 0, 35);
INSERT INTO `create_plan` VALUES (8730, 162, 'uni001_CS102', 24, 8, 0, 35);
INSERT INTO `create_plan` VALUES (8731, 162, 'uni001_CS101', 24, 24, 0, 35);
INSERT INTO `create_plan` VALUES (8732, 162, 'uni001_CS100', 24, 20, 0, 35);
INSERT INTO `create_plan` VALUES (8733, 162, 'uni003_CS101', 25, 32, 0, 28);
INSERT INTO `create_plan` VALUES (8734, 162, 'uni001_CS102', 25, 8, 0, 28);
INSERT INTO `create_plan` VALUES (8735, 162, 'uni001_CS101', 25, 24, 0, 28);
INSERT INTO `create_plan` VALUES (8736, 162, 'uni001_CS100', 25, 20, 0, 28);
INSERT INTO `create_plan` VALUES (8737, 162, 'uni003_CS101', 8, 32, 0, 29);
INSERT INTO `create_plan` VALUES (8738, 162, 'uni001_CS102', 8, 8, 0, 29);
INSERT INTO `create_plan` VALUES (8739, 162, 'uni001_CS101', 8, 24, 0, 29);
INSERT INTO `create_plan` VALUES (8740, 162, 'uni001_CS100', 8, 20, 0, 29);
INSERT INTO `create_plan` VALUES (8741, 162, 'uni003_CS101', 9, 32, 0, 31);
INSERT INTO `create_plan` VALUES (8742, 162, 'uni001_CS102', 9, 8, 0, 31);
INSERT INTO `create_plan` VALUES (8743, 162, 'uni001_CS101', 9, 24, 0, 31);
INSERT INTO `create_plan` VALUES (8744, 162, 'uni001_CS100', 9, 20, 0, 31);
INSERT INTO `create_plan` VALUES (8745, 162, 'uni077_CS007', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8746, 162, 'uni077_CS006', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8747, 162, 'uni077_CS005', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8748, 162, 'uni077_CS004', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8749, 162, 'uni077_CS003', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8750, 162, 'uni077_CS002', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8751, 162, 'uni077_CS001', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8752, 162, 'uni076_CS004', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8753, 162, 'uni076_CS003', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8754, 162, 'uni076_CS002', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8755, 162, 'uni076_CS001', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8756, 162, 'uni075_CS040', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8757, 162, 'uni075_CS039', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8758, 162, 'uni075_CS038', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8759, 162, 'uni075_CS037', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8760, 162, 'uni075_CS036', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8761, 162, 'uni075_CS035', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8762, 162, 'uni075_CS034', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8763, 162, 'uni075_CS033', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8764, 162, 'uni075_CS032', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8765, 162, 'uni075_CS031', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8766, 162, 'uni075_CS030', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8767, 162, 'uni075_CS029', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8768, 162, 'uni075_CS028', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8769, 162, 'uni075_CS027', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8770, 162, 'uni075_CS026', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8771, 162, 'uni075_CS025', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8772, 162, 'uni075_CS024', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8773, 162, 'uni075_CS023', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8774, 162, 'uni075_CS021', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8775, 162, 'uni075_CS020', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8776, 162, 'uni075_CS019', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8777, 162, 'uni075_CS018', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8778, 162, 'uni075_CS017', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8779, 162, 'uni075_CS016', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8780, 162, 'uni075_CS015', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8781, 162, 'uni075_CS013', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8782, 162, 'uni075_CS011', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8783, 162, 'uni075_CS010', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8784, 162, 'uni075_CS009', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8785, 162, 'uni075_CS042', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8786, 162, 'uni075_CS008', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8787, 162, 'uni075_CS041', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8788, 162, 'uni075_CS007', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8789, 162, 'uni075_CS006', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8790, 162, 'uni075_CS005', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8791, 162, 'uni075_CS004', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8792, 162, 'uni075_CS003', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8793, 162, 'uni075_CS002', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8794, 162, 'uni075_CS001', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8795, 162, 'uni074_cs064', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8796, 162, 'uni074_CS063', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8797, 162, 'uni074_CS062', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8798, 162, 'uni074_CS061', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8799, 162, 'uni074_CS060', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8800, 162, 'uni074_CS059', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8801, 162, 'uni074_CS058', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8802, 162, 'uni074_CS057', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8803, 162, 'uni074_CS056', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8804, 162, 'uni074_CS055', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8805, 162, 'uni073_CS053', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8806, 162, 'uni073_CS052', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8807, 162, 'uni073_CS051', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8808, 162, 'uni073_CS050', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8809, 162, 'uni073_CS049', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8810, 162, 'uni073_CS048', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8811, 162, 'uni073_CS047', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8812, 162, 'uni073_CS046', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8813, 162, 'uni073_CS045', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8814, 162, 'uni073_CS044', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8815, 162, 'uni073_CS043', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8816, 162, 'uni072_CS005', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8817, 162, 'uni072_CS004', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8818, 162, 'uni072_CS003', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8819, 162, 'uni072_CS002', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8820, 162, 'uni072_CS001', 3, 2, 0, 11);
INSERT INTO `create_plan` VALUES (8821, 162, 'uni004_fac037', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8822, 162, 'uni004_fac036', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8823, 162, 'uni004_fac035', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8824, 162, 'uni004_fac034', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8825, 162, 'uni004_fac033', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8826, 162, 'uni004_fac032', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8827, 162, 'uni004_fac031', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8828, 162, 'uni004_fac030', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8829, 162, 'uni004_fac029', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8830, 162, 'uni004_fac028', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8831, 162, 'uni004_fac027', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8832, 162, 'uni004_Course7', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8833, 162, 'uni004_fac026', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8834, 162, 'uni004_fac025', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8835, 162, 'uni004_fac024', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8836, 162, 'uni004_fac023', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8837, 162, 'uni004_fac022', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8838, 162, 'uni004_fac021', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8839, 162, 'uni004_fac020', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8840, 162, 'uni004_fac019', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8841, 162, 'uni004_fac018', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8842, 162, 'uni004_fac017', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8843, 162, 'uni004_fac016', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8844, 162, 'uni004_fac015', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8845, 162, 'uni004_fac038', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8846, 162, 'uni004_fac014', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8847, 162, 'uni004_fac013', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8848, 162, 'uni004_fac012', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8849, 162, 'uni004_fac011', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8850, 162, 'uni004_fac010', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8851, 162, 'uni004_fac009', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8852, 162, 'uni004_fac008', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8853, 162, 'uni004_fac007', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8854, 162, 'uni004_fac006', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8855, 162, 'uni004_fac005', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8856, 162, 'uni004_fac004', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8857, 162, 'uni004_fac003', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8858, 162, 'uni004_fac002', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8859, 162, 'uni004_fac001', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8860, 162, 'uni003_Course116', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8861, 162, 'uni003_Course115', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8862, 162, 'uni003_Course114', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8863, 162, 'uni003_Course113', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8864, 162, 'uni003_Course112', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8865, 162, 'uni003_Course111', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8866, 162, 'uni003_Course110', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8867, 162, 'uni003_Course109', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8868, 162, 'uni003_Course6', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8869, 162, 'uni003_course032', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8870, 162, 'uni003_course031', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8871, 162, 'uni003_course030', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8872, 162, 'uni003_course029', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8873, 162, 'uni003_course028', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8874, 162, 'uni003_CS101', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8875, 162, 'uni003_Course94', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8876, 162, 'uni003_Course5', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8877, 162, 'uni003_Course4', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8878, 162, 'uni003_Course156', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8879, 162, 'uni003_course026', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8880, 162, 'uni003_course025', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8881, 162, 'uni003_course024', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8882, 162, 'uni003_course023', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8883, 162, 'uni003_course022', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8884, 162, 'uni003_CS100', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8885, 162, 'uni003_Course97', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8886, 162, 'uni003_Course3', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8887, 162, 'uni003_Course2', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8888, 162, 'uni003_course021', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8889, 162, 'uni003_course020', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8890, 162, 'uni003_course019', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8891, 162, 'uni003_uni002_uni002_Course160', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8892, 162, 'uni003_Course1', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8893, 162, 'uni003_course018', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8894, 162, 'uni003_course017', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8895, 162, 'uni003_course016', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8896, 162, 'uni003_course015', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8897, 162, 'uni003_course014', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8898, 162, 'uni003_course013', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8899, 162, 'uni003_uni002_uni002_Course150', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8900, 162, 'uni003_Course91', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8901, 162, 'uni003_course012', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8902, 162, 'uni003_course011', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8903, 162, 'uni003_course010', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8904, 162, 'uni003_course009', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8905, 162, 'uni003_course008', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8906, 162, 'uni003_course007', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8907, 162, 'uni003_course006', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8908, 162, 'uni003_course005', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8909, 162, 'uni003_uni002_uni002_Course140', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8910, 162, 'uni003_Course104', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8911, 162, 'uni003_Course01', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8912, 162, 'uni003_course004', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8913, 162, 'uni003_course003', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8914, 162, 'uni003_course002', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8915, 162, 'uni003_course001', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8916, 162, 'uni002_Course026', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8917, 162, 'uni002_Course025', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8918, 162, 'uni002_Course024', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8919, 162, 'uni002_Course023', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8920, 162, 'uni002_Course022', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8921, 162, 'uni002_Course021', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8922, 162, 'uni002_Course020', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8923, 162, 'uni002_Course019', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8924, 162, 'uni002_Course018', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8925, 162, 'uni002_Course017', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8926, 162, 'uni002_uni002_uni002_Course130', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8927, 162, 'uni002_uni002_uni002_Course120', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8928, 162, 'uni002_CS101', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8929, 162, 'uni002_CS100', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8930, 162, 'uni002_Course121', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8931, 162, 'uni002_Course120', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8932, 162, 'uni002_Course035', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8933, 162, 'uni002_Course016', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8934, 162, 'uni002_Course015', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8935, 162, 'uni002_Course014', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8936, 162, 'uni002_Course013', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8937, 162, 'uni002_Course012', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8938, 162, 'uni002_Course011', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8939, 162, 'uni002_Course010', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8940, 162, 'uni002_Course009', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8941, 162, 'uni002_Course008', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8942, 162, 'uni002_Course007', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8943, 162, 'uni002_Course006', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8944, 162, 'uni002_uni002_Course110', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8945, 162, 'uni002_Course005', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8946, 162, 'uni002_Course004', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8947, 162, 'uni002_Course003', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8948, 162, 'uni002_Course002', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8949, 162, 'uni002_Course001', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8950, 162, 'uni001_doc031', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8951, 162, 'uni001_Course13', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8952, 162, 'uni001_cours043', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8953, 162, 'uni001_cours042', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8954, 162, 'uni001_CS102', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8955, 162, 'uni001_cours106', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8956, 162, 'uni001_cours105', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8957, 162, 'uni001_cours104', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8958, 162, 'uni001_cours103', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8959, 162, 'uni001_cours102', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8960, 162, 'uni001_cours101', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8961, 162, 'uni001_Course30', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8962, 162, 'uni001_Course21', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8963, 162, 'uni001_cours100', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8964, 162, 'uni001_cours099', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8965, 162, 'uni001_cours098', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8966, 162, 'uni001_Course19', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8967, 162, 'uni001_cours097', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8968, 162, 'uni001_cours096', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8969, 162, 'uni001_cours095', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8970, 162, 'uni001_cours094', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8971, 162, 'uni001_cours093', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8972, 162, 'uni001_cours092', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8973, 162, 'uni001_cours091', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8974, 162, 'uni001_cours090', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8975, 162, 'uni001_cours089', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8976, 162, 'uni001_cours088', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8977, 162, 'uni001_cours087', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8978, 162, 'uni001_cours086', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8979, 162, 'uni001_cours085', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8980, 162, 'uni001_cours084', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8981, 162, 'uni001_cours083', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8982, 162, 'uni001_cours082', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8983, 162, 'uni001_cours081', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8984, 162, 'uni001_cours080', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8985, 162, 'uni001_cours079', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8986, 162, 'uni001_cours078', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8987, 162, 'uni001_cours077', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8988, 162, 'uni001_Course56', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8989, 162, 'uni001_Course17', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8990, 162, 'uni001_Course15', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8991, 162, 'uni001_Course130', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8992, 162, 'uni001_cours076', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8993, 162, 'uni001_cours075', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8994, 162, 'uni001_cours074', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8995, 162, 'uni001_cours073', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8996, 162, 'uni001_cours072', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8997, 162, 'uni001_cours071', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8998, 162, 'uni001_cours070', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (8999, 162, 'uni001_cours069', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9000, 162, 'uni001_cours068', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9001, 162, 'uni001_cours067', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9002, 162, 'uni001_cours066', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9003, 162, 'uni001_cours065', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9004, 162, 'uni001_cours064', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9005, 162, 'uni001_cours063', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9006, 162, 'uni001_Course14', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9007, 162, 'uni001_cours062', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9008, 162, 'uni001_cours061', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9009, 162, 'uni001_cours060', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9010, 162, 'uni001_cours058', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9011, 162, 'uni001_cours057', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9012, 162, 'uni001_cours056', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9013, 162, 'uni001_cours055', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9014, 162, 'uni001_cours054', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9015, 162, 'uni001_cours053', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9016, 162, 'uni001_cours052', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9017, 162, 'uni001_cours051', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9018, 162, 'uni001_cours050', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9019, 162, 'uni001_cours049', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9020, 162, 'uni001_cours048', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9021, 162, 'uni001_cours047', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9022, 162, 'uni001_cours046', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9023, 162, 'uni001_cours045', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9024, 162, 'uni001_cours044', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9025, 162, 'uni001_Course8', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9026, 162, 'uni001_Course12', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9027, 162, 'uni001_Course11', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9028, 162, 'uni001_cours041', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9029, 162, 'uni001_cours040', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9030, 162, 'uni001_cours039', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9031, 162, 'uni001_cours038', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9032, 162, 'uni001_cours037', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9033, 162, 'uni001_cours036', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9034, 162, 'uni001_cours035', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9035, 162, 'uni001_cours034', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9036, 162, 'uni001_cours033', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9037, 162, 'uni001_cours032', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9038, 162, 'uni001_Course9', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9039, 162, 'uni001_Course10', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9040, 162, 'uni001_cours031', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9041, 162, 'uni001_cours030', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9042, 162, 'uni001_cours029', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9043, 162, 'uni001_cours028', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9044, 162, 'uni001_cours027', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9045, 162, 'uni001_cours026', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9046, 162, 'uni001_cours025', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9047, 162, 'uni001_cours024', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9048, 162, 'uni001_cours023', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9049, 162, 'uni001_CS101', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9050, 162, 'uni001_Course7', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9051, 162, 'uni001_cours022', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9052, 162, 'uni001_cours021', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9053, 162, 'uni001_cours020', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9054, 162, 'uni001_cours019', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9055, 162, 'uni001_cours018', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9056, 162, 'uni001_cours017', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9057, 162, 'uni001_cours016', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9058, 162, 'uni001_cours015', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9059, 162, 'uni001_cours014', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9060, 162, 'uni001_cours013', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9061, 162, 'uni001_cours012', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9062, 162, 'uni001_CS100', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9063, 162, 'uni001_cours011', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9064, 162, 'uni001_cours010', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9065, 162, 'uni001_cours009', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9066, 162, 'uni001_cours008', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9067, 162, 'uni001_cours007', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9068, 162, 'uni001_cours006', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9069, 162, 'uni001_cours005', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9070, 162, 'uni001_cours004', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9071, 162, 'uni001_cours003', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9072, 162, 'uni001_cours002', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9073, 162, 'uni001_cours001', 3, 1, 0, 11);
INSERT INTO `create_plan` VALUES (9074, 162, 'uni077_CS007', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9075, 162, 'uni077_CS006', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9076, 162, 'uni077_CS005', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9077, 162, 'uni077_CS004', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9078, 162, 'uni077_CS003', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9079, 162, 'uni077_CS002', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9080, 162, 'uni077_CS001', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9081, 162, 'uni076_CS004', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9082, 162, 'uni076_CS003', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9083, 162, 'uni076_CS002', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9084, 162, 'uni076_CS001', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9085, 162, 'uni075_CS040', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9086, 162, 'uni075_CS039', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9087, 162, 'uni075_CS038', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9088, 162, 'uni075_CS037', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9089, 162, 'uni075_CS036', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9090, 162, 'uni075_CS035', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9091, 162, 'uni075_CS034', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9092, 162, 'uni075_CS033', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9093, 162, 'uni075_CS032', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9094, 162, 'uni075_CS031', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9095, 162, 'uni075_CS030', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9096, 162, 'uni075_CS029', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9097, 162, 'uni075_CS028', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9098, 162, 'uni075_CS027', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9099, 162, 'uni075_CS026', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9100, 162, 'uni075_CS025', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9101, 162, 'uni075_CS024', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9102, 162, 'uni075_CS023', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9103, 162, 'uni075_CS021', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9104, 162, 'uni075_CS020', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9105, 162, 'uni075_CS019', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9106, 162, 'uni075_CS018', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9107, 162, 'uni075_CS017', 16, 2, 0, 39);
INSERT INTO `create_plan` VALUES (9108, 162, 'uni075_CS016', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9109, 162, 'uni075_CS015', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9110, 162, 'uni075_CS013', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9111, 162, 'uni075_CS011', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9112, 162, 'uni075_CS010', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9113, 162, 'uni075_CS009', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9114, 162, 'uni075_CS042', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9115, 162, 'uni075_CS008', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9116, 162, 'uni075_CS041', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9117, 162, 'uni075_CS007', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9118, 162, 'uni075_CS006', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9119, 162, 'uni075_CS005', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9120, 162, 'uni075_CS004', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9121, 162, 'uni075_CS003', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9122, 162, 'uni075_CS002', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9123, 162, 'uni075_CS001', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9124, 162, 'uni074_cs064', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9125, 162, 'uni074_CS063', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9126, 162, 'uni074_CS062', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9127, 162, 'uni074_CS061', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9128, 162, 'uni074_CS060', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9129, 162, 'uni074_CS059', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9130, 162, 'uni074_CS058', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9131, 162, 'uni074_CS057', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9132, 162, 'uni074_CS056', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9133, 162, 'uni074_CS055', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9134, 162, 'uni073_CS053', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9135, 162, 'uni073_CS052', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9136, 162, 'uni073_CS051', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9137, 162, 'uni073_CS050', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9138, 162, 'uni073_CS049', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9139, 162, 'uni073_CS048', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9140, 162, 'uni073_CS047', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9141, 162, 'uni073_CS046', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9142, 162, 'uni073_CS045', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9143, 162, 'uni073_CS044', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9144, 162, 'uni073_CS043', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9145, 162, 'uni072_CS005', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9146, 162, 'uni072_CS004', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9147, 162, 'uni072_CS003', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9148, 162, 'uni072_CS002', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9149, 162, 'uni072_CS001', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9150, 162, 'uni004_fac037', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9151, 162, 'uni004_fac036', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9152, 162, 'uni004_fac035', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9153, 162, 'uni004_fac034', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9154, 162, 'uni004_fac033', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9155, 162, 'uni004_fac032', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9156, 162, 'uni004_fac031', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9157, 162, 'uni004_fac030', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9158, 162, 'uni004_fac029', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9159, 162, 'uni004_fac028', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9160, 162, 'uni004_fac027', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9161, 162, 'uni004_Course7', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9162, 162, 'uni004_fac026', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9163, 162, 'uni004_fac025', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9164, 162, 'uni004_fac024', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9165, 162, 'uni004_fac023', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9166, 162, 'uni004_fac022', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9167, 162, 'uni004_fac021', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9168, 162, 'uni004_fac020', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9169, 162, 'uni004_fac019', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9170, 162, 'uni004_fac018', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9171, 162, 'uni004_fac017', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9172, 162, 'uni004_fac016', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9173, 162, 'uni004_fac015', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9174, 162, 'uni004_fac038', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9175, 162, 'uni004_fac014', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9176, 162, 'uni004_fac013', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9177, 162, 'uni004_fac012', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9178, 162, 'uni004_fac011', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9179, 162, 'uni004_fac010', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9180, 162, 'uni004_fac009', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9181, 162, 'uni004_fac008', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9182, 162, 'uni004_fac007', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9183, 162, 'uni004_fac006', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9184, 162, 'uni004_fac005', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9185, 162, 'uni004_fac004', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9186, 162, 'uni004_fac003', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9187, 162, 'uni004_fac002', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9188, 162, 'uni004_fac001', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9189, 162, 'uni003_Course116', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9190, 162, 'uni003_Course115', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9191, 162, 'uni003_Course114', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9192, 162, 'uni003_Course113', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9193, 162, 'uni003_Course112', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9194, 162, 'uni003_Course111', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9195, 162, 'uni003_Course110', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9196, 162, 'uni003_Course109', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9197, 162, 'uni003_Course6', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9198, 162, 'uni003_course032', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9199, 162, 'uni003_course031', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9200, 162, 'uni003_course030', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9201, 162, 'uni003_course029', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9202, 162, 'uni003_course028', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9203, 162, 'uni003_CS101', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9204, 162, 'uni003_Course94', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9205, 162, 'uni003_Course5', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9206, 162, 'uni003_Course4', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9207, 162, 'uni003_Course156', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9208, 162, 'uni003_course026', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9209, 162, 'uni003_course025', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9210, 162, 'uni003_course024', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9211, 162, 'uni003_course023', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9212, 162, 'uni003_course022', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9213, 162, 'uni003_CS100', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9214, 162, 'uni003_Course97', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9215, 162, 'uni003_Course3', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9216, 162, 'uni003_Course2', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9217, 162, 'uni003_course021', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9218, 162, 'uni003_course020', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9219, 162, 'uni003_course019', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9220, 162, 'uni003_uni002_uni002_Course160', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9221, 162, 'uni003_Course1', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9222, 162, 'uni003_course018', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9223, 162, 'uni003_course017', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9224, 162, 'uni003_course016', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9225, 162, 'uni003_course015', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9226, 162, 'uni003_course014', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9227, 162, 'uni003_course013', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9228, 162, 'uni003_uni002_uni002_Course150', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9229, 162, 'uni003_Course91', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9230, 162, 'uni003_course012', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9231, 162, 'uni003_course011', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9232, 162, 'uni003_course010', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9233, 162, 'uni003_course009', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9234, 162, 'uni003_course008', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9235, 162, 'uni003_course007', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9236, 162, 'uni003_course006', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9237, 162, 'uni003_course005', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9238, 162, 'uni003_uni002_uni002_Course140', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9239, 162, 'uni003_Course104', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9240, 162, 'uni003_Course01', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9241, 162, 'uni003_course004', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9242, 162, 'uni003_course003', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9243, 162, 'uni003_course002', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9244, 162, 'uni003_course001', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9245, 162, 'uni002_Course026', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9246, 162, 'uni002_Course025', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9247, 162, 'uni002_Course024', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9248, 162, 'uni002_Course023', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9249, 162, 'uni002_Course022', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9250, 162, 'uni002_Course021', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9251, 162, 'uni002_Course020', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9252, 162, 'uni002_Course019', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9253, 162, 'uni002_Course018', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9254, 162, 'uni002_Course017', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9255, 162, 'uni002_uni002_uni002_Course130', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9256, 162, 'uni002_uni002_uni002_Course120', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9257, 162, 'uni002_CS101', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9258, 162, 'uni002_CS100', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9259, 162, 'uni002_Course121', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9260, 162, 'uni002_Course120', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9261, 162, 'uni002_Course035', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9262, 162, 'uni002_Course016', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9263, 162, 'uni002_Course015', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9264, 162, 'uni002_Course014', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9265, 162, 'uni002_Course013', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9266, 162, 'uni002_Course012', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9267, 162, 'uni002_Course011', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9268, 162, 'uni002_Course010', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9269, 162, 'uni002_Course009', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9270, 162, 'uni002_Course008', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9271, 162, 'uni002_Course007', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9272, 162, 'uni002_Course006', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9273, 162, 'uni002_uni002_Course110', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9274, 162, 'uni002_Course005', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9275, 162, 'uni002_Course004', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9276, 162, 'uni002_Course003', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9277, 162, 'uni002_Course002', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9278, 162, 'uni002_Course001', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9279, 162, 'uni001_doc031', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9280, 162, 'uni001_Course13', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9281, 162, 'uni001_cours043', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9282, 162, 'uni001_cours042', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9283, 162, 'uni001_CS102', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9284, 162, 'uni001_cours106', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9285, 162, 'uni001_cours105', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9286, 162, 'uni001_cours104', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9287, 162, 'uni001_cours103', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9288, 162, 'uni001_cours102', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9289, 162, 'uni001_cours101', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9290, 162, 'uni001_Course30', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9291, 162, 'uni001_Course21', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9292, 162, 'uni001_cours100', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9293, 162, 'uni001_cours099', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9294, 162, 'uni001_cours098', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9295, 162, 'uni001_Course19', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9296, 162, 'uni001_cours097', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9297, 162, 'uni001_cours096', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9298, 162, 'uni001_cours095', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9299, 162, 'uni001_cours094', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9300, 162, 'uni001_cours093', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9301, 162, 'uni001_cours092', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9302, 162, 'uni001_cours091', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9303, 162, 'uni001_cours090', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9304, 162, 'uni001_cours089', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9305, 162, 'uni001_cours088', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9306, 162, 'uni001_cours087', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9307, 162, 'uni001_cours086', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9308, 162, 'uni001_cours085', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9309, 162, 'uni001_cours084', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9310, 162, 'uni001_cours083', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9311, 162, 'uni001_cours082', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9312, 162, 'uni001_cours081', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9313, 162, 'uni001_cours080', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9314, 162, 'uni001_cours079', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9315, 162, 'uni001_cours078', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9316, 162, 'uni001_cours077', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9317, 162, 'uni001_Course56', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9318, 162, 'uni001_Course17', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9319, 162, 'uni001_Course15', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9320, 162, 'uni001_Course130', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9321, 162, 'uni001_cours076', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9322, 162, 'uni001_cours075', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9323, 162, 'uni001_cours074', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9324, 162, 'uni001_cours073', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9325, 162, 'uni001_cours072', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9326, 162, 'uni001_cours071', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9327, 162, 'uni001_cours070', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9328, 162, 'uni001_cours069', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9329, 162, 'uni001_cours068', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9330, 162, 'uni001_cours067', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9331, 162, 'uni001_cours066', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9332, 162, 'uni001_cours065', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9333, 162, 'uni001_cours064', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9334, 162, 'uni001_cours063', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9335, 162, 'uni001_Course14', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9336, 162, 'uni001_cours062', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9337, 162, 'uni001_cours061', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9338, 162, 'uni001_cours060', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9339, 162, 'uni001_cours058', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9340, 162, 'uni001_cours057', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9341, 162, 'uni001_cours056', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9342, 162, 'uni001_cours055', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9343, 162, 'uni001_cours054', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9344, 162, 'uni001_cours053', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9345, 162, 'uni001_cours052', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9346, 162, 'uni001_cours051', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9347, 162, 'uni001_cours050', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9348, 162, 'uni001_cours049', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9349, 162, 'uni001_cours048', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9350, 162, 'uni001_cours047', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9351, 162, 'uni001_cours046', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9352, 162, 'uni001_cours045', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9353, 162, 'uni001_cours044', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9354, 162, 'uni001_Course8', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9355, 162, 'uni001_Course12', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9356, 162, 'uni001_Course11', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9357, 162, 'uni001_cours041', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9358, 162, 'uni001_cours040', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9359, 162, 'uni001_cours039', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9360, 162, 'uni001_cours038', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9361, 162, 'uni001_cours037', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9362, 162, 'uni001_cours036', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9363, 162, 'uni001_cours035', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9364, 162, 'uni001_cours034', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9365, 162, 'uni001_cours033', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9366, 162, 'uni001_cours032', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9367, 162, 'uni001_Course9', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9368, 162, 'uni001_Course10', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9369, 162, 'uni001_cours031', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9370, 162, 'uni001_cours030', 16, 2, 0, 39);
INSERT INTO `create_plan` VALUES (9371, 162, 'uni001_cours029', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9372, 162, 'uni001_cours028', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9373, 162, 'uni001_cours027', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9374, 162, 'uni001_cours026', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9375, 162, 'uni001_cours025', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9376, 162, 'uni001_cours024', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9377, 162, 'uni001_cours023', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9378, 162, 'uni001_CS101', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9379, 162, 'uni001_Course7', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9380, 162, 'uni001_cours022', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9381, 162, 'uni001_cours021', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9382, 162, 'uni001_cours020', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9383, 162, 'uni001_cours019', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9384, 162, 'uni001_cours018', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9385, 162, 'uni001_cours017', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9386, 162, 'uni001_cours016', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9387, 162, 'uni001_cours015', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9388, 162, 'uni001_cours014', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9389, 162, 'uni001_cours013', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9390, 162, 'uni001_cours012', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9391, 162, 'uni001_CS100', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9392, 162, 'uni001_cours011', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9393, 162, 'uni001_cours010', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9394, 162, 'uni001_cours009', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9395, 162, 'uni001_cours008', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9396, 162, 'uni001_cours007', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9397, 162, 'uni001_cours006', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9398, 162, 'uni001_cours005', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9399, 162, 'uni001_cours004', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9400, 162, 'uni001_cours003', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9401, 162, 'uni001_cours002', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9402, 162, 'uni001_cours001', 16, 1, 0, 39);
INSERT INTO `create_plan` VALUES (9403, 162, 'uni077_CS007', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9404, 162, 'uni077_CS006', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9405, 162, 'uni077_CS005', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9406, 162, 'uni077_CS004', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9407, 162, 'uni077_CS003', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9408, 162, 'uni077_CS002', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9409, 162, 'uni077_CS001', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9410, 162, 'uni076_CS004', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9411, 162, 'uni076_CS003', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9412, 162, 'uni076_CS002', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9413, 162, 'uni076_CS001', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9414, 162, 'uni075_CS040', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9415, 162, 'uni075_CS039', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9416, 162, 'uni075_CS038', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9417, 162, 'uni075_CS037', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9418, 162, 'uni075_CS036', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9419, 162, 'uni075_CS035', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9420, 162, 'uni075_CS034', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9421, 162, 'uni075_CS033', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9422, 162, 'uni075_CS032', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9423, 162, 'uni075_CS031', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9424, 162, 'uni075_CS030', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9425, 162, 'uni075_CS029', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9426, 162, 'uni075_CS028', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9427, 162, 'uni075_CS027', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9428, 162, 'uni075_CS026', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9429, 162, 'uni075_CS025', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9430, 162, 'uni075_CS024', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9431, 162, 'uni075_CS023', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9432, 162, 'uni075_CS021', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9433, 162, 'uni075_CS020', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9434, 162, 'uni075_CS019', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9435, 162, 'uni075_CS018', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9436, 162, 'uni075_CS017', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9437, 162, 'uni075_CS016', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9438, 162, 'uni075_CS015', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9439, 162, 'uni075_CS013', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9440, 162, 'uni075_CS011', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9441, 162, 'uni075_CS010', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9442, 162, 'uni075_CS009', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9443, 162, 'uni075_CS042', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9444, 162, 'uni075_CS008', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9445, 162, 'uni075_CS041', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9446, 162, 'uni075_CS007', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9447, 162, 'uni075_CS006', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9448, 162, 'uni075_CS005', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9449, 162, 'uni075_CS004', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9450, 162, 'uni075_CS003', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9451, 162, 'uni075_CS002', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9452, 162, 'uni075_CS001', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9453, 162, 'uni074_cs064', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9454, 162, 'uni074_CS063', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9455, 162, 'uni074_CS062', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9456, 162, 'uni074_CS061', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9457, 162, 'uni074_CS060', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9458, 162, 'uni074_CS059', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9459, 162, 'uni074_CS058', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9460, 162, 'uni074_CS057', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9461, 162, 'uni074_CS056', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9462, 162, 'uni074_CS055', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9463, 162, 'uni073_CS053', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9464, 162, 'uni073_CS052', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9465, 162, 'uni073_CS051', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9466, 162, 'uni073_CS050', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9467, 162, 'uni073_CS049', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9468, 162, 'uni073_CS048', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9469, 162, 'uni073_CS047', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9470, 162, 'uni073_CS046', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9471, 162, 'uni073_CS045', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9472, 162, 'uni073_CS044', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9473, 162, 'uni073_CS043', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9474, 162, 'uni072_CS005', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9475, 162, 'uni072_CS004', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9476, 162, 'uni072_CS003', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9477, 162, 'uni072_CS002', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9478, 162, 'uni072_CS001', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9479, 162, 'uni004_fac038', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9480, 162, 'uni003_Course116', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9481, 162, 'uni003_Course115', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9482, 162, 'uni003_Course114', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9483, 162, 'uni003_Course113', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9484, 162, 'uni003_Course112', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9485, 162, 'uni003_Course111', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9486, 162, 'uni003_Course110', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9487, 162, 'uni003_Course109', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9488, 162, 'uni003_CS101', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9489, 162, 'uni003_Course94', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9490, 162, 'uni003_Course156', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9491, 162, 'uni003_course025', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9492, 162, 'uni003_CS100', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9493, 162, 'uni003_Course97', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9494, 162, 'uni003_Course2', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9495, 162, 'uni003_course020', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9496, 162, 'uni003_Course91', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9497, 162, 'uni003_course004', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9498, 162, 'uni003_course002', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9499, 162, 'uni002_Course023', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9500, 162, 'uni002_uni002_uni002_Course130', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9501, 162, 'uni002_uni002_uni002_Course120', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9502, 162, 'uni002_CS101', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9503, 162, 'uni002_CS100', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9504, 162, 'uni002_Course121', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9505, 162, 'uni002_Course120', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9506, 162, 'uni002_Course035', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9507, 162, 'uni002_Course016', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9508, 162, 'uni002_Course015', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9509, 162, 'uni002_Course014', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9510, 162, 'uni002_Course013', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9511, 162, 'uni002_Course012', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9512, 162, 'uni001_cours043', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9513, 162, 'uni001_CS102', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9514, 162, 'uni001_cours101', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9515, 162, 'uni001_Course56', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9516, 162, 'uni001_Course130', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9517, 162, 'uni001_cours065', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9518, 162, 'uni001_cours027', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9519, 162, 'uni001_CS101', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9520, 162, 'uni001_Course7', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9521, 162, 'uni001_CS100', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9522, 162, 'uni001_cours007', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9523, 162, 'uni001_cours006', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (9524, 162, 'uni077_CS007', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9525, 162, 'uni077_CS006', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9526, 162, 'uni077_CS005', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9527, 162, 'uni077_CS004', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9528, 162, 'uni077_CS003', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9529, 162, 'uni077_CS002', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9530, 162, 'uni077_CS001', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9531, 162, 'uni076_CS004', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9532, 162, 'uni076_CS003', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9533, 162, 'uni076_CS002', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9534, 162, 'uni076_CS001', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9535, 162, 'uni075_CS040', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9536, 162, 'uni075_CS039', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9537, 162, 'uni075_CS038', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9538, 162, 'uni075_CS037', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9539, 162, 'uni075_CS036', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9540, 162, 'uni075_CS035', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9541, 162, 'uni075_CS034', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9542, 162, 'uni075_CS033', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9543, 162, 'uni075_CS032', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9544, 162, 'uni075_CS031', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9545, 162, 'uni075_CS030', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9546, 162, 'uni075_CS029', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9547, 162, 'uni075_CS028', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9548, 162, 'uni075_CS027', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9549, 162, 'uni075_CS026', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9550, 162, 'uni075_CS025', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9551, 162, 'uni075_CS024', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9552, 162, 'uni075_CS023', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9553, 162, 'uni075_CS021', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9554, 162, 'uni075_CS020', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9555, 162, 'uni075_CS019', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9556, 162, 'uni075_CS018', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9557, 162, 'uni075_CS017', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9558, 162, 'uni075_CS016', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9559, 162, 'uni075_CS015', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9560, 162, 'uni075_CS013', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9561, 162, 'uni075_CS011', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9562, 162, 'uni075_CS010', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9563, 162, 'uni075_CS009', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9564, 162, 'uni075_CS042', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9565, 162, 'uni075_CS008', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9566, 162, 'uni075_CS041', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9567, 162, 'uni075_CS007', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9568, 162, 'uni075_CS006', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9569, 162, 'uni075_CS005', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9570, 162, 'uni075_CS004', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9571, 162, 'uni075_CS003', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9572, 162, 'uni075_CS002', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9573, 162, 'uni075_CS001', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9574, 162, 'uni074_cs064', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9575, 162, 'uni074_CS063', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9576, 162, 'uni074_CS062', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9577, 162, 'uni074_CS061', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9578, 162, 'uni074_CS060', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9579, 162, 'uni074_CS059', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9580, 162, 'uni074_CS058', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9581, 162, 'uni074_CS057', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9582, 162, 'uni074_CS056', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9583, 162, 'uni074_CS055', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9584, 162, 'uni073_CS053', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9585, 162, 'uni073_CS052', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9586, 162, 'uni073_CS051', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9587, 162, 'uni073_CS050', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9588, 162, 'uni073_CS049', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9589, 162, 'uni073_CS048', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9590, 162, 'uni073_CS047', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9591, 162, 'uni073_CS046', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9592, 162, 'uni073_CS045', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9593, 162, 'uni073_CS044', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9594, 162, 'uni073_CS043', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9595, 162, 'uni072_CS005', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9596, 162, 'uni072_CS004', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9597, 162, 'uni072_CS003', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9598, 162, 'uni072_CS002', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9599, 162, 'uni072_CS001', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9600, 162, 'uni004_fac038', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9601, 162, 'uni003_Course116', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9602, 162, 'uni003_Course115', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9603, 162, 'uni003_Course114', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9604, 162, 'uni003_Course113', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9605, 162, 'uni003_Course112', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9606, 162, 'uni003_Course111', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9607, 162, 'uni003_Course110', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9608, 162, 'uni003_Course109', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9609, 162, 'uni003_CS101', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9610, 162, 'uni003_Course94', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9611, 162, 'uni003_Course156', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9612, 162, 'uni003_course025', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9613, 162, 'uni003_CS100', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9614, 162, 'uni003_Course97', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9615, 162, 'uni003_Course2', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9616, 162, 'uni003_course020', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9617, 162, 'uni003_Course91', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9618, 162, 'uni003_course004', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9619, 162, 'uni003_course002', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9620, 162, 'uni002_Course024', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9621, 162, 'uni002_uni002_uni002_Course130', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9622, 162, 'uni002_uni002_uni002_Course120', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9623, 162, 'uni002_CS101', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9624, 162, 'uni002_CS100', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9625, 162, 'uni002_Course121', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9626, 162, 'uni002_Course120', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9627, 162, 'uni002_Course035', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9628, 162, 'uni002_Course016', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9629, 162, 'uni002_Course015', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9630, 162, 'uni002_Course014', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9631, 162, 'uni002_Course013', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9632, 162, 'uni002_Course012', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9633, 162, 'uni001_cours043', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9634, 162, 'uni001_CS102', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9635, 162, 'uni001_cours101', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9636, 162, 'uni001_Course56', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9637, 162, 'uni001_Course130', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9638, 162, 'uni001_cours065', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9639, 162, 'uni001_cours027', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9640, 162, 'uni001_CS101', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9641, 162, 'uni001_Course7', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9642, 162, 'uni001_CS100', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9643, 162, 'uni001_cours007', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9644, 162, 'uni001_cours006', 2, 10, 0, 10);
INSERT INTO `create_plan` VALUES (9645, 162, 'uni077_CS007', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9646, 162, 'uni077_CS006', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9647, 162, 'uni077_CS005', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9648, 162, 'uni077_CS004', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9649, 162, 'uni077_CS003', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9650, 162, 'uni077_CS002', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9651, 162, 'uni077_CS001', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9652, 162, 'uni076_CS004', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9653, 162, 'uni076_CS003', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9654, 162, 'uni076_CS002', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9655, 162, 'uni076_CS001', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9656, 162, 'uni075_CS040', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9657, 162, 'uni075_CS039', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9658, 162, 'uni075_CS038', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9659, 162, 'uni075_CS037', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9660, 162, 'uni075_CS036', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9661, 162, 'uni075_CS035', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9662, 162, 'uni075_CS034', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9663, 162, 'uni075_CS033', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9664, 162, 'uni075_CS032', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9665, 162, 'uni075_CS031', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9666, 162, 'uni075_CS030', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9667, 162, 'uni075_CS029', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9668, 162, 'uni075_CS028', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9669, 162, 'uni075_CS027', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9670, 162, 'uni075_CS026', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9671, 162, 'uni075_CS025', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9672, 162, 'uni075_CS024', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9673, 162, 'uni075_CS023', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9674, 162, 'uni075_CS021', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9675, 162, 'uni075_CS020', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9676, 162, 'uni075_CS019', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9677, 162, 'uni075_CS018', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9678, 162, 'uni075_CS017', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9679, 162, 'uni075_CS016', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9680, 162, 'uni075_CS015', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9681, 162, 'uni075_CS013', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9682, 162, 'uni075_CS011', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9683, 162, 'uni075_CS010', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9684, 162, 'uni075_CS009', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9685, 162, 'uni075_CS042', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9686, 162, 'uni075_CS008', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9687, 162, 'uni075_CS041', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9688, 162, 'uni075_CS007', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9689, 162, 'uni075_CS006', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9690, 162, 'uni075_CS005', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9691, 162, 'uni075_CS004', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9692, 162, 'uni075_CS003', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9693, 162, 'uni075_CS002', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9694, 162, 'uni075_CS001', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9695, 162, 'uni074_cs064', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9696, 162, 'uni074_CS063', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9697, 162, 'uni074_CS062', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9698, 162, 'uni074_CS061', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9699, 162, 'uni074_CS060', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9700, 162, 'uni074_CS059', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9701, 162, 'uni074_CS058', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9702, 162, 'uni074_CS057', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9703, 162, 'uni074_CS056', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9704, 162, 'uni074_CS055', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9705, 162, 'uni073_CS053', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9706, 162, 'uni073_CS052', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9707, 162, 'uni073_CS051', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9708, 162, 'uni073_CS050', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9709, 162, 'uni073_CS049', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9710, 162, 'uni073_CS048', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9711, 162, 'uni073_CS047', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9712, 162, 'uni073_CS046', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9713, 162, 'uni073_CS045', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9714, 162, 'uni073_CS044', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9715, 162, 'uni073_CS043', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9716, 162, 'uni072_CS005', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9717, 162, 'uni072_CS004', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9718, 162, 'uni072_CS003', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9719, 162, 'uni072_CS002', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9720, 162, 'uni072_CS001', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9721, 162, 'uni004_fac038', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9722, 162, 'uni003_Course116', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9723, 162, 'uni003_Course115', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9724, 162, 'uni003_Course114', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9725, 162, 'uni003_Course113', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9726, 162, 'uni003_Course112', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9727, 162, 'uni003_Course111', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9728, 162, 'uni003_Course110', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9729, 162, 'uni003_Course109', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9730, 162, 'uni003_Course94', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9731, 162, 'uni003_Course156', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9732, 162, 'uni003_course025', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9733, 162, 'uni003_Course97', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9734, 162, 'uni003_Course2', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9735, 162, 'uni003_Course91', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9736, 162, 'uni003_course004', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9737, 162, 'uni003_course002', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9738, 162, 'uni002_Course024', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9739, 162, 'uni002_uni002_uni002_Course130', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9740, 162, 'uni002_uni002_uni002_Course120', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9741, 162, 'uni002_Course121', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9742, 162, 'uni002_Course120', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9743, 162, 'uni002_Course035', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9744, 162, 'uni002_Course016', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9745, 162, 'uni002_Course012', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9746, 162, 'uni001_cours043', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9747, 162, 'uni001_cours101', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9748, 162, 'uni001_Course56', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9749, 162, 'uni001_Course130', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9750, 162, 'uni001_cours071', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9751, 162, 'uni001_cours065', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9752, 162, 'uni001_cours027', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9753, 162, 'uni001_Course7', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9754, 162, 'uni001_cours007', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9755, 162, 'uni001_cours006', 5, 10, 0, 27);
INSERT INTO `create_plan` VALUES (9756, 162, 'uni077_CS007', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9757, 162, 'uni077_CS006', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9758, 162, 'uni077_CS005', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9759, 162, 'uni077_CS004', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9760, 162, 'uni077_CS003', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9761, 162, 'uni077_CS002', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9762, 162, 'uni077_CS001', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9763, 162, 'uni076_CS004', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9764, 162, 'uni076_CS003', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9765, 162, 'uni076_CS002', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9766, 162, 'uni076_CS001', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9767, 162, 'uni075_CS040', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9768, 162, 'uni075_CS039', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9769, 162, 'uni075_CS038', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9770, 162, 'uni075_CS037', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9771, 162, 'uni075_CS036', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9772, 162, 'uni075_CS035', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9773, 162, 'uni075_CS034', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9774, 162, 'uni075_CS033', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9775, 162, 'uni075_CS032', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9776, 162, 'uni075_CS031', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9777, 162, 'uni075_CS030', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9778, 162, 'uni075_CS029', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9779, 162, 'uni075_CS028', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9780, 162, 'uni075_CS027', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9781, 162, 'uni075_CS026', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9782, 162, 'uni075_CS025', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9783, 162, 'uni075_CS024', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9784, 162, 'uni075_CS023', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9785, 162, 'uni075_CS021', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9786, 162, 'uni075_CS020', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9787, 162, 'uni075_CS019', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9788, 162, 'uni075_CS018', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9789, 162, 'uni075_CS017', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9790, 162, 'uni075_CS016', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9791, 162, 'uni075_CS015', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9792, 162, 'uni075_CS013', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9793, 162, 'uni075_CS011', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9794, 162, 'uni075_CS010', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9795, 162, 'uni075_CS009', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9796, 162, 'uni075_CS042', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9797, 162, 'uni075_CS008', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9798, 162, 'uni075_CS041', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9799, 162, 'uni075_CS007', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9800, 162, 'uni075_CS006', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9801, 162, 'uni075_CS005', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9802, 162, 'uni075_CS004', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9803, 162, 'uni075_CS003', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9804, 162, 'uni075_CS002', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9805, 162, 'uni075_CS001', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9806, 162, 'uni074_cs064', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9807, 162, 'uni074_CS063', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9808, 162, 'uni074_CS062', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9809, 162, 'uni074_CS061', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9810, 162, 'uni074_CS060', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9811, 162, 'uni074_CS059', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9812, 162, 'uni074_CS058', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9813, 162, 'uni074_CS057', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9814, 162, 'uni074_CS056', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9815, 162, 'uni074_CS055', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9816, 162, 'uni073_CS053', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9817, 162, 'uni073_CS052', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9818, 162, 'uni073_CS051', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9819, 162, 'uni073_CS050', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9820, 162, 'uni073_CS049', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9821, 162, 'uni073_CS048', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9822, 162, 'uni073_CS047', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9823, 162, 'uni073_CS046', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9824, 162, 'uni073_CS045', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9825, 162, 'uni073_CS044', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9826, 162, 'uni073_CS043', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9827, 162, 'uni072_CS005', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9828, 162, 'uni072_CS004', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9829, 162, 'uni072_CS003', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9830, 162, 'uni072_CS002', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9831, 162, 'uni072_CS001', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9832, 162, 'uni004_fac038', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9833, 162, 'uni003_Course116', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9834, 162, 'uni003_Course115', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9835, 162, 'uni003_Course114', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9836, 162, 'uni003_Course113', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9837, 162, 'uni003_Course112', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9838, 162, 'uni003_Course111', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9839, 162, 'uni003_Course110', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9840, 162, 'uni003_Course109', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9841, 162, 'uni003_course032', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9842, 162, 'uni003_Course94', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9843, 162, 'uni003_Course156', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9844, 162, 'uni003_course024', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9845, 162, 'uni003_Course97', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9846, 162, 'uni003_Course2', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9847, 162, 'uni003_Course91', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9848, 162, 'uni003_course004', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9849, 162, 'uni003_course002', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9850, 162, 'uni002_Course024', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9851, 162, 'uni002_uni002_uni002_Course130', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9852, 162, 'uni002_uni002_uni002_Course120', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9853, 162, 'uni002_Course121', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9854, 162, 'uni002_Course120', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9855, 162, 'uni002_Course035', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9856, 162, 'uni002_Course016', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9857, 162, 'uni002_Course012', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9858, 162, 'uni001_cours043', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9859, 162, 'uni001_cours101', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9860, 162, 'uni001_Course56', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9861, 162, 'uni001_Course130', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9862, 162, 'uni001_cours071', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9863, 162, 'uni001_cours027', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9864, 162, 'uni001_Course7', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9865, 162, 'uni001_cours007', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9866, 162, 'uni001_cours006', 6, 10, 0, 36);
INSERT INTO `create_plan` VALUES (9867, 162, 'uni077_CS007', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9868, 162, 'uni077_CS006', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9869, 162, 'uni077_CS005', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9870, 162, 'uni077_CS004', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9871, 162, 'uni077_CS003', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9872, 162, 'uni077_CS002', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9873, 162, 'uni077_CS001', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9874, 162, 'uni076_CS004', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9875, 162, 'uni076_CS003', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9876, 162, 'uni076_CS002', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9877, 162, 'uni076_CS001', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9878, 162, 'uni075_CS040', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9879, 162, 'uni075_CS039', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9880, 162, 'uni075_CS038', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9881, 162, 'uni075_CS037', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9882, 162, 'uni075_CS036', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9883, 162, 'uni075_CS035', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9884, 162, 'uni075_CS034', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9885, 162, 'uni075_CS033', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9886, 162, 'uni075_CS032', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9887, 162, 'uni075_CS031', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9888, 162, 'uni075_CS030', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9889, 162, 'uni075_CS029', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9890, 162, 'uni075_CS028', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9891, 162, 'uni075_CS027', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9892, 162, 'uni075_CS026', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9893, 162, 'uni075_CS025', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9894, 162, 'uni075_CS024', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9895, 162, 'uni075_CS023', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9896, 162, 'uni075_CS021', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9897, 162, 'uni075_CS020', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9898, 162, 'uni075_CS019', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9899, 162, 'uni075_CS018', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9900, 162, 'uni075_CS017', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9901, 162, 'uni075_CS016', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9902, 162, 'uni075_CS015', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9903, 162, 'uni075_CS013', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9904, 162, 'uni075_CS011', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9905, 162, 'uni075_CS010', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9906, 162, 'uni075_CS009', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9907, 162, 'uni075_CS042', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9908, 162, 'uni075_CS008', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9909, 162, 'uni075_CS041', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9910, 162, 'uni075_CS007', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9911, 162, 'uni075_CS006', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9912, 162, 'uni075_CS005', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9913, 162, 'uni075_CS004', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9914, 162, 'uni075_CS003', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9915, 162, 'uni075_CS002', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9916, 162, 'uni075_CS001', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9917, 162, 'uni074_cs064', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9918, 162, 'uni074_CS063', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9919, 162, 'uni074_CS062', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9920, 162, 'uni074_CS061', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9921, 162, 'uni074_CS060', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9922, 162, 'uni074_CS059', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9923, 162, 'uni074_CS058', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9924, 162, 'uni074_CS057', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9925, 162, 'uni074_CS056', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9926, 162, 'uni074_CS055', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9927, 162, 'uni073_CS053', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9928, 162, 'uni073_CS052', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9929, 162, 'uni073_CS051', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9930, 162, 'uni073_CS050', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9931, 162, 'uni073_CS049', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9932, 162, 'uni073_CS048', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9933, 162, 'uni073_CS047', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9934, 162, 'uni073_CS046', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9935, 162, 'uni073_CS045', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9936, 162, 'uni073_CS044', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9937, 162, 'uni073_CS043', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9938, 162, 'uni072_CS005', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9939, 162, 'uni072_CS004', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9940, 162, 'uni072_CS003', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9941, 162, 'uni072_CS002', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9942, 162, 'uni072_CS001', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9943, 162, 'uni004_fac038', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9944, 162, 'uni003_Course116', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9945, 162, 'uni003_Course115', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9946, 162, 'uni003_Course114', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9947, 162, 'uni003_Course113', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9948, 162, 'uni003_Course112', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9949, 162, 'uni003_Course111', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9950, 162, 'uni003_Course110', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9951, 162, 'uni003_Course109', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9952, 162, 'uni003_Course94', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9953, 162, 'uni003_Course156', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9954, 162, 'uni003_course025', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9955, 162, 'uni003_CS100', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9956, 162, 'uni003_Course2', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9957, 162, 'uni003_course021', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9958, 162, 'uni003_Course91', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9959, 162, 'uni003_course004', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9960, 162, 'uni003_course002', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9961, 162, 'uni002_Course023', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9962, 162, 'uni002_CS101', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9963, 162, 'uni002_CS100', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9964, 162, 'uni002_Course121', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9965, 162, 'uni002_Course120', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9966, 162, 'uni002_Course016', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9967, 162, 'uni002_Course013', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9968, 162, 'uni002_Course012', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9969, 162, 'uni001_cours043', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9970, 162, 'uni001_cours101', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9971, 162, 'uni001_Course130', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9972, 162, 'uni001_cours065', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9973, 162, 'uni001_cours027', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9974, 162, 'uni001_Course7', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9975, 162, 'uni001_cours007', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9976, 162, 'uni001_cours006', 7, 10, 0, 35);
INSERT INTO `create_plan` VALUES (9977, 162, 'uni077_CS007', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9978, 162, 'uni077_CS006', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9979, 162, 'uni077_CS005', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9980, 162, 'uni077_CS004', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9981, 162, 'uni077_CS003', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9982, 162, 'uni077_CS002', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9983, 162, 'uni077_CS001', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9984, 162, 'uni076_CS004', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9985, 162, 'uni076_CS003', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9986, 162, 'uni076_CS002', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9987, 162, 'uni076_CS001', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9988, 162, 'uni075_CS040', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9989, 162, 'uni075_CS039', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9990, 162, 'uni075_CS038', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9991, 162, 'uni075_CS037', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9992, 162, 'uni075_CS036', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9993, 162, 'uni075_CS035', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9994, 162, 'uni075_CS034', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9995, 162, 'uni075_CS033', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9996, 162, 'uni075_CS032', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9997, 162, 'uni075_CS031', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9998, 162, 'uni075_CS030', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (9999, 162, 'uni075_CS029', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10000, 162, 'uni075_CS028', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10001, 162, 'uni075_CS027', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10002, 162, 'uni075_CS026', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10003, 162, 'uni075_CS025', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10004, 162, 'uni075_CS024', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10005, 162, 'uni075_CS023', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10006, 162, 'uni075_CS021', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10007, 162, 'uni075_CS020', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10008, 162, 'uni075_CS019', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10009, 162, 'uni075_CS018', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10010, 162, 'uni075_CS017', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10011, 162, 'uni075_CS016', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10012, 162, 'uni075_CS015', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10013, 162, 'uni075_CS013', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10014, 162, 'uni075_CS011', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10015, 162, 'uni075_CS010', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10016, 162, 'uni075_CS009', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10017, 162, 'uni075_CS042', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10018, 162, 'uni075_CS008', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10019, 162, 'uni075_CS041', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10020, 162, 'uni075_CS007', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10021, 162, 'uni075_CS006', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10022, 162, 'uni075_CS005', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10023, 162, 'uni075_CS004', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10024, 162, 'uni075_CS003', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10025, 162, 'uni075_CS002', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10026, 162, 'uni075_CS001', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10027, 162, 'uni074_cs064', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10028, 162, 'uni074_CS063', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10029, 162, 'uni074_CS062', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10030, 162, 'uni074_CS061', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10031, 162, 'uni074_CS060', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10032, 162, 'uni074_CS059', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10033, 162, 'uni074_CS058', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10034, 162, 'uni074_CS057', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10035, 162, 'uni074_CS056', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10036, 162, 'uni074_CS055', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10037, 162, 'uni073_CS053', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10038, 162, 'uni073_CS052', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10039, 162, 'uni073_CS051', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10040, 162, 'uni073_CS050', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10041, 162, 'uni073_CS049', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10042, 162, 'uni073_CS048', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10043, 162, 'uni073_CS047', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10044, 162, 'uni073_CS046', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10045, 162, 'uni073_CS045', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10046, 162, 'uni073_CS044', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10047, 162, 'uni073_CS043', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10048, 162, 'uni072_CS005', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10049, 162, 'uni072_CS004', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10050, 162, 'uni072_CS003', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10051, 162, 'uni072_CS002', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10052, 162, 'uni072_CS001', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10053, 162, 'uni004_fac038', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10054, 162, 'uni003_Course116', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10055, 162, 'uni003_Course115', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10056, 162, 'uni003_Course114', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10057, 162, 'uni003_Course113', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10058, 162, 'uni003_Course112', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10059, 162, 'uni003_Course111', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10060, 162, 'uni003_Course110', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10061, 162, 'uni003_Course109', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10062, 162, 'uni003_Course94', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10063, 162, 'uni003_Course156', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10064, 162, 'uni003_course025', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10065, 162, 'uni003_CS100', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10066, 162, 'uni003_Course97', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10067, 162, 'uni003_course020', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10068, 162, 'uni003_course011', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10069, 162, 'uni003_course004', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10070, 162, 'uni003_course002', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10071, 162, 'uni002_Course024', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10072, 162, 'uni002_CS101', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10073, 162, 'uni002_CS100', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10074, 162, 'uni002_Course121', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10075, 162, 'uni002_Course120', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10076, 162, 'uni002_Course016', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10077, 162, 'uni002_Course013', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10078, 162, 'uni002_Course012', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10079, 162, 'uni001_cours043', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10080, 162, 'uni001_cours101', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10081, 162, 'uni001_Course130', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10082, 162, 'uni001_cours065', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10083, 162, 'uni001_cours027', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10084, 162, 'uni001_Course7', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10085, 162, 'uni001_cours007', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10086, 162, 'uni001_cours006', 8, 10, 0, 28);
INSERT INTO `create_plan` VALUES (10087, 162, 'uni077_CS007', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10088, 162, 'uni077_CS006', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10089, 162, 'uni077_CS005', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10090, 162, 'uni077_CS004', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10091, 162, 'uni077_CS003', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10092, 162, 'uni077_CS002', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10093, 162, 'uni077_CS001', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10094, 162, 'uni076_CS004', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10095, 162, 'uni076_CS003', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10096, 162, 'uni076_CS002', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10097, 162, 'uni076_CS001', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10098, 162, 'uni075_CS040', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10099, 162, 'uni075_CS039', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10100, 162, 'uni075_CS038', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10101, 162, 'uni075_CS037', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10102, 162, 'uni075_CS036', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10103, 162, 'uni075_CS035', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10104, 162, 'uni075_CS034', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10105, 162, 'uni075_CS033', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10106, 162, 'uni075_CS032', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10107, 162, 'uni075_CS031', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10108, 162, 'uni075_CS030', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10109, 162, 'uni075_CS029', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10110, 162, 'uni075_CS028', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10111, 162, 'uni075_CS027', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10112, 162, 'uni075_CS026', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10113, 162, 'uni075_CS025', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10114, 162, 'uni075_CS024', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10115, 162, 'uni075_CS023', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10116, 162, 'uni075_CS021', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10117, 162, 'uni075_CS020', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10118, 162, 'uni075_CS019', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10119, 162, 'uni075_CS018', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10120, 162, 'uni075_CS017', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10121, 162, 'uni075_CS016', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10122, 162, 'uni075_CS015', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10123, 162, 'uni075_CS013', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10124, 162, 'uni075_CS011', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10125, 162, 'uni075_CS010', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10126, 162, 'uni075_CS009', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10127, 162, 'uni075_CS042', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10128, 162, 'uni075_CS008', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10129, 162, 'uni075_CS041', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10130, 162, 'uni075_CS007', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10131, 162, 'uni075_CS006', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10132, 162, 'uni075_CS005', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10133, 162, 'uni075_CS004', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10134, 162, 'uni075_CS003', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10135, 162, 'uni075_CS002', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10136, 162, 'uni075_CS001', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10137, 162, 'uni074_cs064', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10138, 162, 'uni074_CS063', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10139, 162, 'uni074_CS062', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10140, 162, 'uni074_CS061', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10141, 162, 'uni074_CS060', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10142, 162, 'uni074_CS059', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10143, 162, 'uni074_CS058', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10144, 162, 'uni074_CS057', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10145, 162, 'uni074_CS056', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10146, 162, 'uni074_CS055', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10147, 162, 'uni073_CS053', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10148, 162, 'uni073_CS052', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10149, 162, 'uni073_CS051', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10150, 162, 'uni073_CS050', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10151, 162, 'uni073_CS049', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10152, 162, 'uni073_CS048', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10153, 162, 'uni073_CS047', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10154, 162, 'uni073_CS046', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10155, 162, 'uni073_CS045', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10156, 162, 'uni073_CS044', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10157, 162, 'uni073_CS043', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10158, 162, 'uni072_CS005', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10159, 162, 'uni072_CS004', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10160, 162, 'uni072_CS003', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10161, 162, 'uni072_CS002', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10162, 162, 'uni072_CS001', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10163, 162, 'uni004_fac013', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10164, 162, 'uni003_Course116', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10165, 162, 'uni003_Course115', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10166, 162, 'uni003_Course114', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10167, 162, 'uni003_Course113', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10168, 162, 'uni003_Course112', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10169, 162, 'uni003_Course111', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10170, 162, 'uni003_Course110', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10171, 162, 'uni003_Course109', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10172, 162, 'uni003_Course94', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10173, 162, 'uni003_Course4', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10174, 162, 'uni003_Course156', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10175, 162, 'uni003_CS100', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10176, 162, 'uni003_Course2', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10177, 162, 'uni003_course020', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10178, 162, 'uni003_course011', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10179, 162, 'uni003_course004', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10180, 162, 'uni003_course002', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10181, 162, 'uni002_Course024', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10182, 162, 'uni002_CS101', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10183, 162, 'uni002_CS100', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10184, 162, 'uni002_Course121', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10185, 162, 'uni002_Course120', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10186, 162, 'uni002_Course016', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10187, 162, 'uni002_Course013', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10188, 162, 'uni002_Course012', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10189, 162, 'uni001_cours043', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10190, 162, 'uni001_cours101', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10191, 162, 'uni001_Course130', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10192, 162, 'uni001_cours075', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10193, 162, 'uni001_cours065', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10194, 162, 'uni001_cours027', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10195, 162, 'uni001_Course7', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10196, 162, 'uni001_cours007', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10197, 162, 'uni001_cours006', 9, 10, 0, 29);
INSERT INTO `create_plan` VALUES (10198, 162, 'uni077_CS007', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10199, 162, 'uni077_CS006', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10200, 162, 'uni077_CS005', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10201, 162, 'uni077_CS004', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10202, 162, 'uni077_CS003', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10203, 162, 'uni077_CS002', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10204, 162, 'uni077_CS001', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10205, 162, 'uni076_CS004', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10206, 162, 'uni076_CS003', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10207, 162, 'uni076_CS002', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10208, 162, 'uni076_CS001', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10209, 162, 'uni075_CS040', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10210, 162, 'uni075_CS039', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10211, 162, 'uni075_CS038', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10212, 162, 'uni075_CS037', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10213, 162, 'uni075_CS036', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10214, 162, 'uni075_CS035', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10215, 162, 'uni075_CS034', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10216, 162, 'uni075_CS033', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10217, 162, 'uni075_CS032', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10218, 162, 'uni075_CS031', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10219, 162, 'uni075_CS030', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10220, 162, 'uni075_CS029', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10221, 162, 'uni075_CS028', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10222, 162, 'uni075_CS027', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10223, 162, 'uni075_CS026', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10224, 162, 'uni075_CS025', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10225, 162, 'uni075_CS024', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10226, 162, 'uni075_CS023', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10227, 162, 'uni075_CS021', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10228, 162, 'uni075_CS020', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10229, 162, 'uni075_CS019', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10230, 162, 'uni075_CS018', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10231, 162, 'uni075_CS017', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10232, 162, 'uni075_CS016', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10233, 162, 'uni075_CS015', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10234, 162, 'uni075_CS013', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10235, 162, 'uni075_CS011', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10236, 162, 'uni075_CS010', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10237, 162, 'uni075_CS009', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10238, 162, 'uni075_CS042', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10239, 162, 'uni075_CS008', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10240, 162, 'uni075_CS041', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10241, 162, 'uni075_CS007', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10242, 162, 'uni075_CS006', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10243, 162, 'uni075_CS005', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10244, 162, 'uni075_CS004', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10245, 162, 'uni075_CS003', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10246, 162, 'uni075_CS002', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10247, 162, 'uni075_CS001', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10248, 162, 'uni074_cs064', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10249, 162, 'uni074_CS063', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10250, 162, 'uni074_CS062', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10251, 162, 'uni074_CS061', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10252, 162, 'uni074_CS060', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10253, 162, 'uni074_CS059', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10254, 162, 'uni074_CS058', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10255, 162, 'uni074_CS057', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10256, 162, 'uni074_CS056', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10257, 162, 'uni074_CS055', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10258, 162, 'uni073_CS053', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10259, 162, 'uni073_CS052', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10260, 162, 'uni073_CS051', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10261, 162, 'uni073_CS050', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10262, 162, 'uni073_CS049', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10263, 162, 'uni073_CS048', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10264, 162, 'uni073_CS047', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10265, 162, 'uni073_CS046', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10266, 162, 'uni073_CS045', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10267, 162, 'uni073_CS044', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10268, 162, 'uni073_CS043', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10269, 162, 'uni072_CS005', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10270, 162, 'uni072_CS004', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10271, 162, 'uni072_CS003', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10272, 162, 'uni072_CS002', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10273, 162, 'uni072_CS001', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10274, 162, 'uni004_fac038', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10275, 162, 'uni003_Course116', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10276, 162, 'uni003_Course115', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10277, 162, 'uni003_Course114', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10278, 162, 'uni003_Course113', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10279, 162, 'uni003_Course112', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10280, 162, 'uni003_Course111', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10281, 162, 'uni003_Course110', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10282, 162, 'uni003_Course109', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10283, 162, 'uni003_Course94', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10284, 162, 'uni003_Course156', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10285, 162, 'uni003_course025', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10286, 162, 'uni003_CS100', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10287, 162, 'uni003_Course2', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10288, 162, 'uni003_course020', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10289, 162, 'uni003_course011', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10290, 162, 'uni003_course004', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10291, 162, 'uni003_course002', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10292, 162, 'uni002_Course024', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10293, 162, 'uni002_CS101', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10294, 162, 'uni002_CS100', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10295, 162, 'uni002_Course121', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10296, 162, 'uni002_Course120', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10297, 162, 'uni002_Course016', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10298, 162, 'uni002_Course013', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10299, 162, 'uni002_Course012', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10300, 162, 'uni001_cours043', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10301, 162, 'uni001_cours101', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10302, 162, 'uni001_Course130', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10303, 162, 'uni001_cours065', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10304, 162, 'uni001_cours027', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10305, 162, 'uni001_Course7', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10306, 162, 'uni001_cours007', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10307, 162, 'uni001_cours006', 10, 10, 0, 31);
INSERT INTO `create_plan` VALUES (10308, 162, 'uni077_CS007', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10309, 162, 'uni077_CS006', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10310, 162, 'uni077_CS005', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10311, 162, 'uni077_CS004', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10312, 162, 'uni077_CS003', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10313, 162, 'uni077_CS002', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10314, 162, 'uni077_CS001', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10315, 162, 'uni076_CS004', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10316, 162, 'uni076_CS003', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10317, 162, 'uni076_CS002', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10318, 162, 'uni076_CS001', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10319, 162, 'uni075_CS040', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10320, 162, 'uni075_CS039', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10321, 162, 'uni075_CS038', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10322, 162, 'uni075_CS037', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10323, 162, 'uni075_CS036', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10324, 162, 'uni075_CS035', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10325, 162, 'uni075_CS034', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10326, 162, 'uni075_CS033', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10327, 162, 'uni075_CS032', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10328, 162, 'uni075_CS031', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10329, 162, 'uni075_CS030', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10330, 162, 'uni075_CS029', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10331, 162, 'uni075_CS028', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10332, 162, 'uni075_CS027', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10333, 162, 'uni075_CS026', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10334, 162, 'uni075_CS025', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10335, 162, 'uni075_CS024', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10336, 162, 'uni075_CS023', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10337, 162, 'uni075_CS021', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10338, 162, 'uni075_CS020', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10339, 162, 'uni075_CS019', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10340, 162, 'uni075_CS018', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10341, 162, 'uni075_CS017', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10342, 162, 'uni075_CS016', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10343, 162, 'uni075_CS015', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10344, 162, 'uni075_CS013', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10345, 162, 'uni075_CS011', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10346, 162, 'uni075_CS010', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10347, 162, 'uni075_CS009', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10348, 162, 'uni075_CS042', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10349, 162, 'uni075_CS008', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10350, 162, 'uni075_CS041', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10351, 162, 'uni075_CS007', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10352, 162, 'uni075_CS006', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10353, 162, 'uni075_CS005', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10354, 162, 'uni075_CS004', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10355, 162, 'uni075_CS003', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10356, 162, 'uni075_CS002', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10357, 162, 'uni075_CS001', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10358, 162, 'uni074_cs064', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10359, 162, 'uni074_CS063', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10360, 162, 'uni074_CS062', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10361, 162, 'uni074_CS061', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10362, 162, 'uni074_CS060', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10363, 162, 'uni074_CS059', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10364, 162, 'uni074_CS058', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10365, 162, 'uni074_CS057', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10366, 162, 'uni074_CS056', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10367, 162, 'uni074_CS055', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10368, 162, 'uni073_CS053', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10369, 162, 'uni073_CS052', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10370, 162, 'uni073_CS051', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10371, 162, 'uni073_CS050', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10372, 162, 'uni073_CS049', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10373, 162, 'uni073_CS048', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10374, 162, 'uni073_CS047', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10375, 162, 'uni073_CS046', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10376, 162, 'uni073_CS045', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10377, 162, 'uni073_CS044', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10378, 162, 'uni073_CS043', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10379, 162, 'uni072_CS005', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10380, 162, 'uni072_CS004', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10381, 162, 'uni072_CS003', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10382, 162, 'uni072_CS002', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10383, 162, 'uni072_CS001', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10384, 162, 'uni004_fac038', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10385, 162, 'uni003_Course116', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10386, 162, 'uni003_Course115', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10387, 162, 'uni003_Course114', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10388, 162, 'uni003_Course113', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10389, 162, 'uni003_Course112', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10390, 162, 'uni003_Course111', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10391, 162, 'uni003_Course110', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10392, 162, 'uni003_Course109', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10393, 162, 'uni003_Course94', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10394, 162, 'uni003_Course156', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10395, 162, 'uni003_course025', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10396, 162, 'uni003_Course97', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10397, 162, 'uni003_Course2', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10398, 162, 'uni003_course020', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10399, 162, 'uni003_Course91', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10400, 162, 'uni003_course004', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10401, 162, 'uni003_course002', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10402, 162, 'uni002_Course024', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10403, 162, 'uni002_uni002_uni002_Course130', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10404, 162, 'uni002_uni002_uni002_Course120', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10405, 162, 'uni002_Course121', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10406, 162, 'uni002_Course120', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10407, 162, 'uni002_Course016', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10408, 162, 'uni002_Course013', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10409, 162, 'uni002_Course012', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10410, 162, 'uni001_cours043', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10411, 162, 'uni001_cours101', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10412, 162, 'uni001_Course130', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10413, 162, 'uni001_cours065', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10414, 162, 'uni001_cours027', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10415, 162, 'uni001_Course7', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10416, 162, 'uni001_cours007', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10417, 162, 'uni001_cours006', 11, 10, 0, 30);
INSERT INTO `create_plan` VALUES (10418, 162, 'uni077_CS007', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10419, 162, 'uni077_CS006', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10420, 162, 'uni077_CS005', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10421, 162, 'uni077_CS004', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10422, 162, 'uni077_CS003', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10423, 162, 'uni077_CS002', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10424, 162, 'uni077_CS001', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10425, 162, 'uni076_CS004', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10426, 162, 'uni076_CS003', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10427, 162, 'uni076_CS002', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10428, 162, 'uni076_CS001', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10429, 162, 'uni075_CS040', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10430, 162, 'uni075_CS039', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10431, 162, 'uni075_CS038', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10432, 162, 'uni075_CS037', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10433, 162, 'uni075_CS036', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10434, 162, 'uni075_CS035', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10435, 162, 'uni075_CS034', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10436, 162, 'uni075_CS033', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10437, 162, 'uni075_CS032', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10438, 162, 'uni075_CS031', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10439, 162, 'uni075_CS030', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10440, 162, 'uni075_CS029', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10441, 162, 'uni075_CS028', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10442, 162, 'uni075_CS027', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10443, 162, 'uni075_CS026', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10444, 162, 'uni075_CS025', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10445, 162, 'uni075_CS024', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10446, 162, 'uni075_CS023', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10447, 162, 'uni075_CS021', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10448, 162, 'uni075_CS020', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10449, 162, 'uni075_CS019', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10450, 162, 'uni075_CS018', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10451, 162, 'uni075_CS017', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10452, 162, 'uni075_CS016', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10453, 162, 'uni075_CS015', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10454, 162, 'uni075_CS013', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10455, 162, 'uni075_CS011', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10456, 162, 'uni075_CS010', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10457, 162, 'uni075_CS009', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10458, 162, 'uni075_CS042', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10459, 162, 'uni075_CS008', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10460, 162, 'uni075_CS041', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10461, 162, 'uni075_CS007', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10462, 162, 'uni075_CS006', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10463, 162, 'uni075_CS005', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10464, 162, 'uni075_CS004', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10465, 162, 'uni075_CS003', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10466, 162, 'uni075_CS002', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10467, 162, 'uni075_CS001', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10468, 162, 'uni074_cs064', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10469, 162, 'uni074_CS063', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10470, 162, 'uni074_CS062', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10471, 162, 'uni074_CS061', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10472, 162, 'uni074_CS060', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10473, 162, 'uni074_CS059', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10474, 162, 'uni074_CS058', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10475, 162, 'uni074_CS057', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10476, 162, 'uni074_CS056', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10477, 162, 'uni074_CS055', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10478, 162, 'uni073_CS053', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10479, 162, 'uni073_CS052', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10480, 162, 'uni073_CS051', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10481, 162, 'uni073_CS050', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10482, 162, 'uni073_CS049', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10483, 162, 'uni073_CS048', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10484, 162, 'uni073_CS047', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10485, 162, 'uni073_CS046', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10486, 162, 'uni073_CS045', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10487, 162, 'uni073_CS044', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10488, 162, 'uni073_CS043', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10489, 162, 'uni072_CS005', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10490, 162, 'uni072_CS004', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10491, 162, 'uni072_CS003', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10492, 162, 'uni072_CS002', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10493, 162, 'uni072_CS001', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10494, 162, 'uni004_fac037', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10495, 162, 'uni004_fac036', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10496, 162, 'uni004_fac035', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10497, 162, 'uni004_fac034', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10498, 162, 'uni004_fac033', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10499, 162, 'uni004_fac032', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10500, 162, 'uni004_fac031', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10501, 162, 'uni004_fac030', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10502, 162, 'uni004_fac029', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10503, 162, 'uni004_fac028', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10504, 162, 'uni004_fac027', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10505, 162, 'uni004_Course7', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10506, 162, 'uni004_fac026', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10507, 162, 'uni004_fac025', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10508, 162, 'uni004_fac024', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10509, 162, 'uni004_fac023', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10510, 162, 'uni004_fac022', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10511, 162, 'uni004_fac021', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10512, 162, 'uni004_fac020', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10513, 162, 'uni004_fac019', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10514, 162, 'uni004_fac018', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10515, 162, 'uni004_fac017', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10516, 162, 'uni004_fac016', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10517, 162, 'uni004_fac015', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10518, 162, 'uni004_fac038', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10519, 162, 'uni004_fac014', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10520, 162, 'uni004_fac013', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10521, 162, 'uni004_fac012', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10522, 162, 'uni004_fac011', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10523, 162, 'uni004_fac010', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10524, 162, 'uni004_fac009', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10525, 162, 'uni004_fac008', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10526, 162, 'uni004_fac007', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10527, 162, 'uni004_fac006', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10528, 162, 'uni004_fac005', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10529, 162, 'uni004_fac004', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10530, 162, 'uni004_fac003', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10531, 162, 'uni004_fac002', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10532, 162, 'uni004_fac001', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10533, 162, 'uni003_Course116', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10534, 162, 'uni003_Course115', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10535, 162, 'uni003_Course114', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10536, 162, 'uni003_Course113', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10537, 162, 'uni003_Course112', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10538, 162, 'uni003_Course111', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10539, 162, 'uni003_Course110', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10540, 162, 'uni003_Course109', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10541, 162, 'uni003_CS101', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10542, 162, 'uni003_Course94', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10543, 162, 'uni003_Course156', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10544, 162, 'uni003_CS100', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10545, 162, 'uni003_Course97', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10546, 162, 'uni003_Course2', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10547, 162, 'uni003_course020', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10548, 162, 'uni003_Course91', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10549, 162, 'uni003_course004', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10550, 162, 'uni003_course002', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10551, 162, 'uni002_Course026', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10552, 162, 'uni002_Course025', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10553, 162, 'uni002_Course024', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10554, 162, 'uni002_Course023', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10555, 162, 'uni002_Course022', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10556, 162, 'uni002_Course021', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10557, 162, 'uni002_Course020', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10558, 162, 'uni002_Course019', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10559, 162, 'uni002_Course018', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10560, 162, 'uni002_Course017', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10561, 162, 'uni002_uni002_uni002_Course130', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10562, 162, 'uni002_uni002_uni002_Course120', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10563, 162, 'uni002_CS101', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10564, 162, 'uni002_CS100', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10565, 162, 'uni002_Course121', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10566, 162, 'uni002_Course120', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10567, 162, 'uni002_Course035', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10568, 162, 'uni002_Course016', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10569, 162, 'uni002_Course015', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10570, 162, 'uni002_Course014', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10571, 162, 'uni002_Course013', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10572, 162, 'uni002_Course012', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10573, 162, 'uni002_Course011', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10574, 162, 'uni002_Course010', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10575, 162, 'uni002_Course009', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10576, 162, 'uni002_Course008', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10577, 162, 'uni002_Course007', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10578, 162, 'uni002_Course006', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10579, 162, 'uni002_uni002_Course110', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10580, 162, 'uni002_Course005', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10581, 162, 'uni002_Course004', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10582, 162, 'uni002_Course003', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10583, 162, 'uni002_Course002', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10584, 162, 'uni002_Course001', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10585, 162, 'uni001_doc031', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10586, 162, 'uni001_Course13', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10587, 162, 'uni001_cours043', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10588, 162, 'uni001_cours042', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10589, 162, 'uni001_CS102', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10590, 162, 'uni001_cours106', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10591, 162, 'uni001_cours105', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10592, 162, 'uni001_cours104', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10593, 162, 'uni001_cours103', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10594, 162, 'uni001_cours102', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10595, 162, 'uni001_cours101', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10596, 162, 'uni001_Course30', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10597, 162, 'uni001_Course21', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10598, 162, 'uni001_cours100', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10599, 162, 'uni001_cours099', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10600, 162, 'uni001_cours098', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10601, 162, 'uni001_Course19', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10602, 162, 'uni001_cours097', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10603, 162, 'uni001_cours096', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10604, 162, 'uni001_cours095', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10605, 162, 'uni001_cours094', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10606, 162, 'uni001_cours093', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10607, 162, 'uni001_cours092', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10608, 162, 'uni001_cours091', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10609, 162, 'uni001_cours090', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10610, 162, 'uni001_cours089', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10611, 162, 'uni001_cours088', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10612, 162, 'uni001_cours087', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10613, 162, 'uni001_cours086', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10614, 162, 'uni001_cours085', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10615, 162, 'uni001_cours084', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10616, 162, 'uni001_cours083', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10617, 162, 'uni001_cours082', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10618, 162, 'uni001_cours081', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10619, 162, 'uni001_cours080', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10620, 162, 'uni001_cours079', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10621, 162, 'uni001_cours078', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10622, 162, 'uni001_cours077', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10623, 162, 'uni001_Course56', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10624, 162, 'uni001_Course17', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10625, 162, 'uni001_Course15', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10626, 162, 'uni001_Course130', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10627, 162, 'uni001_cours076', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10628, 162, 'uni001_cours075', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10629, 162, 'uni001_cours074', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10630, 162, 'uni001_cours073', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10631, 162, 'uni001_cours072', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10632, 162, 'uni001_cours071', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10633, 162, 'uni001_cours070', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10634, 162, 'uni001_cours069', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10635, 162, 'uni001_cours068', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10636, 162, 'uni001_cours067', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10637, 162, 'uni001_cours066', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10638, 162, 'uni001_cours065', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10639, 162, 'uni001_cours064', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10640, 162, 'uni001_cours063', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10641, 162, 'uni001_Course14', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10642, 162, 'uni001_cours062', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10643, 162, 'uni001_cours061', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10644, 162, 'uni001_cours060', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10645, 162, 'uni001_cours058', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10646, 162, 'uni001_cours057', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10647, 162, 'uni001_cours056', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10648, 162, 'uni001_cours055', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10649, 162, 'uni001_cours054', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10650, 162, 'uni001_cours053', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10651, 162, 'uni001_cours052', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10652, 162, 'uni001_cours051', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10653, 162, 'uni001_cours050', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10654, 162, 'uni001_cours049', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10655, 162, 'uni001_cours048', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10656, 162, 'uni001_cours047', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10657, 162, 'uni001_cours046', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10658, 162, 'uni001_cours045', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10659, 162, 'uni001_cours044', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10660, 162, 'uni001_Course8', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10661, 162, 'uni001_Course12', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10662, 162, 'uni001_Course11', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10663, 162, 'uni001_cours041', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10664, 162, 'uni001_cours040', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10665, 162, 'uni001_cours039', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10666, 162, 'uni001_cours038', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10667, 162, 'uni001_cours037', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10668, 162, 'uni001_cours036', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10669, 162, 'uni001_cours035', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10670, 162, 'uni001_cours034', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10671, 162, 'uni001_cours033', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10672, 162, 'uni001_cours032', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10673, 162, 'uni001_Course9', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10674, 162, 'uni001_Course10', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10675, 162, 'uni001_cours031', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10676, 162, 'uni001_cours030', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10677, 162, 'uni001_cours029', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10678, 162, 'uni001_cours028', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10679, 162, 'uni001_cours027', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10680, 162, 'uni001_cours026', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10681, 162, 'uni001_cours025', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10682, 162, 'uni001_cours024', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10683, 162, 'uni001_cours023', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10684, 162, 'uni001_CS101', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10685, 162, 'uni001_Course7', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10686, 162, 'uni001_cours022', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10687, 162, 'uni001_cours021', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10688, 162, 'uni001_cours020', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10689, 162, 'uni001_cours019', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10690, 162, 'uni001_cours018', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10691, 162, 'uni001_cours017', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10692, 162, 'uni001_cours016', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10693, 162, 'uni001_cours015', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10694, 162, 'uni001_cours014', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10695, 162, 'uni001_cours013', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10696, 162, 'uni001_cours012', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10697, 162, 'uni001_CS100', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10698, 162, 'uni001_cours011', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10699, 162, 'uni001_cours010', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10700, 162, 'uni001_cours009', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10701, 162, 'uni001_cours008', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10702, 162, 'uni001_cours007', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10703, 162, 'uni001_cours006', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10704, 162, 'uni001_cours005', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10705, 162, 'uni001_cours004', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10706, 162, 'uni001_cours003', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10707, 162, 'uni001_cours002', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10708, 162, 'uni001_cours001', 11, 10, 0, 34);
INSERT INTO `create_plan` VALUES (10709, 162, 'uni077_CS007', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10710, 162, 'uni077_CS006', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10711, 162, 'uni077_CS005', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10712, 162, 'uni077_CS004', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10713, 162, 'uni077_CS003', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10714, 162, 'uni077_CS002', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10715, 162, 'uni077_CS001', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10716, 162, 'uni076_CS004', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10717, 162, 'uni076_CS003', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10718, 162, 'uni076_CS002', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10719, 162, 'uni076_CS001', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10720, 162, 'uni075_CS040', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10721, 162, 'uni075_CS039', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10722, 162, 'uni075_CS038', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10723, 162, 'uni075_CS037', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10724, 162, 'uni075_CS036', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10725, 162, 'uni075_CS035', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10726, 162, 'uni075_CS034', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10727, 162, 'uni075_CS033', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10728, 162, 'uni075_CS032', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10729, 162, 'uni075_CS031', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10730, 162, 'uni075_CS030', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10731, 162, 'uni075_CS029', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10732, 162, 'uni075_CS028', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10733, 162, 'uni075_CS027', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10734, 162, 'uni075_CS026', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10735, 162, 'uni075_CS025', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10736, 162, 'uni075_CS024', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10737, 162, 'uni075_CS023', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10738, 162, 'uni075_CS021', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10739, 162, 'uni075_CS020', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10740, 162, 'uni075_CS019', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10741, 162, 'uni075_CS018', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10742, 162, 'uni075_CS017', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10743, 162, 'uni075_CS016', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10744, 162, 'uni075_CS015', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10745, 162, 'uni075_CS013', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10746, 162, 'uni075_CS011', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10747, 162, 'uni075_CS010', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10748, 162, 'uni075_CS009', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10749, 162, 'uni075_CS042', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10750, 162, 'uni075_CS008', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10751, 162, 'uni075_CS041', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10752, 162, 'uni075_CS007', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10753, 162, 'uni075_CS006', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10754, 162, 'uni075_CS005', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10755, 162, 'uni075_CS004', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10756, 162, 'uni075_CS003', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10757, 162, 'uni075_CS002', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10758, 162, 'uni075_CS001', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10759, 162, 'uni074_cs064', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10760, 162, 'uni074_CS063', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10761, 162, 'uni074_CS062', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10762, 162, 'uni074_CS061', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10763, 162, 'uni074_CS060', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10764, 162, 'uni074_CS059', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10765, 162, 'uni074_CS058', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10766, 162, 'uni074_CS057', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10767, 162, 'uni074_CS056', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10768, 162, 'uni074_CS055', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10769, 162, 'uni073_CS053', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10770, 162, 'uni073_CS052', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10771, 162, 'uni073_CS051', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10772, 162, 'uni073_CS050', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10773, 162, 'uni073_CS049', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10774, 162, 'uni073_CS048', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10775, 162, 'uni073_CS047', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10776, 162, 'uni073_CS046', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10777, 162, 'uni073_CS045', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10778, 162, 'uni073_CS044', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10779, 162, 'uni073_CS043', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10780, 162, 'uni072_CS005', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10781, 162, 'uni072_CS004', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10782, 162, 'uni072_CS003', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10783, 162, 'uni072_CS002', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10784, 162, 'uni072_CS001', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10785, 162, 'uni004_fac037', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10786, 162, 'uni004_fac036', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10787, 162, 'uni004_fac035', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10788, 162, 'uni004_fac034', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10789, 162, 'uni004_fac033', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10790, 162, 'uni004_fac032', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10791, 162, 'uni004_fac031', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10792, 162, 'uni004_fac030', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10793, 162, 'uni004_fac029', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10794, 162, 'uni004_fac028', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10795, 162, 'uni004_fac027', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10796, 162, 'uni004_Course7', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10797, 162, 'uni004_fac026', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10798, 162, 'uni004_fac025', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10799, 162, 'uni004_fac024', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10800, 162, 'uni004_fac023', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10801, 162, 'uni004_fac022', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10802, 162, 'uni004_fac021', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10803, 162, 'uni004_fac020', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10804, 162, 'uni004_fac019', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10805, 162, 'uni004_fac018', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10806, 162, 'uni004_fac017', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10807, 162, 'uni004_fac016', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10808, 162, 'uni004_fac015', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10809, 162, 'uni004_fac038', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10810, 162, 'uni004_fac014', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10811, 162, 'uni004_fac013', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10812, 162, 'uni004_fac012', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10813, 162, 'uni004_fac011', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10814, 162, 'uni004_fac010', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10815, 162, 'uni004_fac009', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10816, 162, 'uni004_fac008', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10817, 162, 'uni004_fac007', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10818, 162, 'uni004_fac006', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10819, 162, 'uni004_fac005', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10820, 162, 'uni004_fac004', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10821, 162, 'uni004_fac003', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10822, 162, 'uni004_fac002', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10823, 162, 'uni004_fac001', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10824, 162, 'uni003_Course116', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10825, 162, 'uni003_Course115', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10826, 162, 'uni003_Course114', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10827, 162, 'uni003_Course113', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10828, 162, 'uni003_Course112', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10829, 162, 'uni003_Course111', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10830, 162, 'uni003_Course110', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10831, 162, 'uni003_Course109', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10832, 162, 'uni003_CS101', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10833, 162, 'uni003_Course94', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10834, 162, 'uni003_Course156', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10835, 162, 'uni003_course025', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10836, 162, 'uni003_CS100', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10837, 162, 'uni003_Course97', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10838, 162, 'uni003_Course2', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10839, 162, 'uni003_course020', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10840, 162, 'uni003_Course91', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10841, 162, 'uni003_course004', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10842, 162, 'uni003_course002', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10843, 162, 'uni002_Course026', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10844, 162, 'uni002_Course025', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10845, 162, 'uni002_Course024', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10846, 162, 'uni002_Course023', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10847, 162, 'uni002_Course022', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10848, 162, 'uni002_Course021', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10849, 162, 'uni002_Course020', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10850, 162, 'uni002_Course019', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10851, 162, 'uni002_Course018', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10852, 162, 'uni002_Course017', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10853, 162, 'uni002_uni002_uni002_Course130', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10854, 162, 'uni002_uni002_uni002_Course120', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10855, 162, 'uni002_CS101', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10856, 162, 'uni002_CS100', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10857, 162, 'uni002_Course121', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10858, 162, 'uni002_Course120', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10859, 162, 'uni002_Course035', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10860, 162, 'uni002_Course016', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10861, 162, 'uni002_Course015', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10862, 162, 'uni002_Course014', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10863, 162, 'uni002_Course013', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10864, 162, 'uni002_Course012', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10865, 162, 'uni002_Course011', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10866, 162, 'uni002_Course010', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10867, 162, 'uni002_Course009', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10868, 162, 'uni002_Course008', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10869, 162, 'uni002_Course007', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10870, 162, 'uni002_Course006', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10871, 162, 'uni002_uni002_Course110', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10872, 162, 'uni002_Course005', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10873, 162, 'uni002_Course004', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10874, 162, 'uni002_Course003', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10875, 162, 'uni002_Course002', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10876, 162, 'uni002_Course001', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10877, 162, 'uni001_doc031', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10878, 162, 'uni001_Course13', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10879, 162, 'uni001_cours043', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10880, 162, 'uni001_cours042', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10881, 162, 'uni001_CS102', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10882, 162, 'uni001_cours106', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10883, 162, 'uni001_cours105', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10884, 162, 'uni001_cours104', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10885, 162, 'uni001_cours103', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10886, 162, 'uni001_cours102', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10887, 162, 'uni001_cours101', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10888, 162, 'uni001_Course30', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10889, 162, 'uni001_Course21', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10890, 162, 'uni001_cours100', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10891, 162, 'uni001_cours099', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10892, 162, 'uni001_cours098', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10893, 162, 'uni001_Course19', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10894, 162, 'uni001_cours097', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10895, 162, 'uni001_cours096', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10896, 162, 'uni001_cours095', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10897, 162, 'uni001_cours094', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10898, 162, 'uni001_cours093', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10899, 162, 'uni001_cours092', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10900, 162, 'uni001_cours091', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10901, 162, 'uni001_cours090', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10902, 162, 'uni001_cours089', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10903, 162, 'uni001_cours088', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10904, 162, 'uni001_cours087', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10905, 162, 'uni001_cours086', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10906, 162, 'uni001_cours085', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10907, 162, 'uni001_cours084', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10908, 162, 'uni001_cours083', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10909, 162, 'uni001_cours082', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10910, 162, 'uni001_cours081', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10911, 162, 'uni001_cours080', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10912, 162, 'uni001_cours079', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10913, 162, 'uni001_cours078', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10914, 162, 'uni001_cours077', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10915, 162, 'uni001_Course56', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10916, 162, 'uni001_Course17', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10917, 162, 'uni001_Course15', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10918, 162, 'uni001_Course130', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10919, 162, 'uni001_cours076', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10920, 162, 'uni001_cours075', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10921, 162, 'uni001_cours074', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10922, 162, 'uni001_cours073', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10923, 162, 'uni001_cours072', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10924, 162, 'uni001_cours071', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10925, 162, 'uni001_cours070', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10926, 162, 'uni001_cours069', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10927, 162, 'uni001_cours068', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10928, 162, 'uni001_cours067', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10929, 162, 'uni001_cours066', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10930, 162, 'uni001_cours065', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10931, 162, 'uni001_cours064', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10932, 162, 'uni001_cours063', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10933, 162, 'uni001_Course14', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10934, 162, 'uni001_cours062', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10935, 162, 'uni001_cours061', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10936, 162, 'uni001_cours060', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10937, 162, 'uni001_cours058', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10938, 162, 'uni001_cours057', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10939, 162, 'uni001_cours056', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10940, 162, 'uni001_cours055', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10941, 162, 'uni001_cours054', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10942, 162, 'uni001_cours053', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10943, 162, 'uni001_cours052', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10944, 162, 'uni001_cours051', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10945, 162, 'uni001_cours050', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10946, 162, 'uni001_cours049', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10947, 162, 'uni001_cours048', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10948, 162, 'uni001_cours047', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10949, 162, 'uni001_cours046', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10950, 162, 'uni001_cours045', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10951, 162, 'uni001_cours044', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10952, 162, 'uni001_Course8', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10953, 162, 'uni001_Course12', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10954, 162, 'uni001_Course11', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10955, 162, 'uni001_cours041', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10956, 162, 'uni001_cours040', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10957, 162, 'uni001_cours039', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10958, 162, 'uni001_cours038', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10959, 162, 'uni001_cours037', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10960, 162, 'uni001_cours036', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10961, 162, 'uni001_cours035', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10962, 162, 'uni001_cours034', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10963, 162, 'uni001_cours033', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10964, 162, 'uni001_cours032', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10965, 162, 'uni001_Course9', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10966, 162, 'uni001_Course10', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10967, 162, 'uni001_cours031', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10968, 162, 'uni001_cours030', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10969, 162, 'uni001_cours029', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10970, 162, 'uni001_cours028', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10971, 162, 'uni001_cours027', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10972, 162, 'uni001_cours026', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10973, 162, 'uni001_cours025', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10974, 162, 'uni001_cours024', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10975, 162, 'uni001_cours023', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10976, 162, 'uni001_CS101', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10977, 162, 'uni001_Course7', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10978, 162, 'uni001_cours022', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10979, 162, 'uni001_cours021', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10980, 162, 'uni001_cours020', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10981, 162, 'uni001_cours019', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10982, 162, 'uni001_cours018', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10983, 162, 'uni001_cours017', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10984, 162, 'uni001_cours016', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10985, 162, 'uni001_cours015', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10986, 162, 'uni001_cours014', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10987, 162, 'uni001_cours013', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10988, 162, 'uni001_cours012', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10989, 162, 'uni001_CS100', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10990, 162, 'uni001_cours011', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10991, 162, 'uni001_cours010', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10992, 162, 'uni001_cours009', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10993, 162, 'uni001_cours008', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10994, 162, 'uni001_cours007', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10995, 162, 'uni001_cours006', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10996, 162, 'uni001_cours005', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10997, 162, 'uni001_cours004', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10998, 162, 'uni001_cours003', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (10999, 162, 'uni001_cours002', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (11000, 162, 'uni001_cours001', 12, 10, 0, 32);
INSERT INTO `create_plan` VALUES (11001, 162, 'uni077_CS007', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11002, 162, 'uni077_CS006', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11003, 162, 'uni077_CS005', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11004, 162, 'uni077_CS004', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11005, 162, 'uni077_CS003', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11006, 162, 'uni077_CS002', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11007, 162, 'uni077_CS001', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11008, 162, 'uni076_CS004', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11009, 162, 'uni076_CS003', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11010, 162, 'uni076_CS002', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11011, 162, 'uni076_CS001', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11012, 162, 'uni075_CS040', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11013, 162, 'uni075_CS039', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11014, 162, 'uni075_CS038', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11015, 162, 'uni075_CS037', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11016, 162, 'uni075_CS036', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11017, 162, 'uni075_CS035', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11018, 162, 'uni075_CS034', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11019, 162, 'uni075_CS033', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11020, 162, 'uni075_CS032', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11021, 162, 'uni075_CS031', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11022, 162, 'uni075_CS030', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11023, 162, 'uni075_CS029', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11024, 162, 'uni075_CS028', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11025, 162, 'uni075_CS027', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11026, 162, 'uni075_CS026', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11027, 162, 'uni075_CS025', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11028, 162, 'uni075_CS024', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11029, 162, 'uni075_CS023', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11030, 162, 'uni075_CS021', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11031, 162, 'uni075_CS020', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11032, 162, 'uni075_CS019', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11033, 162, 'uni075_CS018', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11034, 162, 'uni075_CS017', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11035, 162, 'uni075_CS016', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11036, 162, 'uni075_CS015', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11037, 162, 'uni075_CS013', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11038, 162, 'uni075_CS011', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11039, 162, 'uni075_CS010', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11040, 162, 'uni075_CS009', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11041, 162, 'uni075_CS042', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11042, 162, 'uni075_CS008', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11043, 162, 'uni075_CS041', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11044, 162, 'uni075_CS007', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11045, 162, 'uni075_CS006', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11046, 162, 'uni075_CS005', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11047, 162, 'uni075_CS004', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11048, 162, 'uni075_CS003', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11049, 162, 'uni075_CS002', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11050, 162, 'uni075_CS001', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11051, 162, 'uni074_cs064', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11052, 162, 'uni074_CS063', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11053, 162, 'uni074_CS062', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11054, 162, 'uni074_CS061', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11055, 162, 'uni074_CS060', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11056, 162, 'uni074_CS059', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11057, 162, 'uni074_CS058', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11058, 162, 'uni074_CS057', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11059, 162, 'uni074_CS056', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11060, 162, 'uni074_CS055', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11061, 162, 'uni073_CS053', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11062, 162, 'uni073_CS052', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11063, 162, 'uni073_CS051', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11064, 162, 'uni073_CS050', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11065, 162, 'uni073_CS049', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11066, 162, 'uni073_CS048', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11067, 162, 'uni073_CS047', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11068, 162, 'uni073_CS046', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11069, 162, 'uni073_CS045', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11070, 162, 'uni073_CS044', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11071, 162, 'uni073_CS043', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11072, 162, 'uni072_CS005', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11073, 162, 'uni072_CS004', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11074, 162, 'uni072_CS003', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11075, 162, 'uni072_CS002', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11076, 162, 'uni072_CS001', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11077, 162, 'uni004_fac037', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11078, 162, 'uni004_fac036', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11079, 162, 'uni004_fac035', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11080, 162, 'uni004_fac034', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11081, 162, 'uni004_fac033', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11082, 162, 'uni004_fac032', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11083, 162, 'uni004_fac031', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11084, 162, 'uni004_fac030', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11085, 162, 'uni004_fac029', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11086, 162, 'uni004_fac028', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11087, 162, 'uni004_fac027', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11088, 162, 'uni004_Course7', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11089, 162, 'uni004_fac026', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11090, 162, 'uni004_fac025', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11091, 162, 'uni004_fac024', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11092, 162, 'uni004_fac023', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11093, 162, 'uni004_fac022', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11094, 162, 'uni004_fac021', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11095, 162, 'uni004_fac020', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11096, 162, 'uni004_fac019', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11097, 162, 'uni004_fac018', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11098, 162, 'uni004_fac017', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11099, 162, 'uni004_fac016', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11100, 162, 'uni004_fac015', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11101, 162, 'uni004_fac038', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11102, 162, 'uni004_fac014', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11103, 162, 'uni004_fac013', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11104, 162, 'uni004_fac012', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11105, 162, 'uni004_fac011', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11106, 162, 'uni004_fac010', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11107, 162, 'uni004_fac009', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11108, 162, 'uni004_fac008', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11109, 162, 'uni004_fac007', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11110, 162, 'uni004_fac006', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11111, 162, 'uni004_fac005', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11112, 162, 'uni004_fac004', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11113, 162, 'uni004_fac003', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11114, 162, 'uni004_fac002', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11115, 162, 'uni004_fac001', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11116, 162, 'uni003_Course116', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11117, 162, 'uni003_Course115', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11118, 162, 'uni003_Course114', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11119, 162, 'uni003_Course113', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11120, 162, 'uni003_Course112', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11121, 162, 'uni003_Course111', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11122, 162, 'uni003_Course110', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11123, 162, 'uni003_Course109', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11124, 162, 'uni003_CS101', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11125, 162, 'uni003_Course94', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11126, 162, 'uni003_Course156', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11127, 162, 'uni003_course025', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11128, 162, 'uni003_CS100', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11129, 162, 'uni003_Course97', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11130, 162, 'uni003_Course2', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11131, 162, 'uni003_course020', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11132, 162, 'uni003_Course91', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11133, 162, 'uni003_course004', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11134, 162, 'uni003_course002', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11135, 162, 'uni002_Course026', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11136, 162, 'uni002_Course025', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11137, 162, 'uni002_Course024', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11138, 162, 'uni002_Course023', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11139, 162, 'uni002_Course022', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11140, 162, 'uni002_Course021', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11141, 162, 'uni002_Course020', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11142, 162, 'uni002_Course019', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11143, 162, 'uni002_Course018', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11144, 162, 'uni002_Course017', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11145, 162, 'uni002_uni002_uni002_Course130', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11146, 162, 'uni002_uni002_uni002_Course120', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11147, 162, 'uni002_CS101', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11148, 162, 'uni002_CS100', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11149, 162, 'uni002_Course121', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11150, 162, 'uni002_Course120', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11151, 162, 'uni002_Course035', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11152, 162, 'uni002_Course016', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11153, 162, 'uni002_Course015', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11154, 162, 'uni002_Course014', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11155, 162, 'uni002_Course013', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11156, 162, 'uni002_Course012', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11157, 162, 'uni002_Course011', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11158, 162, 'uni002_Course010', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11159, 162, 'uni002_Course009', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11160, 162, 'uni002_Course008', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11161, 162, 'uni002_Course007', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11162, 162, 'uni002_Course006', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11163, 162, 'uni002_uni002_Course110', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11164, 162, 'uni002_Course005', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11165, 162, 'uni002_Course004', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11166, 162, 'uni002_Course003', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11167, 162, 'uni002_Course002', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11168, 162, 'uni002_Course001', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11169, 162, 'uni001_doc031', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11170, 162, 'uni001_Course13', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11171, 162, 'uni001_cours043', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11172, 162, 'uni001_cours042', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11173, 162, 'uni001_CS102', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11174, 162, 'uni001_cours106', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11175, 162, 'uni001_cours105', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11176, 162, 'uni001_cours104', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11177, 162, 'uni001_cours103', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11178, 162, 'uni001_cours102', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11179, 162, 'uni001_cours101', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11180, 162, 'uni001_Course30', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11181, 162, 'uni001_Course21', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11182, 162, 'uni001_cours100', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11183, 162, 'uni001_cours099', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11184, 162, 'uni001_cours098', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11185, 162, 'uni001_Course19', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11186, 162, 'uni001_cours097', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11187, 162, 'uni001_cours096', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11188, 162, 'uni001_cours095', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11189, 162, 'uni001_cours094', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11190, 162, 'uni001_cours093', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11191, 162, 'uni001_cours092', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11192, 162, 'uni001_cours091', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11193, 162, 'uni001_cours090', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11194, 162, 'uni001_cours089', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11195, 162, 'uni001_cours088', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11196, 162, 'uni001_cours087', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11197, 162, 'uni001_cours086', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11198, 162, 'uni001_cours085', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11199, 162, 'uni001_cours084', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11200, 162, 'uni001_cours083', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11201, 162, 'uni001_cours082', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11202, 162, 'uni001_cours081', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11203, 162, 'uni001_cours080', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11204, 162, 'uni001_cours079', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11205, 162, 'uni001_cours078', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11206, 162, 'uni001_cours077', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11207, 162, 'uni001_Course56', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11208, 162, 'uni001_Course17', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11209, 162, 'uni001_Course15', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11210, 162, 'uni001_Course130', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11211, 162, 'uni001_cours076', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11212, 162, 'uni001_cours075', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11213, 162, 'uni001_cours074', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11214, 162, 'uni001_cours073', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11215, 162, 'uni001_cours072', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11216, 162, 'uni001_cours071', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11217, 162, 'uni001_cours070', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11218, 162, 'uni001_cours069', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11219, 162, 'uni001_cours068', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11220, 162, 'uni001_cours067', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11221, 162, 'uni001_cours066', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11222, 162, 'uni001_cours065', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11223, 162, 'uni001_cours064', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11224, 162, 'uni001_cours063', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11225, 162, 'uni001_Course14', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11226, 162, 'uni001_cours062', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11227, 162, 'uni001_cours061', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11228, 162, 'uni001_cours060', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11229, 162, 'uni001_cours058', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11230, 162, 'uni001_cours057', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11231, 162, 'uni001_cours056', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11232, 162, 'uni001_cours055', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11233, 162, 'uni001_cours054', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11234, 162, 'uni001_cours053', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11235, 162, 'uni001_cours052', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11236, 162, 'uni001_cours051', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11237, 162, 'uni001_cours050', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11238, 162, 'uni001_cours049', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11239, 162, 'uni001_cours048', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11240, 162, 'uni001_cours047', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11241, 162, 'uni001_cours046', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11242, 162, 'uni001_cours045', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11243, 162, 'uni001_cours044', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11244, 162, 'uni001_Course8', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11245, 162, 'uni001_Course12', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11246, 162, 'uni001_Course11', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11247, 162, 'uni001_cours041', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11248, 162, 'uni001_cours040', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11249, 162, 'uni001_cours039', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11250, 162, 'uni001_cours038', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11251, 162, 'uni001_cours037', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11252, 162, 'uni001_cours036', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11253, 162, 'uni001_cours035', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11254, 162, 'uni001_cours034', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11255, 162, 'uni001_cours033', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11256, 162, 'uni001_cours032', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11257, 162, 'uni001_Course9', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11258, 162, 'uni001_Course10', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11259, 162, 'uni001_cours031', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11260, 162, 'uni001_cours030', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11261, 162, 'uni001_cours029', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11262, 162, 'uni001_cours028', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11263, 162, 'uni001_cours027', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11264, 162, 'uni001_cours026', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11265, 162, 'uni001_cours025', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11266, 162, 'uni001_cours024', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11267, 162, 'uni001_cours023', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11268, 162, 'uni001_CS101', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11269, 162, 'uni001_Course7', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11270, 162, 'uni001_cours022', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11271, 162, 'uni001_cours021', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11272, 162, 'uni001_cours020', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11273, 162, 'uni001_cours019', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11274, 162, 'uni001_cours018', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11275, 162, 'uni001_cours017', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11276, 162, 'uni001_cours016', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11277, 162, 'uni001_cours015', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11278, 162, 'uni001_cours014', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11279, 162, 'uni001_cours013', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11280, 162, 'uni001_cours012', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11281, 162, 'uni001_CS100', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11282, 162, 'uni001_cours011', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11283, 162, 'uni001_cours010', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11284, 162, 'uni001_cours009', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11285, 162, 'uni001_cours008', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11286, 162, 'uni001_cours007', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11287, 162, 'uni001_cours006', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11288, 162, 'uni001_cours005', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11289, 162, 'uni001_cours004', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11290, 162, 'uni001_cours003', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11291, 162, 'uni001_cours002', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11292, 162, 'uni001_cours001', 13, 10, 0, 33);
INSERT INTO `create_plan` VALUES (11293, 162, 'uni077_CS007', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11294, 162, 'uni077_CS006', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11295, 162, 'uni077_CS005', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11296, 162, 'uni077_CS004', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11297, 162, 'uni077_CS003', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11298, 162, 'uni077_CS002', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11299, 162, 'uni077_CS001', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11300, 162, 'uni076_CS004', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11301, 162, 'uni076_CS003', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11302, 162, 'uni076_CS002', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11303, 162, 'uni076_CS001', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11304, 162, 'uni075_CS040', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11305, 162, 'uni075_CS039', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11306, 162, 'uni075_CS038', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11307, 162, 'uni075_CS037', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11308, 162, 'uni075_CS036', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11309, 162, 'uni075_CS035', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11310, 162, 'uni075_CS034', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11311, 162, 'uni075_CS033', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11312, 162, 'uni075_CS032', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11313, 162, 'uni075_CS031', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11314, 162, 'uni075_CS030', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11315, 162, 'uni075_CS029', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11316, 162, 'uni075_CS028', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11317, 162, 'uni075_CS027', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11318, 162, 'uni075_CS026', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11319, 162, 'uni075_CS025', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11320, 162, 'uni075_CS024', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11321, 162, 'uni075_CS023', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11322, 162, 'uni075_CS021', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11323, 162, 'uni075_CS020', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11324, 162, 'uni075_CS019', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11325, 162, 'uni075_CS018', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11326, 162, 'uni075_CS017', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11327, 162, 'uni075_CS016', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11328, 162, 'uni075_CS015', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11329, 162, 'uni075_CS013', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11330, 162, 'uni075_CS011', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11331, 162, 'uni075_CS010', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11332, 162, 'uni075_CS009', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11333, 162, 'uni075_CS042', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11334, 162, 'uni075_CS008', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11335, 162, 'uni075_CS041', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11336, 162, 'uni075_CS007', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11337, 162, 'uni075_CS006', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11338, 162, 'uni075_CS005', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11339, 162, 'uni075_CS004', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11340, 162, 'uni075_CS003', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11341, 162, 'uni075_CS002', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11342, 162, 'uni075_CS001', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11343, 162, 'uni074_cs064', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11344, 162, 'uni074_CS063', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11345, 162, 'uni074_CS062', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11346, 162, 'uni074_CS061', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11347, 162, 'uni074_CS060', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11348, 162, 'uni074_CS059', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11349, 162, 'uni074_CS058', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11350, 162, 'uni074_CS057', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11351, 162, 'uni074_CS056', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11352, 162, 'uni074_CS055', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11353, 162, 'uni073_CS053', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11354, 162, 'uni073_CS052', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11355, 162, 'uni073_CS051', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11356, 162, 'uni073_CS050', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11357, 162, 'uni073_CS049', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11358, 162, 'uni073_CS048', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11359, 162, 'uni073_CS047', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11360, 162, 'uni073_CS046', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11361, 162, 'uni073_CS045', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11362, 162, 'uni073_CS044', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11363, 162, 'uni073_CS043', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11364, 162, 'uni072_CS005', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11365, 162, 'uni072_CS004', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11366, 162, 'uni072_CS003', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11367, 162, 'uni072_CS002', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11368, 162, 'uni072_CS001', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11369, 162, 'uni004_fac037', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11370, 162, 'uni004_fac036', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11371, 162, 'uni004_fac035', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11372, 162, 'uni004_fac034', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11373, 162, 'uni004_fac033', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11374, 162, 'uni004_fac032', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11375, 162, 'uni004_fac031', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11376, 162, 'uni004_fac030', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11377, 162, 'uni004_fac029', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11378, 162, 'uni004_fac028', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11379, 162, 'uni004_fac027', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11380, 162, 'uni004_Course7', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11381, 162, 'uni004_fac026', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11382, 162, 'uni004_fac025', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11383, 162, 'uni004_fac024', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11384, 162, 'uni004_fac023', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11385, 162, 'uni004_fac022', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11386, 162, 'uni004_fac021', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11387, 162, 'uni004_fac020', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11388, 162, 'uni004_fac019', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11389, 162, 'uni004_fac018', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11390, 162, 'uni004_fac017', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11391, 162, 'uni004_fac016', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11392, 162, 'uni004_fac015', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11393, 162, 'uni004_fac038', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11394, 162, 'uni004_fac014', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11395, 162, 'uni004_fac013', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11396, 162, 'uni004_fac012', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11397, 162, 'uni004_fac011', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11398, 162, 'uni004_fac010', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11399, 162, 'uni004_fac009', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11400, 162, 'uni004_fac008', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11401, 162, 'uni004_fac007', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11402, 162, 'uni004_fac006', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11403, 162, 'uni004_fac005', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11404, 162, 'uni004_fac004', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11405, 162, 'uni004_fac003', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11406, 162, 'uni004_fac002', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11407, 162, 'uni004_fac001', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11408, 162, 'uni003_Course116', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11409, 162, 'uni003_Course115', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11410, 162, 'uni003_Course114', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11411, 162, 'uni003_Course113', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11412, 162, 'uni003_Course112', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11413, 162, 'uni003_Course111', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11414, 162, 'uni003_Course110', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11415, 162, 'uni003_Course109', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11416, 162, 'uni003_CS101', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11417, 162, 'uni003_Course94', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11418, 162, 'uni003_Course156', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11419, 162, 'uni003_course025', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11420, 162, 'uni003_CS100', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11421, 162, 'uni003_Course97', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11422, 162, 'uni003_Course2', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11423, 162, 'uni003_course020', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11424, 162, 'uni003_Course91', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11425, 162, 'uni003_course004', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11426, 162, 'uni003_course002', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11427, 162, 'uni002_Course026', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11428, 162, 'uni002_Course025', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11429, 162, 'uni002_Course024', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11430, 162, 'uni002_Course023', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11431, 162, 'uni002_Course022', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11432, 162, 'uni002_Course021', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11433, 162, 'uni002_Course020', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11434, 162, 'uni002_Course019', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11435, 162, 'uni002_Course018', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11436, 162, 'uni002_Course017', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11437, 162, 'uni002_uni002_uni002_Course130', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11438, 162, 'uni002_uni002_uni002_Course120', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11439, 162, 'uni002_CS101', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11440, 162, 'uni002_CS100', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11441, 162, 'uni002_Course121', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11442, 162, 'uni002_Course120', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11443, 162, 'uni002_Course035', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11444, 162, 'uni002_Course016', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11445, 162, 'uni002_Course015', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11446, 162, 'uni002_Course014', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11447, 162, 'uni002_Course013', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11448, 162, 'uni002_Course012', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11449, 162, 'uni002_Course011', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11450, 162, 'uni002_Course010', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11451, 162, 'uni002_Course009', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11452, 162, 'uni002_Course008', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11453, 162, 'uni002_Course007', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11454, 162, 'uni002_Course006', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11455, 162, 'uni002_uni002_Course110', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11456, 162, 'uni002_Course005', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11457, 162, 'uni002_Course004', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11458, 162, 'uni002_Course003', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11459, 162, 'uni002_Course002', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11460, 162, 'uni002_Course001', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11461, 162, 'uni001_doc031', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11462, 162, 'uni001_Course13', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11463, 162, 'uni001_cours043', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11464, 162, 'uni001_cours042', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11465, 162, 'uni001_CS102', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11466, 162, 'uni001_cours106', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11467, 162, 'uni001_cours105', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11468, 162, 'uni001_cours104', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11469, 162, 'uni001_cours103', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11470, 162, 'uni001_cours102', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11471, 162, 'uni001_cours101', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11472, 162, 'uni001_Course30', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11473, 162, 'uni001_Course21', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11474, 162, 'uni001_cours100', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11475, 162, 'uni001_cours099', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11476, 162, 'uni001_cours098', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11477, 162, 'uni001_Course19', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11478, 162, 'uni001_cours097', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11479, 162, 'uni001_cours096', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11480, 162, 'uni001_cours095', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11481, 162, 'uni001_cours094', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11482, 162, 'uni001_cours093', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11483, 162, 'uni001_cours092', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11484, 162, 'uni001_cours091', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11485, 162, 'uni001_cours090', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11486, 162, 'uni001_cours089', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11487, 162, 'uni001_cours088', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11488, 162, 'uni001_cours087', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11489, 162, 'uni001_cours086', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11490, 162, 'uni001_cours085', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11491, 162, 'uni001_cours084', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11492, 162, 'uni001_cours083', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11493, 162, 'uni001_cours082', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11494, 162, 'uni001_cours081', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11495, 162, 'uni001_cours080', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11496, 162, 'uni001_cours079', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11497, 162, 'uni001_cours078', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11498, 162, 'uni001_cours077', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11499, 162, 'uni001_Course56', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11500, 162, 'uni001_Course17', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11501, 162, 'uni001_Course15', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11502, 162, 'uni001_Course130', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11503, 162, 'uni001_cours076', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11504, 162, 'uni001_cours075', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11505, 162, 'uni001_cours074', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11506, 162, 'uni001_cours073', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11507, 162, 'uni001_cours072', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11508, 162, 'uni001_cours071', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11509, 162, 'uni001_cours070', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11510, 162, 'uni001_cours069', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11511, 162, 'uni001_cours068', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11512, 162, 'uni001_cours067', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11513, 162, 'uni001_cours066', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11514, 162, 'uni001_cours065', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11515, 162, 'uni001_cours064', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11516, 162, 'uni001_cours063', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11517, 162, 'uni001_Course14', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11518, 162, 'uni001_cours062', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11519, 162, 'uni001_cours061', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11520, 162, 'uni001_cours060', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11521, 162, 'uni001_cours058', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11522, 162, 'uni001_cours057', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11523, 162, 'uni001_cours056', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11524, 162, 'uni001_cours055', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11525, 162, 'uni001_cours054', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11526, 162, 'uni001_cours053', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11527, 162, 'uni001_cours052', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11528, 162, 'uni001_cours051', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11529, 162, 'uni001_cours050', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11530, 162, 'uni001_cours049', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11531, 162, 'uni001_cours048', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11532, 162, 'uni001_cours047', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11533, 162, 'uni001_cours046', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11534, 162, 'uni001_cours045', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11535, 162, 'uni001_cours044', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11536, 162, 'uni001_Course8', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11537, 162, 'uni001_Course12', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11538, 162, 'uni001_Course11', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11539, 162, 'uni001_cours041', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11540, 162, 'uni001_cours040', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11541, 162, 'uni001_cours039', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11542, 162, 'uni001_cours038', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11543, 162, 'uni001_cours037', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11544, 162, 'uni001_cours036', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11545, 162, 'uni001_cours035', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11546, 162, 'uni001_cours034', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11547, 162, 'uni001_cours033', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11548, 162, 'uni001_cours032', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11549, 162, 'uni001_Course9', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11550, 162, 'uni001_Course10', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11551, 162, 'uni001_cours031', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11552, 162, 'uni001_cours030', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11553, 162, 'uni001_cours029', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11554, 162, 'uni001_cours028', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11555, 162, 'uni001_cours027', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11556, 162, 'uni001_cours026', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11557, 162, 'uni001_cours025', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11558, 162, 'uni001_cours024', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11559, 162, 'uni001_cours023', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11560, 162, 'uni001_CS101', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11561, 162, 'uni001_Course7', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11562, 162, 'uni001_cours022', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11563, 162, 'uni001_cours021', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11564, 162, 'uni001_cours020', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11565, 162, 'uni001_cours019', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11566, 162, 'uni001_cours018', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11567, 162, 'uni001_cours017', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11568, 162, 'uni001_cours016', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11569, 162, 'uni001_cours015', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11570, 162, 'uni001_cours014', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11571, 162, 'uni001_cours013', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11572, 162, 'uni001_cours012', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11573, 162, 'uni001_CS100', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11574, 162, 'uni001_cours011', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11575, 162, 'uni001_cours010', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11576, 162, 'uni001_cours009', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11577, 162, 'uni001_cours008', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11578, 162, 'uni001_cours007', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11579, 162, 'uni001_cours006', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11580, 162, 'uni001_cours005', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11581, 162, 'uni001_cours004', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11582, 162, 'uni001_cours003', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11583, 162, 'uni001_cours002', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11584, 162, 'uni001_cours001', 14, 10, 0, 37);
INSERT INTO `create_plan` VALUES (11585, 162, 'uni077_CS007', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11586, 162, 'uni077_CS006', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11587, 162, 'uni077_CS005', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11588, 162, 'uni077_CS004', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11589, 162, 'uni077_CS003', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11590, 162, 'uni077_CS002', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11591, 162, 'uni077_CS001', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11592, 162, 'uni076_CS004', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11593, 162, 'uni076_CS003', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11594, 162, 'uni076_CS002', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11595, 162, 'uni076_CS001', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11596, 162, 'uni075_CS040', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11597, 162, 'uni075_CS039', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11598, 162, 'uni075_CS038', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11599, 162, 'uni075_CS037', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11600, 162, 'uni075_CS036', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11601, 162, 'uni075_CS035', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11602, 162, 'uni075_CS034', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11603, 162, 'uni075_CS033', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11604, 162, 'uni075_CS032', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11605, 162, 'uni075_CS031', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11606, 162, 'uni075_CS030', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11607, 162, 'uni075_CS029', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11608, 162, 'uni075_CS028', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11609, 162, 'uni075_CS027', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11610, 162, 'uni075_CS026', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11611, 162, 'uni075_CS025', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11612, 162, 'uni075_CS024', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11613, 162, 'uni075_CS023', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11614, 162, 'uni075_CS021', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11615, 162, 'uni075_CS020', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11616, 162, 'uni075_CS019', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11617, 162, 'uni075_CS018', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11618, 162, 'uni075_CS017', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11619, 162, 'uni075_CS016', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11620, 162, 'uni075_CS015', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11621, 162, 'uni075_CS013', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11622, 162, 'uni075_CS011', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11623, 162, 'uni075_CS010', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11624, 162, 'uni075_CS009', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11625, 162, 'uni075_CS042', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11626, 162, 'uni075_CS008', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11627, 162, 'uni075_CS041', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11628, 162, 'uni075_CS007', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11629, 162, 'uni075_CS006', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11630, 162, 'uni075_CS005', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11631, 162, 'uni075_CS004', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11632, 162, 'uni075_CS003', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11633, 162, 'uni075_CS002', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11634, 162, 'uni075_CS001', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11635, 162, 'uni074_cs064', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11636, 162, 'uni074_CS063', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11637, 162, 'uni074_CS062', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11638, 162, 'uni074_CS061', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11639, 162, 'uni074_CS060', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11640, 162, 'uni074_CS059', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11641, 162, 'uni074_CS058', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11642, 162, 'uni074_CS057', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11643, 162, 'uni074_CS056', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11644, 162, 'uni074_CS055', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11645, 162, 'uni073_CS053', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11646, 162, 'uni073_CS052', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11647, 162, 'uni073_CS051', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11648, 162, 'uni073_CS050', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11649, 162, 'uni073_CS049', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11650, 162, 'uni073_CS048', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11651, 162, 'uni073_CS047', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11652, 162, 'uni073_CS046', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11653, 162, 'uni073_CS045', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11654, 162, 'uni073_CS044', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11655, 162, 'uni073_CS043', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11656, 162, 'uni072_CS005', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11657, 162, 'uni072_CS004', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11658, 162, 'uni072_CS003', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11659, 162, 'uni072_CS002', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11660, 162, 'uni072_CS001', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11661, 162, 'uni004_fac037', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11662, 162, 'uni004_fac036', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11663, 162, 'uni004_fac035', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11664, 162, 'uni004_fac034', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11665, 162, 'uni004_fac033', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11666, 162, 'uni004_fac032', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11667, 162, 'uni004_fac031', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11668, 162, 'uni004_fac030', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11669, 162, 'uni004_fac029', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11670, 162, 'uni004_fac028', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11671, 162, 'uni004_fac027', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11672, 162, 'uni004_Course7', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11673, 162, 'uni004_fac026', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11674, 162, 'uni004_fac025', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11675, 162, 'uni004_fac024', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11676, 162, 'uni004_fac023', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11677, 162, 'uni004_fac022', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11678, 162, 'uni004_fac021', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11679, 162, 'uni004_fac020', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11680, 162, 'uni004_fac019', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11681, 162, 'uni004_fac018', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11682, 162, 'uni004_fac017', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11683, 162, 'uni004_fac016', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11684, 162, 'uni004_fac015', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11685, 162, 'uni004_fac038', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11686, 162, 'uni004_fac014', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11687, 162, 'uni004_fac013', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11688, 162, 'uni004_fac012', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11689, 162, 'uni004_fac011', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11690, 162, 'uni004_fac010', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11691, 162, 'uni004_fac009', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11692, 162, 'uni004_fac008', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11693, 162, 'uni004_fac007', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11694, 162, 'uni004_fac006', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11695, 162, 'uni004_fac005', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11696, 162, 'uni004_fac004', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11697, 162, 'uni004_fac003', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11698, 162, 'uni004_fac002', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11699, 162, 'uni004_fac001', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11700, 162, 'uni003_Course116', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11701, 162, 'uni003_Course115', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11702, 162, 'uni003_Course114', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11703, 162, 'uni003_Course113', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11704, 162, 'uni003_Course112', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11705, 162, 'uni003_Course111', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11706, 162, 'uni003_Course110', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11707, 162, 'uni003_Course109', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11708, 162, 'uni003_CS101', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11709, 162, 'uni003_Course94', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11710, 162, 'uni003_Course156', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11711, 162, 'uni003_course025', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11712, 162, 'uni003_CS100', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11713, 162, 'uni003_Course97', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11714, 162, 'uni003_Course2', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11715, 162, 'uni003_course020', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11716, 162, 'uni003_Course91', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11717, 162, 'uni003_course004', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11718, 162, 'uni003_course002', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11719, 162, 'uni002_Course026', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11720, 162, 'uni002_Course025', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11721, 162, 'uni002_Course024', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11722, 162, 'uni002_Course023', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11723, 162, 'uni002_Course022', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11724, 162, 'uni002_Course021', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11725, 162, 'uni002_Course020', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11726, 162, 'uni002_Course019', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11727, 162, 'uni002_Course018', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11728, 162, 'uni002_Course017', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11729, 162, 'uni002_uni002_uni002_Course130', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11730, 162, 'uni002_uni002_uni002_Course120', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11731, 162, 'uni002_CS101', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11732, 162, 'uni002_CS100', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11733, 162, 'uni002_Course121', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11734, 162, 'uni002_Course120', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11735, 162, 'uni002_Course035', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11736, 162, 'uni002_Course016', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11737, 162, 'uni002_Course015', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11738, 162, 'uni002_Course014', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11739, 162, 'uni002_Course013', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11740, 162, 'uni002_Course012', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11741, 162, 'uni002_Course011', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11742, 162, 'uni002_Course010', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11743, 162, 'uni002_Course009', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11744, 162, 'uni002_Course008', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11745, 162, 'uni002_Course007', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11746, 162, 'uni002_Course006', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11747, 162, 'uni002_uni002_Course110', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11748, 162, 'uni002_Course005', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11749, 162, 'uni002_Course004', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11750, 162, 'uni002_Course003', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11751, 162, 'uni002_Course002', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11752, 162, 'uni002_Course001', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11753, 162, 'uni001_doc031', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11754, 162, 'uni001_Course13', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11755, 162, 'uni001_cours043', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11756, 162, 'uni001_cours042', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11757, 162, 'uni001_CS102', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11758, 162, 'uni001_cours106', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11759, 162, 'uni001_cours105', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11760, 162, 'uni001_cours104', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11761, 162, 'uni001_cours103', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11762, 162, 'uni001_cours102', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11763, 162, 'uni001_cours101', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11764, 162, 'uni001_Course30', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11765, 162, 'uni001_Course21', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11766, 162, 'uni001_cours100', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11767, 162, 'uni001_cours099', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11768, 162, 'uni001_cours098', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11769, 162, 'uni001_Course19', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11770, 162, 'uni001_cours097', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11771, 162, 'uni001_cours096', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11772, 162, 'uni001_cours095', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11773, 162, 'uni001_cours094', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11774, 162, 'uni001_cours093', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11775, 162, 'uni001_cours092', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11776, 162, 'uni001_cours091', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11777, 162, 'uni001_cours090', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11778, 162, 'uni001_cours089', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11779, 162, 'uni001_cours088', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11780, 162, 'uni001_cours087', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11781, 162, 'uni001_cours086', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11782, 162, 'uni001_cours085', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11783, 162, 'uni001_cours084', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11784, 162, 'uni001_cours083', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11785, 162, 'uni001_cours082', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11786, 162, 'uni001_cours081', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11787, 162, 'uni001_cours080', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11788, 162, 'uni001_cours079', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11789, 162, 'uni001_cours078', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11790, 162, 'uni001_cours077', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11791, 162, 'uni001_Course56', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11792, 162, 'uni001_Course17', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11793, 162, 'uni001_Course15', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11794, 162, 'uni001_Course130', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11795, 162, 'uni001_cours076', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11796, 162, 'uni001_cours075', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11797, 162, 'uni001_cours074', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11798, 162, 'uni001_cours073', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11799, 162, 'uni001_cours072', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11800, 162, 'uni001_cours071', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11801, 162, 'uni001_cours070', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11802, 162, 'uni001_cours069', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11803, 162, 'uni001_cours068', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11804, 162, 'uni001_cours067', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11805, 162, 'uni001_cours066', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11806, 162, 'uni001_cours065', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11807, 162, 'uni001_cours064', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11808, 162, 'uni001_cours063', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11809, 162, 'uni001_Course14', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11810, 162, 'uni001_cours062', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11811, 162, 'uni001_cours061', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11812, 162, 'uni001_cours060', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11813, 162, 'uni001_cours058', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11814, 162, 'uni001_cours057', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11815, 162, 'uni001_cours056', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11816, 162, 'uni001_cours055', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11817, 162, 'uni001_cours054', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11818, 162, 'uni001_cours053', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11819, 162, 'uni001_cours052', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11820, 162, 'uni001_cours051', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11821, 162, 'uni001_cours050', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11822, 162, 'uni001_cours049', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11823, 162, 'uni001_cours048', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11824, 162, 'uni001_cours047', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11825, 162, 'uni001_cours046', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11826, 162, 'uni001_cours045', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11827, 162, 'uni001_cours044', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11828, 162, 'uni001_Course8', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11829, 162, 'uni001_Course12', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11830, 162, 'uni001_Course11', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11831, 162, 'uni001_cours041', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11832, 162, 'uni001_cours040', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11833, 162, 'uni001_cours039', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11834, 162, 'uni001_cours038', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11835, 162, 'uni001_cours037', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11836, 162, 'uni001_cours036', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11837, 162, 'uni001_cours035', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11838, 162, 'uni001_cours034', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11839, 162, 'uni001_cours033', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11840, 162, 'uni001_cours032', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11841, 162, 'uni001_Course9', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11842, 162, 'uni001_Course10', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11843, 162, 'uni001_cours031', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11844, 162, 'uni001_cours030', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11845, 162, 'uni001_cours029', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11846, 162, 'uni001_cours028', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11847, 162, 'uni001_cours027', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11848, 162, 'uni001_cours026', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11849, 162, 'uni001_cours025', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11850, 162, 'uni001_cours024', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11851, 162, 'uni001_cours023', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11852, 162, 'uni001_CS101', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11853, 162, 'uni001_Course7', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11854, 162, 'uni001_cours022', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11855, 162, 'uni001_cours021', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11856, 162, 'uni001_cours020', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11857, 162, 'uni001_cours019', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11858, 162, 'uni001_cours018', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11859, 162, 'uni001_cours017', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11860, 162, 'uni001_cours016', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11861, 162, 'uni001_cours015', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11862, 162, 'uni001_cours014', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11863, 162, 'uni001_cours013', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11864, 162, 'uni001_cours012', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11865, 162, 'uni001_CS100', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11866, 162, 'uni001_cours011', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11867, 162, 'uni001_cours010', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11868, 162, 'uni001_cours009', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11869, 162, 'uni001_cours008', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11870, 162, 'uni001_cours007', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11871, 162, 'uni001_cours006', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11872, 162, 'uni001_cours005', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11873, 162, 'uni001_cours004', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11874, 162, 'uni001_cours003', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11875, 162, 'uni001_cours002', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11876, 162, 'uni001_cours001', 15, 10, 0, 38);
INSERT INTO `create_plan` VALUES (11877, 162, 'uni077_CS007', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11878, 162, 'uni077_CS006', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11879, 162, 'uni077_CS005', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11880, 162, 'uni077_CS004', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11881, 162, 'uni077_CS003', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11882, 162, 'uni077_CS002', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11883, 162, 'uni077_CS001', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11884, 162, 'uni076_CS002', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11885, 162, 'uni075_CS041', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11886, 162, 'uni075_CS007', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11887, 162, 'uni075_CS006', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11888, 162, 'uni075_CS005', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11889, 162, 'uni075_CS004', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11890, 162, 'uni075_CS003', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11891, 162, 'uni075_CS002', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11892, 162, 'uni075_CS001', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11893, 162, 'uni073_CS043', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11894, 162, 'uni072_CS005', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11895, 162, 'uni072_CS004', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11896, 162, 'uni004_fac038', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11897, 162, 'uni003_Course116', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11898, 162, 'uni003_Course115', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11899, 162, 'uni003_Course114', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11900, 162, 'uni003_Course113', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11901, 162, 'uni003_Course112', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11902, 162, 'uni003_Course111', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11903, 162, 'uni003_Course110', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11904, 162, 'uni003_Course109', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11905, 162, 'uni003_Course94', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11906, 162, 'uni003_Course156', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11907, 162, 'uni003_course025', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11908, 162, 'uni003_Course97', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11909, 162, 'uni003_Course2', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11910, 162, 'uni003_course020', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11911, 162, 'uni003_course015', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11912, 162, 'uni003_Course91', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11913, 162, 'uni003_course004', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11914, 162, 'uni003_course002', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11915, 162, 'uni002_Course024', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11916, 162, 'uni002_uni002_uni002_Course130', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11917, 162, 'uni002_uni002_uni002_Course120', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11918, 162, 'uni002_Course121', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11919, 162, 'uni002_Course120', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11920, 162, 'uni002_Course035', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11921, 162, 'uni002_Course016', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11922, 162, 'uni002_Course012', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11923, 162, 'uni001_cours043', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11924, 162, 'uni001_cours101', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11925, 162, 'uni001_Course56', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11926, 162, 'uni001_Course130', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11927, 162, 'uni001_cours027', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11928, 162, 'uni001_Course7', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11929, 162, 'uni001_cours007', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11930, 162, 'uni001_cours006', 17, 10, 0, 40);
INSERT INTO `create_plan` VALUES (11931, 162, 'uni077_CS007', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11932, 162, 'uni077_CS006', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11933, 162, 'uni077_CS005', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11934, 162, 'uni077_CS004', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11935, 162, 'uni077_CS003', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11936, 162, 'uni077_CS002', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11937, 162, 'uni077_CS001', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11938, 162, 'uni076_CS002', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11939, 162, 'uni075_CS041', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11940, 162, 'uni075_CS007', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11941, 162, 'uni075_CS006', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11942, 162, 'uni075_CS005', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11943, 162, 'uni075_CS004', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11944, 162, 'uni075_CS003', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11945, 162, 'uni075_CS002', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11946, 162, 'uni075_CS001', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11947, 162, 'uni073_CS043', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11948, 162, 'uni072_CS005', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11949, 162, 'uni072_CS004', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11950, 162, 'uni004_fac038', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11951, 162, 'uni003_Course116', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11952, 162, 'uni003_Course115', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11953, 162, 'uni003_Course114', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11954, 162, 'uni003_Course113', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11955, 162, 'uni003_Course112', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11956, 162, 'uni003_Course111', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11957, 162, 'uni003_Course110', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11958, 162, 'uni003_Course109', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11959, 162, 'uni003_Course94', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11960, 162, 'uni003_Course156', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11961, 162, 'uni003_course025', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11962, 162, 'uni003_Course97', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11963, 162, 'uni003_Course2', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11964, 162, 'uni003_course020', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11965, 162, 'uni003_Course91', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11966, 162, 'uni003_course004', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11967, 162, 'uni003_course002', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11968, 162, 'uni002_Course024', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11969, 162, 'uni002_uni002_uni002_Course130', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11970, 162, 'uni002_uni002_uni002_Course120', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11971, 162, 'uni002_Course121', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11972, 162, 'uni002_Course120', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11973, 162, 'uni002_Course035', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11974, 162, 'uni002_Course016', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11975, 162, 'uni002_Course012', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11976, 162, 'uni001_cours043', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11977, 162, 'uni001_cours101', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11978, 162, 'uni001_Course56', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11979, 162, 'uni001_Course130', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11980, 162, 'uni001_cours027', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11981, 162, 'uni001_Course7', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11982, 162, 'uni001_cours007', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11983, 162, 'uni001_cours006', 18, 10, 0, 41);
INSERT INTO `create_plan` VALUES (11984, 159, 'uni100_course002', 1, 1, 0, 6);
INSERT INTO `create_plan` VALUES (11985, 159, 'uni100_course001', 1, 1, 0, 6);
INSERT INTO `create_plan` VALUES (11986, 159, 'uni017_CRS018', 1, 10, 0, 6);
INSERT INTO `create_plan` VALUES (11987, 159, 'uni017_CRS001', 1, 2, 0, 6);

-- ----------------------------
-- Table structure for demand_user
-- ----------------------------
DROP TABLE IF EXISTS `demand_user`;
CREATE TABLE `demand_user`  (
  `demand_id` int NOT NULL AUTO_INCREMENT,
  `demand_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `surname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tel` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `pass` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `p_m_id` int NULL DEFAULT NULL,
  `stt` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`demand_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `p_m_id`(`p_m_id`) USING BTREE,
  CONSTRAINT `demand_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `demand_user_ibfk_2` FOREIGN KEY (`p_m_id`) REFERENCES `province_ministry` (`p_m_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of demand_user
-- ----------------------------
INSERT INTO `demand_user` VALUES (15, 'VTE', 'demand', 'ຊາຍ', '-', 'vte@mod.com', '202cb962ac59075b964b07152d234b70', 6, 1, 1);
INSERT INTO `demand_user` VALUES (16, 'BKE', 'demand', 'ຊາຍ', '-', 'bke@mod.com', '202cb962ac59075b964b07152d234b70', 10, 2, 1);
INSERT INTO `demand_user` VALUES (17, 'BLK', 'demand', 'ຊາຍ', '-', 'blk@mod.com', '202cb962ac59075b964b07152d234b70', 11, 3, 1);
INSERT INTO `demand_user` VALUES (18, 'CPS', 'demand', 'ຊາຍ', '-', 'cps@mod.com', '202cb962ac59075b964b07152d234b70', 27, 4, 1);
INSERT INTO `demand_user` VALUES (19, 'HPH', 'demand', 'ຊາຍ', '-', 'hph@mod.com', '202cb962ac59075b964b07152d234b70', 36, 5, 1);
INSERT INTO `demand_user` VALUES (20, 'KHM', 'demand', 'ຊາຍ', '-', 'khm@mod.com', '202cb962ac59075b964b07152d234b70', 35, 6, 1);
INSERT INTO `demand_user` VALUES (21, 'LNT', 'demand', 'ຊາຍ', '-', 'lnt@mod.com', '202cb962ac59075b964b07152d234b70', 28, 7, 1);
INSERT INTO `demand_user` VALUES (22, 'LPB', 'demand', 'ຊາຍ', '-', 'lpb@mod.com', '202cb962ac59075b964b07152d234b70', 29, 8, 1);
INSERT INTO `demand_user` VALUES (23, 'ODX', 'demand', 'ຊາຍ', '-', 'odx@mod.com', '202cb962ac59075b964b07152d234b70', 31, 9, 1);
INSERT INTO `demand_user` VALUES (24, 'PSL', 'demand', 'ຊາຍ', '-', 'psl@mod.com', '202cb962ac59075b964b07152d234b70', 30, 10, 1);
INSERT INTO `demand_user` VALUES (25, 'SLV', 'demand', 'ຊາຍ', '-', 'slv@mod.com', '202cb962ac59075b964b07152d234b70', 34, 11, 1);
INSERT INTO `demand_user` VALUES (26, 'SVK', 'demand', 'ຊາຍ', '-', 'svk@mod.com', '202cb962ac59075b964b07152d234b70', 32, 12, 1);
INSERT INTO `demand_user` VALUES (27, 'VTEP', 'demand', 'ຊາຍ', '-', 'vtep@mod.com', '202cb962ac59075b964b07152d234b70', 33, 13, 1);
INSERT INTO `demand_user` VALUES (28, 'SYB', 'demand', 'ຊາຍ', '-', 'syb@mod.com', '202cb962ac59075b964b07152d234b70', 37, 14, 1);
INSERT INTO `demand_user` VALUES (29, 'SKG', 'demand', 'ຊາຍ', '-', 'skg@mod.com', '202cb962ac59075b964b07152d234b70', 38, 15, 1);
INSERT INTO `demand_user` VALUES (30, 'XSB', 'demand', 'ຊາຍ', '-', 'xsb@mod.com', '202cb962ac59075b964b07152d234b70', 39, 16, 1);
INSERT INTO `demand_user` VALUES (31, 'XKG', 'demand', 'ຊາຍ', '-', 'xkg@mod.com', '202cb962ac59075b964b07152d234b70', 40, 17, 1);
INSERT INTO `demand_user` VALUES (32, 'APT', 'demand', 'ຊາຍ', '-', 'apt@mod.com', '202cb962ac59075b964b07152d234b70', 41, 18, 1);
INSERT INTO `demand_user` VALUES (33, 'SSK', 'demand', 'ຊາຍ', '-', 'ssk@mod.com', '202cb962ac59075b964b07152d234b70', 42, 19, 1);
INSERT INTO `demand_user` VALUES (34, 'ENG', 'demand', 'ຊາຍ', '-', 'eng@mod.com', '202cb962ac59075b964b07152d234b70', 43, 20, 1);
INSERT INTO `demand_user` VALUES (35, 'test', 'ts', 'ຊາຍ', '-', 'vte2@mod.com', '202cb962ac59075b964b07152d234b70', 44, 1, 1);

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `dept_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dept_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `stt` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`dept_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('001', 'ກົມການສຶກສາຊັ້ນສູງ ', 1);
INSERT INTO `department` VALUES ('123', 'ກົມຈັດຕັ້ງແລະພະນັກງານ, ສສກ', 1);
INSERT INTO `department` VALUES ('Dep_002', 'ກົມສ້າງຄູ', 1);
INSERT INTO `department` VALUES ('Dep_003', 'ກົມອາຊີວະສຶກສາ', 1);
INSERT INTO `department` VALUES ('Dep_004', 'ກະຊວງສາທາລະນະສຸກ', 1);
INSERT INTO `department` VALUES ('Dep_005', 'ກະຊວງຖະແຫຼງຂ່າວ, ວັດທະນະທຳ ແລະ ທ່ອງທ່ຽວ', 1);
INSERT INTO `department` VALUES ('Dep_006', 'ກະຊວງກະສິກຳ ແລະ ປ່າໄມ້', 1);
INSERT INTO `department` VALUES ('Dep_007', 'ກະຊວງການເງິນ', 1);
INSERT INTO `department` VALUES ('Dep_008', 'ທະນາຄານແຫ່ງ ສປປ ລາວ', 1);
INSERT INTO `department` VALUES ('Dep_009', 'ກະຊວງຍຸຕິທຳ', 1);
INSERT INTO `department` VALUES ('Dep_010', 'ກະຊວງໄປສະນີ, ໂທລະຄົມມະນາຄົມ ແລະ ການສືສານ', 1);
INSERT INTO `department` VALUES ('Dep_11', 'ກົມກິລາລະດັບສູງ', 1);
INSERT INTO `department` VALUES ('Dep_12', '​ພາກ​ເອ​ກະ​ຊົນ', 1);
INSERT INTO `department` VALUES ('HRD001', 'ສູນກາງແບ່ງປັນທຶນ', 1);

-- ----------------------------
-- Table structure for department_user
-- ----------------------------
DROP TABLE IF EXISTS `department_user`;
CREATE TABLE `department_user`  (
  `usr_dept_id` int NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `surname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tel` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `pass` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `dept_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `stt` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`usr_dept_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `dept_id`(`dept_id`) USING BTREE,
  CONSTRAINT `department_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `department_user_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of department_user
-- ----------------------------
INSERT INTO `department_user` VALUES (9, 'Dept Name', 'Mod', 'ຊາຍ', '-', 'department@mod.com', '202cb962ac59075b964b07152d234b70', 74, '001', 1);
INSERT INTO `department_user` VALUES (10, 'EMIS', 'Dept', 'ຍິງ', '123', 'emis@mod.com', '202cb962ac59075b964b07152d234b70', 88, 'Dep_003', 1);

-- ----------------------------
-- Table structure for document_type
-- ----------------------------
DROP TABLE IF EXISTS `document_type`;
CREATE TABLE `document_type`  (
  `doc_id` int NOT NULL AUTO_INCREMENT,
  `doc_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`doc_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of document_type
-- ----------------------------
INSERT INTO `document_type` VALUES (11, 'ນິຕິກຳ');

-- ----------------------------
-- Table structure for document_upload
-- ----------------------------
DROP TABLE IF EXISTS `document_upload`;
CREATE TABLE `document_upload`  (
  `up_id` int NOT NULL AUTO_INCREMENT,
  `doc_id` int NULL DEFAULT NULL,
  `fy_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `cover` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `up_date` date NULL DEFAULT NULL,
  `file_upload` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`up_id`) USING BTREE,
  INDEX `doc_id`(`doc_id`) USING BTREE,
  INDEX `fy_id`(`fy_id`) USING BTREE,
  CONSTRAINT `document_upload_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `document_type` (`doc_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `document_upload_ibfk_2` FOREIGN KEY (`fy_id`) REFERENCES `fy` (`fy_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 225 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of document_upload
-- ----------------------------
INSERT INTO `document_upload` VALUES (125, 11, '2021-2022', 'Description: 99', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (126, 11, '2021-2022', 'Description: 98', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (127, 11, '2021-2022', 'Description: 97', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (128, 11, '2021-2022', 'Description: 96', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (129, 11, '2021-2022', 'Description: 95', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (130, 11, '2021-2022', 'Description: 94', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (131, 11, '2021-2022', 'Description: 93', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (132, 11, '2021-2022', 'Description: 92', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (133, 11, '2021-2022', 'Description: 91', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (134, 11, '2021-2022', 'Description: 90', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (135, 11, '2021-2022', 'Description: 89', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (136, 11, '2021-2022', 'Description: 88', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (137, 11, '2021-2022', 'Description: 87', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (138, 11, '2021-2022', 'Description: 86', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (139, 11, '2021-2022', 'Description: 85', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (140, 11, '2021-2022', 'Description: 84', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (141, 11, '2021-2022', 'Description: 83', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (142, 11, '2021-2022', 'Description: 82', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (143, 11, '2021-2022', 'Description: 81', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (144, 11, '2021-2022', 'Description: 80', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (145, 11, '2021-2022', 'Description: 79', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (146, 11, '2021-2022', 'Description: 78', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (147, 11, '2021-2022', 'Description: 77', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (148, 11, '2021-2022', 'Description: 76', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (149, 11, '2021-2022', 'Description: 75', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (150, 11, '2021-2022', 'Description: 74', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (151, 11, '2021-2022', 'Description: 73', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (152, 11, '2021-2022', 'Description: 72', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (153, 11, '2021-2022', 'Description: 71', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (154, 11, '2021-2022', 'Description: 70', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (155, 11, '2021-2022', 'Description: 69', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (156, 11, '2021-2022', 'Description: 68', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (157, 11, '2021-2022', 'Description: 67', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (158, 11, '2021-2022', 'Description: 66', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (159, 11, '2021-2022', 'Description: 65', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (160, 11, '2021-2022', 'Description: 64', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (161, 11, '2021-2022', 'Description: 63', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (162, 11, '2021-2022', 'Description: 62', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (163, 11, '2021-2022', 'Description: 61', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (164, 11, '2021-2022', 'Description: 60', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (165, 11, '2021-2022', 'Description: 59', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (166, 11, '2021-2022', 'Description: 58', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (167, 11, '2021-2022', 'Description: 57', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (168, 11, '2021-2022', 'Description: 56', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (169, 11, '2021-2022', 'Description: 55', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (170, 11, '2021-2022', 'Description: 54', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (171, 11, '2021-2022', 'Description: 53', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (172, 11, '2021-2022', 'Description: 52', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (173, 11, '2021-2022', 'Description: 51', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (174, 11, '2021-2022', 'Description: 50', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (175, 11, '2021-2022', 'Description: 49', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (176, 11, '2021-2022', 'Description: 48', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (177, 11, '2021-2022', 'Description: 47', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (178, 11, '2021-2022', 'Description: 46', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (179, 11, '2021-2022', 'Description: 45', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (180, 11, '2021-2022', 'Description: 44', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (181, 11, '2021-2022', 'Description: 43', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (182, 11, '2021-2022', 'Description: 42', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (183, 11, '2021-2022', 'Description: 41', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (184, 11, '2021-2022', 'Description: 40', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (185, 11, '2021-2022', 'Description: 39', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (186, 11, '2021-2022', 'Description: 38', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (187, 11, '2021-2022', 'Description: 37', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (188, 11, '2021-2022', 'Description: 36', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (189, 11, '2021-2022', 'Description: 35', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (190, 11, '2021-2022', 'Description: 34', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (191, 11, '2021-2022', 'Description: 33', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (192, 11, '2021-2022', 'Description: 32', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (193, 11, '2021-2022', 'Description: 31', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (194, 11, '2021-2022', 'Description: 30', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (195, 11, '2021-2022', 'Description: 29', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (196, 11, '2021-2022', 'Description: 28', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (197, 11, '2021-2022', 'Description: 27', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (198, 11, '2021-2022', 'Description: 26', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (199, 11, '2021-2022', 'Description: 25', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (200, 11, '2021-2022', 'Description: 24', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (201, 11, '2021-2022', 'Description: 23', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (202, 11, '2021-2022', 'Description: 22', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (203, 11, '2021-2022', 'Description: 21', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (204, 11, '2021-2022', 'Description: 20', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (205, 11, '2021-2022', 'Description: 19', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (206, 11, '2021-2022', 'Description: 18', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (207, 11, '2021-2022', 'Description: 17', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (208, 11, '2021-2022', 'Description: 16', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (209, 11, '2021-2022', 'Description: 15', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (210, 11, '2021-2022', 'Description: 14', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (211, 11, '2021-2022', 'Description: 13', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (212, 11, '2021-2022', 'Description: 12', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (213, 11, '2021-2022', 'Description: 11', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (214, 11, '2021-2022', 'Description: 10', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (215, 11, '2021-2022', 'Description: 9', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (216, 11, '2021-2022', 'Description: 8', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (217, 11, '2021-2022', 'Description: 7', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (218, 11, '2021-2022', 'Description: 6', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (219, 11, '2021-2022', 'Description: 5', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (220, 11, '2021-2022', 'Description: 4', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (221, 11, '2021-2022', 'Description: 3', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (222, 11, '2021-2022', 'Description: 2', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (223, 11, '2021-2022', 'Description: 1', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);
INSERT INTO `document_upload` VALUES (224, 11, '2021-2022', 'Description: 0', 'Cover_6163a84b4d584.jpg', '2021-11-22', NULL);

-- ----------------------------
-- Table structure for faculty
-- ----------------------------
DROP TABLE IF EXISTS `faculty`;
CREATE TABLE `faculty`  (
  `fac_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fac_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uni_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stt` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`fac_id`) USING BTREE,
  INDEX `uni_id`(`uni_id`) USING BTREE,
  CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`uni_id`) REFERENCES `university` (`uni_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of faculty
-- ----------------------------
INSERT INTO `faculty` VALUES ('MT_001_fac001', 'ຄູອະນຸບານ (12+4)', 'MT_001', 1);
INSERT INTO `faculty` VALUES ('MT_001_fac002', 'ຄູປະຖົມ (12+4)', 'MT_001', 1);
INSERT INTO `faculty` VALUES ('MT_001_fac004', 'ຄູມັດທະຍົມ (12+4) - ວິທະຍາໄລຄູຫຼວງນ້ຳທາ', 'MT_001', 1);
INSERT INTO `faculty` VALUES ('MT_001_fac005', 'ຄູມັດທະຍົມ (12+4) - ວິທະຍາໄລຄູຫຼວງພະບາງ', 'MT_001', 1);
INSERT INTO `faculty` VALUES ('MT_001_fac006', 'ຄູມັດທະຍົມ (12+4) - ວິທະຍາໄລຄູຄັງໄຂ', 'MT_001', 1);
INSERT INTO `faculty` VALUES ('MT_001_fac007', 'ຄູມັດທະຍົມ (12+4) - ວິທະຍາໄລຄູ ດົງຄຳຊ້າງ', 'MT_001', 1);
INSERT INTO `faculty` VALUES ('MT_001_fac008', 'ຄູມັດທະຍົມ (12+4) - ວິທະຍາໄລຄູ ບ້ານເກີນ', 'MT_001', 1);
INSERT INTO `faculty` VALUES ('MT_001_fac009', 'ຄູມັດທະຍົມ (12+4) - ວິທະຍາໄລຄູສະຫວັນນະເຂດ', 'MT_001', 1);
INSERT INTO `faculty` VALUES ('MT_001_fac010', 'ຄູມັດທະຍົມ (12+4) - ວິທະຍາໄລຄູ ສາລະວັນ', 'MT_001', 1);
INSERT INTO `faculty` VALUES ('MT_001_fac011', 'ຄູມັດທະຍົມ (12+4) - ວິທະຍາໄລຄູ ປາເຊ', 'MT_001', 1);
INSERT INTO `faculty` VALUES ('MT_001_fac012', 'ຄູມັດທະຍົມ (12+4) - ວິທະຍາໄລພາລະສຶກສາ 12+4', 'MT_001', 1);
INSERT INTO `faculty` VALUES ('MT_001_fac013', 'ຄູມັດທະຍົມ (12+4) - ວິທະຍາໄລສີລະປະສຶກສາ 12+4', 'MT_001', 1);
INSERT INTO `faculty` VALUES ('MT_001_fac015', 'ຄູມັດທະຍົມ (12+4) - ວິທະຍາໄລສົງອົງຕື້', 'MT_001', 1);
INSERT INTO `faculty` VALUES ('MT_001_fac016', 'ຄູມັດທະຍົມ (12+4) - ວິທະຍາໄລສົງຈຳປາສັກ', 'MT_001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac001', 'ຄະນະສຶກສາສາດ', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac002', 'ຄະນະອັກສອນສາດ', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac003', 'ຄະນະວິທະຍາສາດສັງຄົມ', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac004', 'ຄະນະເສດຖະສາດ ແລະ ບໍລິຫານທຸລະກິດ', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac005', 'ຄະນະນິຕິສາດ ແລະ ລັດຖະສາດ', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac006', 'ຄະນະວິທະຍາສາດທຳມະຊາດ', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac007', 'ຄະນະວິສະວະກຳສາດ', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac008', 'ຄະນະກະເສດສາດ', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac009', 'ຄະນະວິທະຍາສາດປ່າໄມ້', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac010', 'ຄະນະສະຖາປັດຕະຍະກຳສາດ', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac011', 'ຄະນະວິທະຍາສາດສິ່ງແວດລ້ອມ', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac012', 'ຄະນະວິສະວະກຳ ຊັບພະຍາກອນນ້ຳ', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac013', 'ຄະນະວິທະຍາສາດການກິລາ-ກາຍະກຳ', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac014', 'ຫຼັກສູດລາວນາໆຊາດ', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac050', 'ຄະນະປ່າໄມ້', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni001_fac15', 'ສະຖາບັນຄົງຈື້', 'uni001', 1);
INSERT INTO `faculty` VALUES ('uni002_fac001', 'ຄະນະສຶກສາສາດ', 'uni002', 1);
INSERT INTO `faculty` VALUES ('uni002_fac002', 'ຄະນະເສດຖະສາດ ແລະ ການຄຸ້ມຄອງ', 'uni002', 1);
INSERT INTO `faculty` VALUES ('uni002_fac003', 'ຄະນະເສດຖະສາດ ແລະ ປ່າໄມ້', 'uni002', 1);
INSERT INTO `faculty` VALUES ('uni002_fac004', 'ຄະນະນິຕິສາດ ແລະ ລັດຖະສາດ', 'uni002', 1);
INSERT INTO `faculty` VALUES ('uni002_fac005', 'ຄະນະວິສະວະກຳສາດ', 'uni002', 1);
INSERT INTO `faculty` VALUES ('uni002_fac006', 'ຄະນະວິທະຍາສາດທຳມະຊາດ', 'uni002', 1);
INSERT INTO `faculty` VALUES ('uni003_Fac001', 'ຄະນະສຶກສາສາດ', 'uni003', 1);
INSERT INTO `faculty` VALUES ('uni003_Fac002', 'ຄະນະເສດຖະສາດ ແລະ ການທ່ອງທ່ຽວ', 'uni003', 1);
INSERT INTO `faculty` VALUES ('uni003_Fac003', 'ຄະນະກະເສດສາດ ແລະ ຊັບພະຍາກອນປ່າໄມ້', 'uni003', 1);
INSERT INTO `faculty` VALUES ('uni003_Fac004', 'ສະຖາບັນປັດຕະຍາກຳສາດ', 'uni003', 1);
INSERT INTO `faculty` VALUES ('uni003_Fac005', 'ວິສະວະກຳສາດ', 'uni003', 1);
INSERT INTO `faculty` VALUES ('uni003_Fac006', 'ຄະນະພາສາສາດ', 'uni003', 1);
INSERT INTO `faculty` VALUES ('uni003_UNI105', 'ກະເສດສາດ ແລະ ຊັບພະຍາກອນປ່າໄມ້', 'uni003', 1);
INSERT INTO `faculty` VALUES ('uni004_fac001', 'ຄະນະກະເສດສາດ ແລະ ສີ່ງແວດລ້ອມ', 'uni004', 1);
INSERT INTO `faculty` VALUES ('uni004_fac002', 'ຄະນະບໍລິຫານທຸລະກິດ', 'uni004', 1);
INSERT INTO `faculty` VALUES ('uni004_fac003', 'ຄະນະພາສາສາດ ແລະ ມະນຸດສາດ', 'uni004', 1);
INSERT INTO `faculty` VALUES ('uni004_fac004', 'ສູນເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ', 'uni004', 1);
INSERT INTO `faculty` VALUES ('uni004_fac005', 'ຄະນະວິທະຍາສາດອາຫານ', 'uni004', 1);
INSERT INTO `faculty` VALUES ('uni004_fac006', 'ຄະນະສຶກສາສາດ', 'uni004', 1);
INSERT INTO `faculty` VALUES ('uni004_fac007', 'ຄະນະວິທະຍາສາດທຳມະຊາດ', 'uni004', 1);
INSERT INTO `faculty` VALUES ('uni004_fac008', 'ຄະນະກະກຽມຄະນະວິສະວະກຳສາດ', 'uni004', 1);
INSERT INTO `faculty` VALUES ('uni004_fac009', 'ຫຼັກສູດລາວນາໆຊາດ', 'uni004', 1);
INSERT INTO `faculty` VALUES ('uni017_fac01', 'ສະຖາບັນພັດທະນາອາຊີວະສຶກສາ', 'uni017', 1);
INSERT INTO `faculty` VALUES ('uni042_fac001', 'ທົ່ວໄປ', 'uni042', 1);
INSERT INTO `faculty` VALUES ('uni043_fac001', 'ທົ່ວໄປ', 'uni043', 1);
INSERT INTO `faculty` VALUES ('uni044_fac001', 'ທົ່ວໄປ', 'uni044', 1);
INSERT INTO `faculty` VALUES ('uni045_fac001', 'ທົ່ວໄປ', 'uni045', 1);
INSERT INTO `faculty` VALUES ('uni046_fac001', 'ທົ່ວໄປ', 'uni046', 1);
INSERT INTO `faculty` VALUES ('uni047_fac001', 'ທົ່ວໄປ', 'uni047', 1);
INSERT INTO `faculty` VALUES ('uni048_fac001', 'ທົ່ວໄປ', 'uni048', 1);
INSERT INTO `faculty` VALUES ('uni049_fac001', 'ຄະນະທົ່ວໄປ', 'uni049', 1);
INSERT INTO `faculty` VALUES ('uni050_fac001', 'ຄະນະທົ່ວໄປ', 'uni050', 1);
INSERT INTO `faculty` VALUES ('uni051_fac001', 'ຄະນະທົ່ວໄປ', 'uni051', 1);
INSERT INTO `faculty` VALUES ('uni057_fac001', 'ຄະນະທົ່ວໄປ', 'uni057', 1);
INSERT INTO `faculty` VALUES ('uni058_fac001', 'ຄະນະທົ່ວໄປ', 'uni058', 1);
INSERT INTO `faculty` VALUES ('uni059_fac001', 'ຄະນະທົ່ວໄປ', 'uni059', 1);
INSERT INTO `faculty` VALUES ('uni060_fac001', 'ຄະນະທົ່ວໄປ', 'uni060', 1);
INSERT INTO `faculty` VALUES ('uni061_fac001', 'ຄະນະທົ່ວໄປ', 'uni061', 1);
INSERT INTO `faculty` VALUES ('uni062_fac001', 'ຄະນະທົ່ວໄປ', 'uni062', 1);
INSERT INTO `faculty` VALUES ('uni063_fac_001', 'ຄະນະທົ່ວໄປ', 'uni063', 1);
INSERT INTO `faculty` VALUES ('uni064_fac001', 'ຄະນະທົ່ວໄປ', 'uni064', 1);
INSERT INTO `faculty` VALUES ('uni065_fac_001', 'ຄະນະທົ່ວໄປ', 'uni065', 1);
INSERT INTO `faculty` VALUES ('uni070_fac001', 'ຄະນະທົ່ວໄປ', 'uni070', 1);
INSERT INTO `faculty` VALUES ('uni072_FC01', 'ການບັນຊີ', 'uni072', 1);
INSERT INTO `faculty` VALUES ('uni072_FC02', 'ການເງີນ', 'uni072', 1);
INSERT INTO `faculty` VALUES ('uni072_FC03', 'ບໍລິຫານທຸລະກິດການຄ້າ', 'uni072', 1);
INSERT INTO `faculty` VALUES ('uni072_FC04', 'ຄູຄະນິດສາດ', 'uni072', 1);
INSERT INTO `faculty` VALUES ('uni072_FC05', 'ຄູວິທະຍາສາດການເມືອງ', 'uni072', 1);
INSERT INTO `faculty` VALUES ('uni073_UNI013', 'ຄະນະສຶກສາສາດ', 'uni073', 1);
INSERT INTO `faculty` VALUES ('uni073_UNI014', 'ຄະນະເສດຖະສາດ ແລະ ການຄຸ້ມຄອງ', 'uni073', 1);
INSERT INTO `faculty` VALUES ('uni073_UNI015', 'ຄະນະນິຕິສາດ ແລະ ລັດຖະສາດ', 'uni073', 1);
INSERT INTO `faculty` VALUES ('uni073_UNI016', 'ຄະນະວິສະວະກຳສາດ', 'uni073', 1);
INSERT INTO `faculty` VALUES ('uni073_UNI017', 'ຄະນະກະເສດສາດ ແລະ ປ່າໄມ້', 'uni073', 1);
INSERT INTO `faculty` VALUES ('uni074_UNI018', 'ຄະນະກະເສດສາດ ແລະຊັບພະຍາກອນປ່າໄມ້', 'uni074', 1);
INSERT INTO `faculty` VALUES ('uni074_UNI019', 'ຄະນະເສດຖະສາດການທ່ອງທ່ຽວ', 'uni074', 1);
INSERT INTO `faculty` VALUES ('uni074_UNI020', 'ຄະນະວິສະວະກຳສາດ', 'uni074', 1);
INSERT INTO `faculty` VALUES ('uni074_UNI021', 'ຄະນະພາສາສາດ', 'uni074', 1);
INSERT INTO `faculty` VALUES ('uni074_UNI023', 'ຄະນະສະຖາປັດຕະຍະກຳສາດ', 'uni074', 1);
INSERT INTO `faculty` VALUES ('uni075_UNI001', 'ຄະນະສືກສາສາດ', 'uni075', 1);
INSERT INTO `faculty` VALUES ('uni075_UNI002', 'ຄະນະອັກສອນສາດ', 'uni075', 1);
INSERT INTO `faculty` VALUES ('uni075_UNI003', 'ຄະນະວິທະຍາສາດສັງຄົມ', 'uni075', 1);
INSERT INTO `faculty` VALUES ('uni075_UNI004', 'ຄະນະເສດຖະສາດ ແລະ ບໍລິຫານທຸລະກິດ', 'uni075', 1);
INSERT INTO `faculty` VALUES ('uni075_UNI005', 'ຄະນະນິຕິສາດ ແລະ ລັດຖະສາດ', 'uni075', 1);
INSERT INTO `faculty` VALUES ('uni075_UNI006', 'ຄະນະວິສະວະກຳສາດ', 'uni075', 1);
INSERT INTO `faculty` VALUES ('uni075_UNI007', 'ຄະນະກະເສດສາດ', 'uni075', 1);
INSERT INTO `faculty` VALUES ('uni075_UNI008', 'ຄະນະວິທະຍາສາດປ່າໄມ້', 'uni075', 1);
INSERT INTO `faculty` VALUES ('uni075_UNI009', 'ຄະນະວິສະວະກຳ ຊັບພະຍາກອນນ້ຳ', 'uni075', 1);
INSERT INTO `faculty` VALUES ('uni075_UNI010', 'ຄະນະວິທະຍາສາດທຳມະຊາດ', 'uni075', 1);
INSERT INTO `faculty` VALUES ('uni075_UNI011', 'ຄະນະວິທະຍາສາດການກິລາ-ກາຍຍະກຳ', 'uni075', 1);
INSERT INTO `faculty` VALUES ('uni076_FC01', 'ຄະນະປ່າໄມ້', 'uni076', 1);
INSERT INTO `faculty` VALUES ('uni076_FC02', 'ວິ​ທະ​ຍາ​ສາດ​ການ​ກິ​ລາ-ການ​ຍະ​ກຳ', 'uni076', 1);
INSERT INTO `faculty` VALUES ('uni076_FC03', 'ຊັບ​ພະ​ຍາ​ກອນ​ນ້ຳ', 'uni076', 1);
INSERT INTO `faculty` VALUES ('uni076_FC04', 'ຄະນະວິສະວະກຳສາດ', 'uni076', 1);
INSERT INTO `faculty` VALUES ('uni077_FC01', 'ຄະນະເສດຖະສາດ ແລະ ການຄຸ້ມຄອງ', 'uni077', 1);
INSERT INTO `faculty` VALUES ('uni077_FC02', 'ຄະນະວິສະວະກຳສາດ', 'uni077', 1);
INSERT INTO `faculty` VALUES ('uni077_FC03', 'ຄະນະກະເສດສາດ ແລະ ປ່າໄມ້', 'uni077', 1);
INSERT INTO `faculty` VALUES ('uni077_FC04', 'ຄະນະນິຕິສາດ-ລັດຖະສາດ', 'uni077', 1);
INSERT INTO `faculty` VALUES ('uni100_fac001', 'ນັກຮຽນວິຊາຊີບ C1', 'uni100', 1);
INSERT INTO `faculty` VALUES ('uni100_fac002', 'ນັກຮຽນວິຊາຊີບ C2', 'uni100', 1);
INSERT INTO `faculty` VALUES ('uni101_fac01', 'ວິທະຍາໄລ ເຕັກນິກ ສັບພະວິຊາ', 'uni101', 1);
INSERT INTO `faculty` VALUES ('uni102_fac01', 'ຫຼັກ​ສູດ​ປະ​ລີນ​ຍາ​ຕີ', 'uni102', 1);
INSERT INTO `faculty` VALUES ('uni103_fac01', 'ຫຼັກ​ສູດ​ປະ​ລີນ​ຍາ​ຕີ', 'uni103', 1);
INSERT INTO `faculty` VALUES ('uni103_fac02', 'ຫຼັກ​ສູດ​ປະ​ລິນ​ຍາ​ຕີ​ຕໍ່​ເນື່ອງ', 'uni103', 1);

-- ----------------------------
-- Table structure for fy
-- ----------------------------
DROP TABLE IF EXISTS `fy`;
CREATE TABLE `fy`  (
  `fy_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `year` year NULL DEFAULT NULL,
  `file_path` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT NULL,
  `qty_student` int NULL DEFAULT NULL,
  `qty_con` int NULL DEFAULT NULL,
  `qty_student_inside` int NULL DEFAULT NULL,
  `qty_collegue_con` int NULL DEFAULT NULL,
  PRIMARY KEY (`fy_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of fy
-- ----------------------------
INSERT INTO `fy` VALUES ('2020-2021', 2020, '', 0, 0, 0, 0, 0);
INSERT INTO `fy` VALUES ('2021-2022', 2021, '', 1, 0, 0, 0, 0);

-- ----------------------------
-- Table structure for hrd_user
-- ----------------------------
DROP TABLE IF EXISTS `hrd_user`;
CREATE TABLE `hrd_user`  (
  `hrd_id` int NOT NULL AUTO_INCREMENT,
  `hrd_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `surname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tel` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `pass` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `uni_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `stt` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`hrd_id`) USING BTREE,
  INDEX `uni_id`(`uni_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `hrd_user_ibfk_1` FOREIGN KEY (`uni_id`) REFERENCES `university` (`uni_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `hrd_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hrd_user
-- ----------------------------
INSERT INTO `hrd_user` VALUES (3, 'admin', 'admin', 'ຊາຍ', '02099999999', 'admin@mod.com', '202cb962ac59075b964b07152d234b70', 7, 'HRD1', 1);
INSERT INTO `hrd_user` VALUES (8, 'hrd_central', 'test', 'ຊາຍ', '12345678', 'hrd@mod.com', '202cb962ac59075b964b07152d234b70', 23, 'HRD1', 1);
INSERT INTO `hrd_user` VALUES (11, 'Parkpasak', 'Hrd', 'ຊາຍ', '12345678', 'parkpasak@mod.com', '202cb962ac59075b964b07152d234b70', 2, 'HRD1', 1);
INSERT INTO `hrd_user` VALUES (12, 'noul', 'hrd', 'ຊາຍ', '12345678', 'noul_hrd@mod.com', '202cb962ac59075b964b07152d234b70', 24, 'HRD1', 1);

-- ----------------------------
-- Table structure for province_ministry
-- ----------------------------
DROP TABLE IF EXISTS `province_ministry`;
CREATE TABLE `province_ministry`  (
  `p_m_id` int NOT NULL AUTO_INCREMENT,
  `p_m_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `p_stt` int NULL DEFAULT NULL,
  PRIMARY KEY (`p_m_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of province_ministry
-- ----------------------------
INSERT INTO `province_ministry` VALUES (1, 'ນະຄອນຫຼວງວຽງຈັນ', 1);
INSERT INTO `province_ministry` VALUES (2, 'ແຂວງບໍແກ້ວ', 1);
INSERT INTO `province_ministry` VALUES (3, 'ແຂວງບໍລິຄຳໄຊ', 1);
INSERT INTO `province_ministry` VALUES (4, 'ແຂວງຈຳປາຊັກ', 1);
INSERT INTO `province_ministry` VALUES (5, 'ແຂວງຫົວພັນ\r\n', 1);
INSERT INTO `province_ministry` VALUES (6, 'ແຂວງຄຳມວນ\r\n', 1);
INSERT INTO `province_ministry` VALUES (7, 'ແຂວງຫຼວງນ້ຳທາ\r\n', 1);
INSERT INTO `province_ministry` VALUES (8, 'ແຂວງຫຼວງພະບາງ\r\n', 1);
INSERT INTO `province_ministry` VALUES (9, 'ແຂວງອຸດົມໄຊ\r\n', 1);
INSERT INTO `province_ministry` VALUES (10, 'ແຂວງຜົງສາລີ\r\n', 1);
INSERT INTO `province_ministry` VALUES (11, 'ແຂວງສາລະວັນ\r\n', 1);
INSERT INTO `province_ministry` VALUES (12, 'ແຂວງສະຫວັນນະເຂດ\r\n', 1);
INSERT INTO `province_ministry` VALUES (13, 'ແຂວງວຽງຈັນ\r\n', 1);
INSERT INTO `province_ministry` VALUES (14, 'ແຂວງໄຊຍະບູລີ\r\n', 1);
INSERT INTO `province_ministry` VALUES (15, 'ແຂວງເຊກອງ\r\n', 1);
INSERT INTO `province_ministry` VALUES (16, 'ແຂວງໄຊສົມບູນ\r\n', 1);
INSERT INTO `province_ministry` VALUES (17, 'ແຂວງຊຽງຂວາງ\r\n', 1);
INSERT INTO `province_ministry` VALUES (18, 'ແຂວງອັດຕະປື\r\n', 1);
INSERT INTO `province_ministry` VALUES (19, 'ກະຊວງແຮງງານ\r\n', 2);
INSERT INTO `province_ministry` VALUES (20, 'ກະຊວງພະລັງງານ\r\n', 2);
INSERT INTO `province_ministry` VALUES (40, 'ກະຊວງສຶກສາ', 2);
INSERT INTO `province_ministry` VALUES (41, 'ກະຊວງປ້ອງກັນປະເທດ', 2);

-- ----------------------------
-- Table structure for quota_distribute
-- ----------------------------
DROP TABLE IF EXISTS `quota_distribute`;
CREATE TABLE `quota_distribute`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `d_id` int NOT NULL,
  `p_m_id` int NOT NULL,
  `std_qty` int NOT NULL,
  `emp_qty` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `d_id`(`d_id`) USING BTREE,
  INDEX `p_m_id`(`p_m_id`) USING BTREE,
  CONSTRAINT `quota_distribute_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `adjustdetail` (`d_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `quota_distribute_ibfk_2` FOREIGN KEY (`p_m_id`) REFERENCES `province_ministry` (`p_m_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 850 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of quota_distribute
-- ----------------------------
INSERT INTO `quota_distribute` VALUES (115, 824, 20, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (116, 824, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (117, 824, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (118, 824, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (119, 824, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (120, 824, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (121, 824, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (122, 824, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (123, 824, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (124, 824, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (125, 824, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (132, 823, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (133, 823, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (134, 823, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (135, 823, 16, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (136, 823, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (137, 823, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (138, 823, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (139, 823, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (140, 823, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (141, 823, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (142, 823, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (143, 823, 8, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (144, 823, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (145, 823, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (146, 823, 5, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (147, 823, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (148, 823, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (149, 823, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (150, 822, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (151, 822, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (152, 822, 17, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (153, 822, 16, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (154, 822, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (155, 822, 14, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (156, 822, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (157, 822, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (158, 822, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (159, 822, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (160, 822, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (161, 822, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (162, 822, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (163, 822, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (164, 822, 5, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (165, 822, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (166, 822, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (167, 822, 1, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (168, 820, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (169, 820, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (170, 820, 17, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (171, 820, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (172, 820, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (173, 820, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (174, 820, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (175, 820, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (176, 820, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (177, 820, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (178, 820, 9, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (179, 820, 8, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (180, 820, 7, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (181, 820, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (182, 820, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (183, 820, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (184, 820, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (185, 820, 1, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (186, 819, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (187, 819, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (188, 819, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (189, 819, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (190, 819, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (191, 819, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (192, 819, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (193, 819, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (194, 819, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (195, 819, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (196, 819, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (197, 819, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (198, 819, 7, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (199, 819, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (200, 819, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (201, 819, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (202, 819, 3, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (203, 819, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (204, 818, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (205, 818, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (206, 818, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (207, 818, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (208, 818, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (209, 818, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (210, 818, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (211, 818, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (212, 818, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (213, 818, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (214, 818, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (215, 818, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (216, 818, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (217, 818, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (218, 818, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (219, 818, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (220, 818, 3, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (221, 818, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (222, 817, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (223, 817, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (224, 817, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (225, 817, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (226, 817, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (227, 817, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (228, 817, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (229, 817, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (230, 817, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (231, 817, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (232, 817, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (233, 817, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (234, 817, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (235, 817, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (236, 817, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (237, 817, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (238, 817, 3, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (239, 817, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (240, 816, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (241, 816, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (242, 816, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (243, 816, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (244, 816, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (245, 816, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (246, 816, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (247, 816, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (248, 816, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (249, 816, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (250, 816, 9, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (251, 816, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (252, 816, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (253, 816, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (254, 816, 5, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (255, 816, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (256, 816, 3, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (257, 816, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (258, 815, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (259, 815, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (260, 815, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (261, 815, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (262, 815, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (263, 815, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (264, 815, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (265, 815, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (266, 815, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (267, 815, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (268, 815, 9, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (269, 815, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (270, 815, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (271, 815, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (272, 815, 5, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (273, 815, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (274, 815, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (275, 815, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (276, 814, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (277, 814, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (278, 814, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (279, 814, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (280, 814, 15, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (281, 814, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (282, 814, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (283, 814, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (284, 814, 11, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (285, 814, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (286, 814, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (287, 814, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (288, 814, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (289, 814, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (290, 814, 5, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (291, 814, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (292, 814, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (293, 814, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (294, 982, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (295, 982, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (296, 982, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (297, 982, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (298, 982, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (299, 982, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (300, 982, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (301, 982, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (302, 982, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (303, 982, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (304, 982, 9, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (305, 982, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (306, 982, 7, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (307, 982, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (308, 982, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (309, 982, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (310, 982, 3, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (311, 982, 1, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (312, 981, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (313, 981, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (314, 981, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (315, 981, 16, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (316, 981, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (317, 981, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (318, 981, 13, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (319, 981, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (320, 981, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (321, 981, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (322, 981, 9, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (323, 981, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (324, 981, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (325, 981, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (326, 981, 5, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (327, 981, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (328, 981, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (329, 981, 1, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (330, 980, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (331, 980, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (332, 980, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (333, 980, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (334, 980, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (335, 980, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (336, 980, 13, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (337, 980, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (338, 980, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (339, 980, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (340, 980, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (341, 980, 8, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (342, 980, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (343, 980, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (344, 980, 5, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (345, 980, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (346, 980, 3, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (347, 980, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (348, 979, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (349, 979, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (350, 979, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (351, 979, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (352, 979, 15, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (353, 979, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (354, 979, 13, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (355, 979, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (356, 979, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (357, 979, 10, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (358, 979, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (359, 979, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (360, 979, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (361, 979, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (362, 979, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (363, 979, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (364, 979, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (365, 979, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (366, 978, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (367, 978, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (368, 978, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (369, 978, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (370, 978, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (371, 978, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (372, 978, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (373, 978, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (374, 978, 11, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (375, 978, 10, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (376, 978, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (377, 978, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (378, 978, 7, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (379, 978, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (380, 978, 5, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (381, 978, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (382, 978, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (383, 978, 1, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (384, 977, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (385, 977, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (386, 977, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (387, 977, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (388, 977, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (389, 977, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (390, 977, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (391, 977, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (392, 977, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (393, 977, 10, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (394, 977, 9, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (395, 977, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (396, 977, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (397, 977, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (398, 977, 5, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (399, 977, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (400, 977, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (401, 977, 1, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (402, 976, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (403, 976, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (404, 976, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (405, 976, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (406, 976, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (407, 976, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (408, 976, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (409, 976, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (410, 976, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (411, 976, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (412, 976, 9, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (413, 976, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (414, 976, 7, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (415, 976, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (416, 976, 5, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (417, 976, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (418, 976, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (419, 976, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (420, 975, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (421, 975, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (422, 975, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (423, 975, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (424, 975, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (425, 975, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (426, 975, 13, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (427, 975, 12, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (428, 975, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (429, 975, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (430, 975, 9, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (431, 975, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (432, 975, 7, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (433, 975, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (434, 975, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (435, 975, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (436, 975, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (437, 975, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (438, 974, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (439, 974, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (440, 974, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (441, 974, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (442, 974, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (443, 974, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (444, 974, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (445, 974, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (446, 974, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (447, 974, 10, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (448, 974, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (449, 974, 8, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (450, 974, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (451, 974, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (452, 974, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (453, 974, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (454, 974, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (455, 974, 1, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (456, 973, 20, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (457, 973, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (458, 973, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (459, 973, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (460, 973, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (461, 973, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (462, 973, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (463, 973, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (464, 973, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (465, 973, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (466, 973, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (467, 973, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (468, 973, 7, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (469, 973, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (470, 973, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (471, 973, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (472, 973, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (473, 973, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (474, 667, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (475, 667, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (476, 667, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (477, 667, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (478, 667, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (479, 667, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (480, 667, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (481, 667, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (482, 667, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (483, 667, 9, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (484, 667, 8, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (485, 667, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (486, 667, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (487, 667, 5, 2, 0, 23);
INSERT INTO `quota_distribute` VALUES (488, 667, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (489, 667, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (490, 667, 2, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (491, 667, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (492, 666, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (493, 666, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (494, 666, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (495, 666, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (496, 666, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (497, 666, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (498, 666, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (499, 666, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (500, 666, 10, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (501, 666, 9, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (502, 666, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (503, 666, 7, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (504, 666, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (505, 666, 5, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (506, 666, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (507, 666, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (508, 666, 2, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (509, 666, 1, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (510, 665, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (511, 665, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (512, 665, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (513, 665, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (514, 665, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (515, 665, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (516, 665, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (517, 665, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (518, 665, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (519, 665, 9, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (520, 665, 8, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (521, 665, 7, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (522, 665, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (523, 665, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (524, 665, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (525, 665, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (526, 665, 2, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (527, 665, 1, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (528, 664, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (529, 664, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (530, 664, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (531, 664, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (532, 664, 14, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (533, 664, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (534, 664, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (535, 664, 11, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (536, 664, 10, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (537, 664, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (538, 664, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (539, 664, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (540, 664, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (541, 664, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (542, 664, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (543, 664, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (544, 664, 2, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (545, 664, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (546, 663, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (547, 663, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (548, 663, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (549, 663, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (550, 663, 14, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (551, 663, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (552, 663, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (553, 663, 11, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (554, 663, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (555, 663, 9, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (556, 663, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (557, 663, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (558, 663, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (559, 663, 5, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (560, 663, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (561, 663, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (562, 663, 2, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (563, 663, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (564, 972, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (565, 972, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (566, 972, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (567, 972, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (568, 972, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (569, 972, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (570, 972, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (571, 972, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (572, 972, 10, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (573, 972, 9, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (574, 972, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (575, 972, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (576, 972, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (577, 972, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (578, 972, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (579, 972, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (580, 972, 2, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (581, 972, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (582, 971, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (583, 971, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (584, 971, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (585, 971, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (586, 971, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (587, 971, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (588, 971, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (589, 971, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (590, 971, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (591, 971, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (592, 971, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (593, 971, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (594, 971, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (595, 971, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (596, 971, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (597, 971, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (598, 971, 2, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (599, 971, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (600, 970, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (601, 970, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (602, 970, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (603, 970, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (604, 970, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (605, 970, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (606, 970, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (607, 970, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (608, 970, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (609, 970, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (610, 970, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (611, 970, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (612, 970, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (613, 970, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (614, 970, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (615, 970, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (616, 970, 2, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (617, 970, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (618, 969, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (619, 969, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (620, 969, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (621, 969, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (622, 969, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (623, 969, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (624, 969, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (625, 969, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (626, 969, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (627, 969, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (628, 969, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (629, 969, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (630, 969, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (631, 969, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (632, 969, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (633, 969, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (634, 969, 2, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (635, 969, 1, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (636, 968, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (637, 968, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (638, 968, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (639, 968, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (640, 968, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (641, 968, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (642, 968, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (643, 968, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (644, 968, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (645, 968, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (646, 968, 8, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (647, 968, 7, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (648, 968, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (649, 968, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (650, 968, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (651, 968, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (652, 968, 2, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (653, 968, 1, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (654, 967, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (655, 967, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (656, 967, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (657, 967, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (658, 967, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (659, 967, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (660, 967, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (661, 967, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (662, 967, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (663, 967, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (664, 967, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (665, 967, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (666, 967, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (667, 967, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (668, 967, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (669, 967, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (670, 967, 2, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (671, 967, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (672, 966, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (673, 966, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (674, 966, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (675, 966, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (676, 966, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (677, 966, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (678, 966, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (679, 966, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (680, 966, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (681, 966, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (682, 966, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (683, 966, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (684, 966, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (685, 966, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (686, 966, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (687, 966, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (688, 966, 2, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (689, 966, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (690, 965, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (691, 965, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (692, 965, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (693, 965, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (694, 965, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (695, 965, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (696, 965, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (697, 965, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (698, 965, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (699, 965, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (700, 965, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (701, 965, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (702, 965, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (703, 965, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (704, 965, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (705, 965, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (706, 965, 2, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (707, 965, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (708, 964, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (709, 964, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (710, 964, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (711, 964, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (712, 964, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (713, 964, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (714, 964, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (715, 964, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (716, 964, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (717, 964, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (718, 964, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (719, 964, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (720, 964, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (721, 964, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (722, 964, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (723, 964, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (724, 964, 2, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (725, 964, 1, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (726, 963, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (727, 963, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (728, 963, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (729, 963, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (730, 963, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (731, 963, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (732, 963, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (733, 963, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (734, 963, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (735, 963, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (736, 963, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (737, 963, 7, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (738, 963, 6, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (739, 963, 5, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (740, 963, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (741, 963, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (742, 963, 2, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (743, 963, 1, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (744, 962, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (745, 962, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (746, 962, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (747, 962, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (748, 962, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (749, 962, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (750, 962, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (751, 962, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (752, 962, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (753, 962, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (754, 962, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (755, 962, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (756, 962, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (757, 962, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (758, 962, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (759, 962, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (760, 962, 2, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (761, 962, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (762, 960, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (763, 960, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (764, 960, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (765, 960, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (766, 960, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (767, 960, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (768, 960, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (769, 960, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (770, 960, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (771, 960, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (772, 960, 8, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (773, 960, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (774, 960, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (775, 960, 5, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (776, 960, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (777, 960, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (778, 960, 2, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (779, 960, 1, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (780, 959, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (781, 959, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (782, 959, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (783, 959, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (784, 959, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (785, 959, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (786, 959, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (787, 959, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (788, 959, 10, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (789, 959, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (790, 959, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (791, 959, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (792, 959, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (793, 959, 5, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (794, 959, 4, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (795, 959, 3, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (796, 959, 2, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (797, 959, 1, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (798, 958, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (799, 958, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (800, 958, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (801, 958, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (802, 958, 14, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (803, 958, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (804, 958, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (805, 958, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (806, 958, 10, 2, 0, 23);
INSERT INTO `quota_distribute` VALUES (807, 958, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (808, 958, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (809, 958, 7, 2, 0, 23);
INSERT INTO `quota_distribute` VALUES (810, 958, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (811, 958, 5, 2, 0, 23);
INSERT INTO `quota_distribute` VALUES (812, 958, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (813, 958, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (814, 958, 2, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (815, 958, 1, 2, 0, 23);
INSERT INTO `quota_distribute` VALUES (816, 957, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (817, 957, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (818, 957, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (819, 957, 15, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (820, 957, 14, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (821, 957, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (822, 957, 12, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (823, 957, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (824, 957, 10, 2, 0, 23);
INSERT INTO `quota_distribute` VALUES (825, 957, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (826, 957, 8, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (827, 957, 7, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (828, 957, 6, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (829, 957, 5, 2, 0, 23);
INSERT INTO `quota_distribute` VALUES (830, 957, 4, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (831, 957, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (832, 957, 2, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (833, 957, 1, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (834, 956, 18, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (835, 956, 17, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (836, 956, 16, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (837, 956, 15, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (838, 956, 14, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (839, 956, 13, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (840, 956, 12, 2, 0, 23);
INSERT INTO `quota_distribute` VALUES (841, 956, 11, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (842, 956, 10, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (843, 956, 9, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (844, 956, 8, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (845, 956, 7, 2, 0, 23);
INSERT INTO `quota_distribute` VALUES (846, 956, 5, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (847, 956, 3, 0, 0, 23);
INSERT INTO `quota_distribute` VALUES (848, 956, 2, 1, 0, 23);
INSERT INTO `quota_distribute` VALUES (849, 956, 1, 1, 0, 23);

-- ----------------------------
-- Table structure for statatic
-- ----------------------------
DROP TABLE IF EXISTS `statatic`;
CREATE TABLE `statatic`  (
  `st_id` int NOT NULL AUTO_INCREMENT,
  `st_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `st_group` int NULL DEFAULT NULL,
  `level_id` int NULL DEFAULT NULL,
  `stt` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`st_id`) USING BTREE,
  INDEX `st_group`(`st_group`) USING BTREE,
  INDEX `level_id`(`level_id`) USING BTREE,
  CONSTRAINT `statatic_ibfk_1` FOREIGN KEY (`st_group`) REFERENCES `statatic_group` (`group_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `statatic_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `course_level` (`level_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of statatic
-- ----------------------------
INSERT INTO `statatic` VALUES (2, 'ລະດັບປະສິນຍາຕີ', 2, 4, 1);
INSERT INTO `statatic` VALUES (3, 'ລະດັບປະລິນຍາຕີຕໍ່ເນື່ອງ', 2, 3, 1);
INSERT INTO `statatic` VALUES (4, 'ລະດັບອະນຸປະລິນຍາຕີ', 2, 2, 1);
INSERT INTO `statatic` VALUES (5, 'ນັກຮຽນເກັ່ງເສັງໄດ້ທີ 1 ຂອງ 4 ວິຊາຫຼັກຂອງແຂວງທົດແທນນັກຮຽນເກັ່ງລະດັບຊາດຮຽນຕໍ່ມາຫາວິທະຍາໄລ', 2, 4, 1);
INSERT INTO `statatic` VALUES (6, 'ນັກຮຽນເກັ່ງໃບປະກາສະນີຍະບັດແດງຮຽນຕໍ່ມະຫາວິທະຍາໄລ', 2, 3, 1);
INSERT INTO `statatic` VALUES (7, 'ນັກຮຽນເກັ່ງເສັງໄດ້ທີ່ 1 ຂອງແຂວງຮຽນຕໍ່ມະຫາວິທະຍາໄລ', 2, 4, 1);
INSERT INTO `statatic` VALUES (10, 'ຄູອາສາ', 5, 4, 1);
INSERT INTO `statatic` VALUES (11, 'ປະລິນຍາຕີ (12+4)', 6, 4, 1);
INSERT INTO `statatic` VALUES (12, 'ຊັ້ນສູງ (12+2)', 6, 2, 1);
INSERT INTO `statatic` VALUES (13, 'ຊັ້ນກາງເປັນຊັ້ນສູງ', 7, 8, 1);
INSERT INTO `statatic` VALUES (14, 'ອະນຸບານຊັ້ນກາງເປັນຊັ້ນສູງ', 8, 7, 1);
INSERT INTO `statatic` VALUES (15, 'ອະນຸບານຊັ້ນສູງເປັນປະລິນຍາຕີ', 8, 3, 1);
INSERT INTO `statatic` VALUES (16, 'ຄູປະຖົມຊັ້ນສູງເປັນປະລິນຍາຕີ', 8, 3, 1);
INSERT INTO `statatic` VALUES (17, 'ຄູມັດທະຍົມປະລິນຍາຕີ', 8, 4, 1);
INSERT INTO `statatic` VALUES (19, 'ລະດັບປະລິນຍາຕີຕໍ່ເນື່ອງ', 9, 3, 1);
INSERT INTO `statatic` VALUES (20, 'ຫຼັກ​ສູດ​ປະ​ລີນ​ຍາ​ຕີ', 9, 4, 1);
INSERT INTO `statatic` VALUES (21, 'ລະດັບຊັ້ນສູງ', 9, 2, 1);
INSERT INTO `statatic` VALUES (22, 'ລະດັບປະລິນຍາຕີຕໍ່ເນື່ອງ', 10, 3, 1);
INSERT INTO `statatic` VALUES (23, 'ຫຼັກ​ສູດ​ປະ​ລີນ​ຍາ​ຕີ', 10, 4, 1);
INSERT INTO `statatic` VALUES (24, 'ລະດັບຊັ້ນສູງ', 10, 2, 1);
INSERT INTO `statatic` VALUES (25, 'ລະດັບປະລິນຍາຕີຕໍ່ເນື່ອງ', 11, 3, 1);
INSERT INTO `statatic` VALUES (26, 'ລະດັບຊັ້ນສູງຕໍ່ເນື່ອງ', 11, 7, 1);
INSERT INTO `statatic` VALUES (27, 'ລະດັບຊັ້ນສູງ', 11, 1, 1);
INSERT INTO `statatic` VALUES (28, 'ລະດັບຊັ້ນກາງ (12+2)', 11, 1, 1);
INSERT INTO `statatic` VALUES (29, 'ລະດັບຊັ້ນກາງ (9+3)', 11, 1, 1);
INSERT INTO `statatic` VALUES (30, 'ນັກຮຽນວິຊາຊີບຊັ້ນຕົ້ນ', 11, 9, 1);

-- ----------------------------
-- Table structure for statatic_group
-- ----------------------------
DROP TABLE IF EXISTS `statatic_group`;
CREATE TABLE `statatic_group`  (
  `group_id` int NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `dept_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `stt` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`group_id`) USING BTREE,
  INDEX `dept_id`(`dept_id`) USING BTREE,
  CONSTRAINT `statatic_group_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of statatic_group
-- ----------------------------
INSERT INTO `statatic_group` VALUES (2, 'ສັ່ງລວມຂໍ້ມູນຈຳນວນນັກຮຽນ ແລະ ພະນັກງານຮຽນຕໍ່ໃນມະຫາວິທະຍາໄລ', '001', 1);
INSERT INTO `statatic_group` VALUES (5, 'ຄູອາສາ', 'Dep_002', 1);
INSERT INTO `statatic_group` VALUES (6, 'ລະບົບປົກກະຕິ', 'Dep_002', 1);
INSERT INTO `statatic_group` VALUES (7, 'ລະບົບຕໍ່ເນື່ອງພາກພັກສິ້ນປີຮຽນ', 'Dep_002', 1);
INSERT INTO `statatic_group` VALUES (8, 'ລະບົບຕໍ່ເນື່ອງປົກກະຕິ', 'Dep_002', 1);
INSERT INTO `statatic_group` VALUES (9, 'ຈຳນວນນັກຮຽນເຂົ້າ ຮຽນຕໍ່​ສະຖາບັນກິລາ-ກາຍຍະກຳ', 'Dep_11', 1);
INSERT INTO `statatic_group` VALUES (10, 'ຈຳນວນນັກຮຽນ-ພະນັກງານ ຮຽນຕໍ່​ສາຍ​ພາກ​ເອ​ກະ​ຊົນທັງໝົດ', 'Dep_12', 1);
INSERT INTO `statatic_group` VALUES (11, 'ຈຳນວນນັກຮຽນ-ພະນັກງານ ຮຽນຕໍ່ສະຖານອາຊີວະສຶກສາ ທັງໝົດ', 'Dep_003', 1);

-- ----------------------------
-- Table structure for statistic_detail
-- ----------------------------
DROP TABLE IF EXISTS `statistic_detail`;
CREATE TABLE `statistic_detail`  (
  `as_id` int NOT NULL AUTO_INCREMENT,
  `adj_id` int NULL DEFAULT NULL,
  `st_id` int NULL DEFAULT NULL,
  `std_high_school` int NULL DEFAULT NULL,
  `univer` int NULL DEFAULT NULL,
  `univer_valunteer` int NULL DEFAULT NULL,
  `prov` int NULL DEFAULT NULL,
  `intv` int NULL DEFAULT NULL,
  `ad_test` int NULL DEFAULT NULL,
  `std_public` int NULL DEFAULT NULL,
  `emp` int NULL DEFAULT NULL,
  `std_handi` int NULL DEFAULT NULL,
  `std_lan` int NULL DEFAULT NULL,
  `ssk` int NULL DEFAULT NULL,
  `std` int NULL DEFAULT NULL,
  `emp_gov` int NULL DEFAULT NULL,
  `test` int NULL DEFAULT NULL,
  `std_con` int NULL DEFAULT NULL,
  `std_2lan` int NULL DEFAULT NULL,
  `std_inter` int NULL DEFAULT NULL,
  `emp_private` int NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`as_id`) USING BTREE,
  INDEX `adj_id`(`adj_id`) USING BTREE,
  INDEX `st_id`(`st_id`) USING BTREE,
  INDEX `statistic_detail_ibfk_3`(`user_id`) USING BTREE,
  CONSTRAINT `statistic_detail_ibfk_1` FOREIGN KEY (`adj_id`) REFERENCES `adjust` (`adj_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `statistic_detail_ibfk_2` FOREIGN KEY (`st_id`) REFERENCES `statatic` (`st_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `statistic_detail_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of statistic_detail
-- ----------------------------
INSERT INTO `statistic_detail` VALUES (1, 162, 2, 0, 732, 75, 749, 0, 0, 0, 0, 0, 0, 0, 8375, 0, 0, 0, 0, 0, 0, 74);
INSERT INTO `statistic_detail` VALUES (2, 162, 3, 0, 0, 0, 0, 0, 0, 208, 0, 0, 0, 0, 0, 0, 0, 2462, 0, 0, 0, 74);
INSERT INTO `statistic_detail` VALUES (3, 162, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 190, 0, 0, 0, 74);
INSERT INTO `statistic_detail` VALUES (4, 162, 5, 0, 0, 0, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 74);
INSERT INTO `statistic_detail` VALUES (5, 162, 6, 0, 30, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 74);
INSERT INTO `statistic_detail` VALUES (6, 162, 7, 0, 0, 0, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 74);
INSERT INTO `statistic_detail` VALUES (9, 160, 10, 0, 0, 200, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23);
INSERT INTO `statistic_detail` VALUES (10, 160, 11, 0, 141, 0, 0, 0, 106, 0, 0, 0, 0, 0, 988, 0, 0, 0, 0, 0, 0, 23);
INSERT INTO `statistic_detail` VALUES (11, 160, 12, 0, 66, 66, 0, 0, 0, 0, 0, 0, 0, 0, 528, 0, 0, 0, 0, 0, 0, 23);
INSERT INTO `statistic_detail` VALUES (12, 160, 13, 0, 0, 0, 0, 0, 0, 0, 660, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23);
INSERT INTO `statistic_detail` VALUES (13, 188, 19, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23);
INSERT INTO `statistic_detail` VALUES (14, 188, 20, NULL, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23);
INSERT INTO `statistic_detail` VALUES (15, 189, 22, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 300, 0, 0, 0, 0, 0, 0, 23);
INSERT INTO `statistic_detail` VALUES (16, 189, 23, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1655, 0, 0, 0, 0, 0, 0, 23);
INSERT INTO `statistic_detail` VALUES (17, 159, 25, NULL, 0, 0, 0, 56, 0, 0, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23);
INSERT INTO `statistic_detail` VALUES (18, 159, 26, NULL, 0, 0, 0, 1077, 235, 0, 196, 0, 0, 0, 2456, 0, 0, 0, 0, 0, 0, 23);
INSERT INTO `statistic_detail` VALUES (19, 159, 27, NULL, 0, 0, 0, 343, 978, 0, 0, 0, 0, 0, 4607, 0, 0, 0, 0, 0, 0, 23);
INSERT INTO `statistic_detail` VALUES (20, 159, 28, NULL, 0, 0, 0, 4615, 751, 0, 284, 0, 0, 0, 2189, 0, 0, 0, 0, 0, 0, 23);
INSERT INTO `statistic_detail` VALUES (21, 159, 29, NULL, 0, 0, 0, 3206, 0, 0, 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23);
INSERT INTO `statistic_detail` VALUES (22, 159, 30, NULL, 0, 0, 0, 2256, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23);

-- ----------------------------
-- Table structure for statistic_distribute
-- ----------------------------
DROP TABLE IF EXISTS `statistic_distribute`;
CREATE TABLE `statistic_distribute`  (
  `sd_id` int NOT NULL AUTO_INCREMENT,
  `as_id` int NULL DEFAULT NULL,
  `p_m_id` int NULL DEFAULT NULL,
  `std_qty` int NULL DEFAULT NULL,
  `emp_qty` int NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`sd_id`) USING BTREE,
  INDEX `as_id`(`as_id`) USING BTREE,
  INDEX `p_m_id`(`p_m_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `statistic_distribute_ibfk_1` FOREIGN KEY (`as_id`) REFERENCES `statistic_detail` (`as_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `statistic_distribute_ibfk_2` FOREIGN KEY (`p_m_id`) REFERENCES `province_ministry` (`p_m_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `statistic_distribute_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 111 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of statistic_distribute
-- ----------------------------
INSERT INTO `statistic_distribute` VALUES (26, 4, 20, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (27, 4, 19, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (28, 4, 18, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (29, 4, 17, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (30, 4, 16, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (31, 4, 15, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (32, 4, 14, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (33, 4, 13, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (34, 4, 12, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (35, 4, 11, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (36, 4, 10, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (37, 4, 9, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (38, 4, 8, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (39, 4, 7, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (40, 4, 6, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (41, 4, 5, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (42, 4, 4, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (43, 4, 3, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (44, 4, 2, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (45, 4, 1, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (46, 6, 20, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (47, 6, 19, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (48, 6, 18, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (49, 6, 17, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (50, 6, 16, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (51, 6, 15, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (52, 6, 14, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (53, 6, 13, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (54, 6, 12, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (55, 6, 11, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (56, 6, 10, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (57, 6, 9, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (58, 6, 8, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (59, 6, 7, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (60, 6, 6, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (61, 6, 5, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (62, 6, 4, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (63, 6, 3, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (64, 6, 2, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (65, 6, 1, 1, 0, 23);
INSERT INTO `statistic_distribute` VALUES (66, 1, 20, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (67, 1, 19, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (68, 1, 18, 38, 0, 23);
INSERT INTO `statistic_distribute` VALUES (69, 1, 17, 38, 0, 23);
INSERT INTO `statistic_distribute` VALUES (70, 1, 16, 36, 0, 23);
INSERT INTO `statistic_distribute` VALUES (71, 1, 15, 39, 0, 23);
INSERT INTO `statistic_distribute` VALUES (72, 1, 14, 38, 0, 23);
INSERT INTO `statistic_distribute` VALUES (73, 1, 13, 39, 0, 23);
INSERT INTO `statistic_distribute` VALUES (74, 1, 12, 56, 0, 23);
INSERT INTO `statistic_distribute` VALUES (75, 1, 11, 50, 0, 23);
INSERT INTO `statistic_distribute` VALUES (76, 1, 10, 37, 0, 23);
INSERT INTO `statistic_distribute` VALUES (77, 1, 9, 38, 0, 23);
INSERT INTO `statistic_distribute` VALUES (78, 1, 8, 39, 0, 23);
INSERT INTO `statistic_distribute` VALUES (79, 1, 7, 38, 0, 23);
INSERT INTO `statistic_distribute` VALUES (80, 1, 6, 41, 0, 23);
INSERT INTO `statistic_distribute` VALUES (81, 1, 5, 39, 0, 23);
INSERT INTO `statistic_distribute` VALUES (82, 1, 4, 42, 0, 23);
INSERT INTO `statistic_distribute` VALUES (83, 1, 3, 39, 0, 23);
INSERT INTO `statistic_distribute` VALUES (84, 1, 2, 38, 0, 23);
INSERT INTO `statistic_distribute` VALUES (85, 1, 1, 64, 0, 23);
INSERT INTO `statistic_distribute` VALUES (87, 2, 40, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (88, 2, 20, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (89, 2, 19, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (90, 2, 18, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (91, 2, 17, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (92, 2, 16, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (93, 2, 15, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (94, 2, 14, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (95, 2, 13, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (96, 2, 12, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (97, 2, 11, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (98, 2, 10, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (99, 2, 9, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (100, 2, 8, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (101, 2, 7, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (102, 2, 6, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (103, 2, 5, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (104, 2, 4, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (105, 2, 3, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (106, 2, 2, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (107, 2, 1, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (108, 1, 40, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (109, 4, 40, 0, 0, 23);
INSERT INTO `statistic_distribute` VALUES (110, 6, 40, 0, 0, 23);

-- ----------------------------
-- Table structure for supply_user
-- ----------------------------
DROP TABLE IF EXISTS `supply_user`;
CREATE TABLE `supply_user`  (
  `sup_id` int NOT NULL AUTO_INCREMENT,
  `sup_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `surname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tel` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `pass` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `uni_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `stt` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`sup_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `uni_id`(`uni_id`) USING BTREE,
  CONSTRAINT `supply_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `supply_user_ibfk_2` FOREIGN KEY (`uni_id`) REFERENCES `university` (`uni_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of supply_user
-- ----------------------------
INSERT INTO `supply_user` VALUES (9, 'NOUL', 'supply', 'ຊາຍ', '-', 'noul@mod.com', '202cb962ac59075b964b07152d234b70', 1, 'uni001', 1);
INSERT INTO `supply_user` VALUES (10, 'NCPS', 'supply', 'ຊາຍ', '-', 'ncps@mod.com', '202cb962ac59075b964b07152d234b70', 12, 'uni002', 1);
INSERT INTO `supply_user` VALUES (11, 'NSPN', 'supply', 'ຊາຍ', '-', 'nspn@mod.com', '202cb962ac59075b964b07152d234b70', 26, 'uni003', 1);
INSERT INTO `supply_user` VALUES (12, 'nsvk', 'supply', 'ຊາຍ', '-', 'nsvk@mod.com', '202cb962ac59075b964b07152d234b70', 13, 'uni004', 1);
INSERT INTO `supply_user` VALUES (13, 'mvs', 'supply', 'ຊາຍ', '-', 'mvs@mod.com', '202cb962ac59075b964b07152d234b70', 64, 'uni042', 1);
INSERT INTO `supply_user` VALUES (14, 'vsr', 'supply', 'ຊາຍ', '-', 'vsr@mod.com', '202cb962ac59075b964b07152d234b70', 63, 'uni043', 1);
INSERT INTO `supply_user` VALUES (15, 'vss', 'supply', 'ຊາຍ', '-', 'vss@mod.com', '202cb962ac59075b964b07152d234b70', 62, 'uni044', 1);
INSERT INTO `supply_user` VALUES (16, 'vsj', 'supply', 'ຊາຍ', '-', 'vsj@mod.com', '202cb962ac59075b964b07152d234b70', 61, 'uni045', 1);
INSERT INTO `supply_user` VALUES (17, 'hssk', 'supply', 'ຊາຍ', '-', 'hssk@mod.com', '202cb962ac59075b964b07152d234b70', 60, 'uni046', 1);
INSERT INTO `supply_user` VALUES (18, 'hhudom', 'supply', 'ຊາຍ', '-', 'hhudom@mod.com', '202cb962ac59075b964b07152d234b70', 59, 'uni047', 1);
INSERT INTO `supply_user` VALUES (19, 'hpbt', 'supply', 'ຊາຍ', '-', 'hpbt@mod.com', '202cb962ac59075b964b07152d234b70', 58, 'uni048', 1);
INSERT INTO `supply_user` VALUES (20, 'hhkmg', 'supply', 'ຊາຍ', '-', 'hhkmg@mod.com', '202cb962ac59075b964b07152d234b70', 57, 'uni049', 1);
INSERT INTO `supply_user` VALUES (21, 'hsk', 'supply', 'ຊາຍ', '-', 'hsk@mod.com', '202cb962ac59075b964b07152d234b70', 56, 'uni050', 1);
INSERT INTO `supply_user` VALUES (22, 'svse', 'supply', 'ຊາຍ', '-', 'svse@mod.com', '202cb962ac59075b964b07152d234b70', 55, 'uni051', 1);
INSERT INTO `supply_user` VALUES (23, 'vijidsin', 'supply', 'ຊາຍ', '-', 'vijidsin@mod.com', '202cb962ac59075b964b07152d234b70', 54, 'uni052', 1);
INSERT INTO `supply_user` VALUES (24, 'art', 'supply', 'ຊາຍ', '-', 'art@mod.com', '202cb962ac59075b964b07152d234b70', 53, 'uni053', 1);
INSERT INTO `supply_user` VALUES (25, 'vjsl', 'supply', 'ຊາຍ', '-', 'vjsl@mod.com', '202cb962ac59075b964b07152d234b70', 45, 'uni054', 1);
INSERT INTO `supply_user` VALUES (26, 'vjss', 'supply', 'ຊາຍ', '-', 'vjss@mod.com', '202cb962ac59075b964b07152d234b70', 52, 'uni055', 1);
INSERT INTO `supply_user` VALUES (27, 'vjsc', 'supply', 'ຊາຍ', '-', 'vjsc@mod.com', '202cb962ac59075b964b07152d234b70', 46, 'uni056', 1);
INSERT INTO `supply_user` VALUES (28, 'bionorth', 'supply', 'ຊາຍ', '-', 'bionorth@mod.com', '202cb962ac59075b964b07152d234b70', 47, 'uni057', 1);
INSERT INTO `supply_user` VALUES (29, 'bioblk', 'supply', 'ຊາຍ', '-', 'bioblk@mod.com', '202cb962ac59075b964b07152d234b70', 48, 'uni058', 1);
INSERT INTO `supply_user` VALUES (30, 'biosvk', 'supply', 'ຊາຍ', '-', 'biosvk@mod.com', '202cb962ac59075b964b07152d234b70', 49, 'uni059', 1);
INSERT INTO `supply_user` VALUES (31, 'biocps', 'supply', 'ຊາຍ', '-', 'biocps@mod.com', '202cb962ac59075b964b07152d234b70', 50, 'uni060', 1);
INSERT INTO `supply_user` VALUES (32, 'finanlpb', 'supply', 'ຊາຍ', '-', 'finanlpb@mod.com', '202cb962ac59075b964b07152d234b70', 51, 'uni062', 1);
INSERT INTO `supply_user` VALUES (33, 'ecodks', 'supply', 'ຊາຍ', '-', 'ecodks@mod.com', '202cb962ac59075b964b07152d234b70', 70, 'uni063', 1);
INSERT INTO `supply_user` VALUES (34, 'financps', 'supply', 'ຊາຍ', '-', 'financps@mod.com', '202cb962ac59075b964b07152d234b70', 65, 'uni064', 1);
INSERT INTO `supply_user` VALUES (35, 'bank', 'supply', 'ຊາຍ', '-', 'bank@mod.com', '202cb962ac59075b964b07152d234b70', 69, 'uni065', 1);
INSERT INTO `supply_user` VALUES (36, 'lawlpb', 'supply', 'ຊາຍ', '-', 'lawlpb@mod.com', '202cb962ac59075b964b07152d234b70', 66, 'uni066', 1);
INSERT INTO `supply_user` VALUES (37, 'lawcps', 'supply', 'ຊາຍ', '-', 'lawcps@mod.com', '202cb962ac59075b964b07152d234b70', 67, 'uni067', 1);
INSERT INTO `supply_user` VALUES (38, 'lawsvk', 'supply', 'ຊາຍ', '-', 'lawsvk@mod.com', '202cb962ac59075b964b07152d234b70', 68, 'uni068', 1);
INSERT INTO `supply_user` VALUES (39, 'lawvte', 'supply', 'ຊາຍ', '-', 'lawvte@mod.com', '202cb962ac59075b964b07152d234b70', 71, 'uni069', 1);
INSERT INTO `supply_user` VALUES (40, 'lawcom', 'supply', 'ຊາຍ', '-', 'lawcom@mod.com', '202cb962ac59075b964b07152d234b70', 72, 'uni070', 1);
INSERT INTO `supply_user` VALUES (41, 'sontangon', 'supply', 'ຊາຍ', '-', 'sontangon@mod.com', '202cb962ac59075b964b07152d234b70', 73, 'uni061', 1);
INSERT INTO `supply_user` VALUES (42, 'Noul Con', 'supply', 'ຊາຍ', '123', 'Noul_Con@mod.com', '202cb962ac59075b964b07152d234b70', 74, 'uni075', 1);
INSERT INTO `supply_user` VALUES (43, 'Ncps con', 'supply', 'ຊາຍ', '123', 'Ncps_con@mod.com', '202cb962ac59075b964b07152d234b70', 75, 'uni073', 1);
INSERT INTO `supply_user` VALUES (44, 'nspn con', 'supply', 'ຊາຍ', '123', 'Nspn_con@mod.com', '202cb962ac59075b964b07152d234b70', 76, 'uni074', 1);
INSERT INTO `supply_user` VALUES (45, 'nsvk con', 'supply', 'ຊາຍ', '123', 'Nsvk_con@mod.com', '202cb962ac59075b964b07152d234b70', 77, 'uni072', 1);
INSERT INTO `supply_user` VALUES (46, 'noul high', 'supply', 'ຊາຍ', '-', 'noul_high@mod.com', '202cb962ac59075b964b07152d234b70', 78, 'uni076', 1);
INSERT INTO `supply_user` VALUES (47, 'NCPS high', 'supply', 'ຊາຍ', '-', 'ncps_high@mod.com', '202cb962ac59075b964b07152d234b70', 79, 'uni077', 1);
INSERT INTO `supply_user` VALUES (48, 'ນັກຮຽນວິຊາຊີບຊັ້ນຕົ້ນ', '-', 'ຊາຍ', '-', 'primaryeco@mod.com', '202cb962ac59075b964b07152d234b70', 80, 'uni100', 1);
INSERT INTO `supply_user` VALUES (49, 'Dte_bachelor', 'Suppy', 'ຊາຍ', '0', 'dte_bachelor@mod.com', '202cb962ac59075b964b07152d234b70', 81, 'MT_001', 1);
INSERT INTO `supply_user` VALUES (50, 'Dte_deploma', 'Suppy', 'ຊາຍ', '0', 'dte_deploma@mod.com', '202cb962ac59075b964b07152d234b70', 82, 'MT_002', 1);
INSERT INTO `supply_user` VALUES (51, 'Dte_edu', 'Suppy', 'ຊາຍ', '0', 'dte_edu@mod', '202cb962ac59075b964b07152d234b70', 83, 'MT_003', 1);
INSERT INTO `supply_user` VALUES (52, 'Dte_con', 'Suppy', 'ຊາຍ', '0', 'dte_con@mod.com', '202cb962ac59075b964b07152d234b70', 84, 'MT_004', 1);
INSERT INTO `supply_user` VALUES (53, 'Dte_year', 'Suppy', 'ຊາຍ', '0', 'dte_year@mod.com', '202cb962ac59075b964b07152d234b70', 85, 'MT_005', 1);
INSERT INTO `supply_user` VALUES (54, 'IDVE', 'supply', 'ຊາຍ', '123', 'idve@mod.com', '202cb962ac59075b964b07152d234b70', 86, 'uni017', 1);
INSERT INTO `supply_user` VALUES (55, 'PTC', 'supply', 'ຊາຍ', '123', 'ptc@mod.com', '202cb962ac59075b964b07152d234b70', 87, 'uni101', 1);
INSERT INTO `supply_user` VALUES (56, 'Sport', 'supply', 'ຊາຍ', '123', 'sport@mod.com', '202cb962ac59075b964b07152d234b70', 89, 'uni102', 1);
INSERT INTO `supply_user` VALUES (57, 'RIOBA', 'supply', 'ຊາຍ', '123', 'rioba@mod.com', '202cb962ac59075b964b07152d234b70', 90, 'uni103', 1);

-- ----------------------------
-- Table structure for university
-- ----------------------------
DROP TABLE IF EXISTS `university`;
CREATE TABLE `university`  (
  `uni_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uni_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `dept_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `stt` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`uni_id`) USING BTREE,
  INDEX `dept_id`(`dept_id`) USING BTREE,
  CONSTRAINT `university_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of university
-- ----------------------------
INSERT INTO `university` VALUES ('HRD1', 'ສູນກາງ', 'HRD001', 1);
INSERT INTO `university` VALUES ('MT_001', 'ສ້າງຄູປະລິນຍາຕີ (ລະບົບຕໍ່ເນື່ອງ 12+4)', 'Dep_002', 1);
INSERT INTO `university` VALUES ('MT_002', 'ສ້າງຄູຊັ້ນສູງ (ລະບົບ 12+2)', 'Dep_002', 1);
INSERT INTO `university` VALUES ('MT_003', 'ຄະນະສຶກສາສາດ', 'Dep_002', 1);
INSERT INTO `university` VALUES ('MT_004', 'ພາກຕໍ່ເນື່ອງປົກກະຕິ', 'Dep_002', 1);
INSERT INTO `university` VALUES ('MT_005', 'ຕໍ່ເນື່ອງພາກພັກສິ້ນປີຮຽນ', 'Dep_002', 1);
INSERT INTO `university` VALUES ('uni001', 'ມະຫາວິທະຍາໄລແຫ່ງຊາດ', '001', 1);
INSERT INTO `university` VALUES ('uni002', 'ມະຫາວິທະຍາໄລຈຳປາສັກ', '001', 1);
INSERT INTO `university` VALUES ('uni003', 'ມະຫາວິທະຍາໄລ ສຸພານຸວົງ', '001', 1);
INSERT INTO `university` VALUES ('uni004', 'ມະຫາວິທະຍາໄລສະຫວັນນະເຂດ', '001', 1);
INSERT INTO `university` VALUES ('uni005', 'ວິທະຍາໄລຄູຫຼວງນ້ຳທາ', 'Dep_002', 1);
INSERT INTO `university` VALUES ('uni006', 'ວິທະຍາໄລຄູຫຼວງພະບາງ', 'Dep_002', 1);
INSERT INTO `university` VALUES ('uni007', 'ວິທະຍາໄລຄູຄັງໄຂ', 'Dep_002', 1);
INSERT INTO `university` VALUES ('uni008', 'ວິທະຍາໄລຄູບ້ານເກິນ', 'Dep_002', 1);
INSERT INTO `university` VALUES ('uni009', 'ວິທະຍາໄລຄູດົງຄຳຊ້າງ', 'Dep_002', 1);
INSERT INTO `university` VALUES ('uni010', 'ວິທະຍາໄລຄູສະຫວັນ', 'Dep_002', 1);
INSERT INTO `university` VALUES ('uni011', 'ວິທະຍາໄລຄູປາກເຊ', 'Dep_002', 1);
INSERT INTO `university` VALUES ('uni012', 'ວິທະຍາໄລຄູສາລະວັນ', 'Dep_002', 1);
INSERT INTO `university` VALUES ('uni013', 'ວິທະຍາໄລພະລະສຶກສາ', 'Dep_002', 1);
INSERT INTO `university` VALUES ('uni014', 'ວິທະຍາໄລ ສິລະປະສຶກສາ', 'Dep_002', 1);
INSERT INTO `university` VALUES ('uni015', 'ວິທະຍາໄລສົງອົງຕື້', 'Dep_002', 1);
INSERT INTO `university` VALUES ('uni016', 'ວິທະຍາໄລສົງຈຳປາສັກ', 'Dep_002', 1);
INSERT INTO `university` VALUES ('uni017', 'ສະຖາບັນພັດທະນາອາຊີວະສຶກສາ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni018', 'ວິທະຍາໄລເຕັກນິກຊັບພະວິຊາ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni019', 'ວິທະຍາໄລເຕັກນິກປາກປ່າສັກ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni020', 'ຮຮ. ຕນ. ລາວ-ເຢຍລະມັນ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni021', 'ຮຮ.ຕນ. ກະສິກຳດົງຄຳຊ້າງ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni022', 'ວິທະຍາໄລ ວິຊາຊີບ ມິດຕະພາບ ວຽງຈັນ-ຮ່າໂນ້ຍ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni023', 'ວິທະຍາໄລ ເຕັກນິກ ແຂວງວຽງຈັນ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni024', 'ວິທະຍາໄລ ເຕັກນິກ ວິຊາຊີບ ແຂວງຄຳມ່ວນ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni025', 'ວິທະຍາໄລ ເຕັກນິກ ວິຊາຊີບ ແຂວງຈຳປາສັກ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni026', 'ຮຮ.ຕນ.ວິຊາຊີບແບບປະສົມ ແຂວງຜົ່ງສາລີ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni027', 'ຮຮ.ຕນ.ວິຊາຊີບ ບປປສ ແຂວງຫຼວງນ້ຳທາ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni028', 'ຮຮ.ຕນ. ວິຊາຊີບ ບປສ ແຂວງອຸດົມໄຊ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni029', 'ຮຮ.ຕນ. ວິຊາຊີບ ແຂວງບໍ່ແກ້ວ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni030', 'ຮຮ. ຕນ ວິຊາຊີບ ແບບປະສົມແຂວງ ຊຽງຂວາງ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni031', 'ຮຮ. ຕນ ວິຊາຊີບ ແບບປະສົມ ແຂວງຫົວພັນ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni032', 'ຮຮ.ຕນ.ວິຊາຊີບ ບປສ ແຂວງໄຊຍະບູລີ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni033', 'ຮຮ.ຕນ.ວິຊາຊີບ ຫຼວງພະບາງ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni034', 'ຮຮ.ຕນ. ວິຊາຊີບ ບໍລິຄຳໄຊ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni035', 'ຮຮ. ຕນ.ວິຊາຊີບ ສະຫວັນນະເຂດ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni036', 'ຮຮ. ຕນ.ວິຊາຊີບ ແຂວງເຊກອງ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni037', 'ຮຮ. ຕນ.ວິຊາຊີບ ແຂວງສາລະວັນ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni038', 'ຮຮ. ຕນ.ວິຊາຊີບ ແຂວງອັດຕະປື', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni039', 'ສະຖາບັນໂຮງແຮມ ແລະ ການທ່ອງທ່ຽວແຫ່ງຊາດ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni040', 'ຮຮ. ຕນ.ວິຊາຊີບ ໄຊສົມບູນ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni041', 'ຮຮ. ຕນ.ວິຊາຊີບ ນ້ຳບາກ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni042', 'ມະຫາວິທະຍາໄລ ວິທະຍາສາດ ສຸຂະພາບ (ມວສ)', 'Dep_004', 1);
INSERT INTO `university` VALUES ('uni043', 'ວິທະຍາໄລ ວິທະຍາສາດ ສຸຂະພາບ ຫຼວງພະບາງ (ວສຫຼ)', 'Dep_004', 1);
INSERT INTO `university` VALUES ('uni044', 'ວິທະຍາໄລ ວິທະຍາສາດ ສຸຂະພາບ ສະຫວັນນະເຂດ (ວສສ)', 'Dep_004', 1);
INSERT INTO `university` VALUES ('uni045', 'ວິທະຍາໄລ ວິທະຍາສາດ ສຸຂະພາບ ຈຳປາສັກ (ວສຈ)', 'Dep_004', 1);
INSERT INTO `university` VALUES ('uni046', 'ໂຮງຮຽນສາທາລະນະສຸກຊຽງຂວາງ (ຮສຊຂ)', 'Dep_004', 1);
INSERT INTO `university` VALUES ('uni047', 'ໂຮງຮຽນສາທາລະນະສຸກ ອຸດົມໄຊ', 'Dep_004', 1);
INSERT INTO `university` VALUES ('uni048', 'ໂຮງຮຽນພະຍາບານເຕັກນິກແຂວງວຽງຈັນ (ຮພບຕ)', 'Dep_004', 1);
INSERT INTO `university` VALUES ('uni049', 'ໂຮງຮຽນສາທາລະນະສຸກຄຳມ່ວນ', 'Dep_004', 1);
INSERT INTO `university` VALUES ('uni050', 'ສູນຝຶກອົບຮົມ ຮສຂ ແຂວງສາລະວັນ', 'Dep_004', 1);
INSERT INTO `university` VALUES ('uni051', 'ສູນກໍ່ສ້າງ ແລະ ຝຶກອົບຮົມສາທາລະນະສຸກອັດຕະປື (ສວສອ)', 'Dep_004', 1);
INSERT INTO `university` VALUES ('uni052', 'ສະຖາບັນວິຈິດສິນແຫ່ງຊາດ', 'Dep_005', 1);
INSERT INTO `university` VALUES ('uni053', 'ໂຮງຮຽນ ສິລະປະແຫ່ງຊາດ', 'Dep_005', 1);
INSERT INTO `university` VALUES ('uni054', 'ວິທະຍາໄລ ວິຈິດສິນ ຫຼວງພະບາງ', 'Dep_005', 1);
INSERT INTO `university` VALUES ('uni055', 'ໂຮງຮຽນ ວິຈິດສິນ ສະຫວັນນະເຂດ', 'Dep_005', 1);
INSERT INTO `university` VALUES ('uni056', 'ໂຮງຮຽນ ວິຈິດສິນ ຈຳປາສັກ', 'Dep_005', 1);
INSERT INTO `university` VALUES ('uni057', 'ວິທະຍາໄລກະສິກຳ ແລະ ປ່າໄມ້ ພາກເໜືອ', 'Dep_006', 1);
INSERT INTO `university` VALUES ('uni058', 'ວິທະຍາໄລກະສິກຳ ແລະ ປ່າໄມ້ ບໍລິຄຳໄຊ', 'Dep_006', 1);
INSERT INTO `university` VALUES ('uni059', 'ວິທະຍາໄລກະສິກຳ ແລະ ປ່າໄມ້ ສະຫວັນນະເຂດ', 'Dep_006', 1);
INSERT INTO `university` VALUES ('uni060', 'ວິທະຍາໄລກະສິກຳ ແລະ ປ່າໄມ້ ຈຳປາສັກ', 'Dep_006', 1);
INSERT INTO `university` VALUES ('uni061', 'ໂຮງຮຽນຊົນລະປະທານຊັ້ນສູງທ່າງ່ອນ', 'Dep_006', 1);
INSERT INTO `university` VALUES ('uni062', 'ວິທະຍາໄລການເງິນ ພາກເໜືອ (ຫຼວງພະບາງ)', 'Dep_007', 1);
INSERT INTO `university` VALUES ('uni063', 'ສະຖາບັນເສດຖະກິດການເງິນ (ດົງຄຳຊ້າງ)', 'Dep_007', 1);
INSERT INTO `university` VALUES ('uni064', 'ວິທະຍາໄລການເງິນ ພາກໃຕ້ (ຈຳປາສັກ)', 'Dep_007', 1);
INSERT INTO `university` VALUES ('uni065', 'ສະຖາບັນການທະນາຄານ', 'Dep_008', 1);
INSERT INTO `university` VALUES ('uni066', 'ວິທະຍາໄລກົດໝາຍ ພາກເໜືອ ຫຼວງພະບາງ', 'Dep_009', 1);
INSERT INTO `university` VALUES ('uni067', 'ວິທະຍາໄລກົດໝາຍ ພາກໃຕ້ ແຂວງຈຳປາສັກ', 'Dep_009', 1);
INSERT INTO `university` VALUES ('uni068', 'ວິທະຍາໄລກົດໝາຍ ພາກກາງ ສະຫວັນນະເຂດ', 'Dep_009', 1);
INSERT INTO `university` VALUES ('uni069', 'ວິທະຍາໄລກົດໝາຍ ພາກກາງ ນະຄອນຫຼວງວຽງຈັນ', 'Dep_009', 1);
INSERT INTO `university` VALUES ('uni070', 'ສະຖາບັນ ໄປສະນີ ໂທລະຄົມ ແລະ ການສື່ສານ', 'Dep_010', 1);
INSERT INTO `university` VALUES ('uni072', 'ມະຫາວິທະຍາໄລສະຫວັນນະເຂດ (ປະລີຍາຕີຕໍ່ເນື່ອງ 30%)', '001', 1);
INSERT INTO `university` VALUES ('uni073', 'ມະຫາວິທະຍາໄລຈຳປາສັກ (ປະລີຍາຕີຕໍ່ເນື່ອງ 30%)', '001', 1);
INSERT INTO `university` VALUES ('uni074', 'ມະຫາວິທະຍາໄລ ສຸພານຸວົງ (ປະລີຍາຕີຕໍ່ເນື່ອງ 30%)', '001', 1);
INSERT INTO `university` VALUES ('uni075', 'ມະຫາວິທະຍາໄລແຫ່ງຊາດ (ປະລີຍາຕີຕໍ່ເນື່ອງ 30%)', '001', 1);
INSERT INTO `university` VALUES ('uni076', 'ມະຫາວິທະຍາໄລແຫ່ງຊາດ (ອະນຸປະລິນຍາ)', '001', 1);
INSERT INTO `university` VALUES ('uni077', 'ມະຫາວິທະຍາໄລຈຳປາສັກ (ອານຸປະລິນຍາ)', '001', 1);
INSERT INTO `university` VALUES ('uni100', 'ນັກຮຽນວິຊາຊີບຊັ້ນຕົ້ນ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni101', 'ວິທະຍາໄລ ເຕັກນິກ ສັບພະວິຊາ', 'Dep_003', 1);
INSERT INTO `university` VALUES ('uni102', 'ສະຖາບັນກິລາ-ກາຍຍະກຳ', 'Dep_11', 1);
INSERT INTO `university` VALUES ('uni103', '​ສະ​ຖາ​ບັນ​ຣັ​ຕ​ນະ ບໍ​ລິ​ຫານ​ທຸ​ລະ​ກິດ', 'Dep_12', 1);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `stt_id` int NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  INDEX `stt_id`(`stt_id`) USING BTREE,
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`stt_id`) REFERENCES `user_status` (`stt_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 91 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (2, 1);
INSERT INTO `user` VALUES (23, 1);
INSERT INTO `user` VALUES (24, 1);
INSERT INTO `user` VALUES (6, 2);
INSERT INTO `user` VALUES (10, 2);
INSERT INTO `user` VALUES (11, 2);
INSERT INTO `user` VALUES (27, 2);
INSERT INTO `user` VALUES (28, 2);
INSERT INTO `user` VALUES (29, 2);
INSERT INTO `user` VALUES (30, 2);
INSERT INTO `user` VALUES (31, 2);
INSERT INTO `user` VALUES (32, 2);
INSERT INTO `user` VALUES (33, 2);
INSERT INTO `user` VALUES (34, 2);
INSERT INTO `user` VALUES (35, 2);
INSERT INTO `user` VALUES (36, 2);
INSERT INTO `user` VALUES (37, 2);
INSERT INTO `user` VALUES (38, 2);
INSERT INTO `user` VALUES (39, 2);
INSERT INTO `user` VALUES (40, 2);
INSERT INTO `user` VALUES (41, 2);
INSERT INTO `user` VALUES (42, 2);
INSERT INTO `user` VALUES (43, 2);
INSERT INTO `user` VALUES (44, 2);
INSERT INTO `user` VALUES (1, 3);
INSERT INTO `user` VALUES (12, 3);
INSERT INTO `user` VALUES (13, 3);
INSERT INTO `user` VALUES (26, 3);
INSERT INTO `user` VALUES (45, 3);
INSERT INTO `user` VALUES (46, 3);
INSERT INTO `user` VALUES (47, 3);
INSERT INTO `user` VALUES (48, 3);
INSERT INTO `user` VALUES (49, 3);
INSERT INTO `user` VALUES (50, 3);
INSERT INTO `user` VALUES (51, 3);
INSERT INTO `user` VALUES (52, 3);
INSERT INTO `user` VALUES (53, 3);
INSERT INTO `user` VALUES (54, 3);
INSERT INTO `user` VALUES (55, 3);
INSERT INTO `user` VALUES (56, 3);
INSERT INTO `user` VALUES (57, 3);
INSERT INTO `user` VALUES (58, 3);
INSERT INTO `user` VALUES (59, 3);
INSERT INTO `user` VALUES (60, 3);
INSERT INTO `user` VALUES (61, 3);
INSERT INTO `user` VALUES (62, 3);
INSERT INTO `user` VALUES (63, 3);
INSERT INTO `user` VALUES (64, 3);
INSERT INTO `user` VALUES (65, 3);
INSERT INTO `user` VALUES (66, 3);
INSERT INTO `user` VALUES (67, 3);
INSERT INTO `user` VALUES (68, 3);
INSERT INTO `user` VALUES (69, 3);
INSERT INTO `user` VALUES (70, 3);
INSERT INTO `user` VALUES (71, 3);
INSERT INTO `user` VALUES (72, 3);
INSERT INTO `user` VALUES (73, 3);
INSERT INTO `user` VALUES (75, 3);
INSERT INTO `user` VALUES (76, 3);
INSERT INTO `user` VALUES (77, 3);
INSERT INTO `user` VALUES (78, 3);
INSERT INTO `user` VALUES (79, 3);
INSERT INTO `user` VALUES (80, 3);
INSERT INTO `user` VALUES (81, 3);
INSERT INTO `user` VALUES (82, 3);
INSERT INTO `user` VALUES (83, 3);
INSERT INTO `user` VALUES (84, 3);
INSERT INTO `user` VALUES (85, 3);
INSERT INTO `user` VALUES (86, 3);
INSERT INTO `user` VALUES (87, 3);
INSERT INTO `user` VALUES (89, 3);
INSERT INTO `user` VALUES (90, 3);
INSERT INTO `user` VALUES (7, 4);
INSERT INTO `user` VALUES (74, 5);
INSERT INTO `user` VALUES (88, 5);

-- ----------------------------
-- Table structure for user_status
-- ----------------------------
DROP TABLE IF EXISTS `user_status`;
CREATE TABLE `user_status`  (
  `stt_id` int NOT NULL,
  `stt_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`stt_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_status
-- ----------------------------
INSERT INTO `user_status` VALUES (1, 'HRD');
INSERT INTO `user_status` VALUES (2, 'Demand');
INSERT INTO `user_status` VALUES (3, 'Supply');
INSERT INTO `user_status` VALUES (4, 'Admin');
INSERT INTO `user_status` VALUES (5, 'Department');

-- ----------------------------
-- Procedure structure for adjust_detail
-- ----------------------------
DROP PROCEDURE IF EXISTS `adjust_detail`;
delimiter ;;
CREATE PROCEDURE `adjust_detail`(IN `items` LONGTEXT)
BEGIN
	START TRANSACTION;
	SET @i = (SELECT Json_Length(items));
	WHILE @i > 0 DO
     SET @i = @i - 1;
		UPDATE adjustdetail SET univer=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.univer') as `univer`),
		univer_valunteer=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.univer_val') as `univer_val`),
		prov=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.prov') as `prov`),
		intv=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.intv') as `intv`),
		ad_test=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.ad_test') as `ad_test`),
		std_public=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.std_pub') as `std_pub`),
		emp=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.emp') as `emp`),
		std_handi=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.std_handi') as `std_handi`),
		std_lan=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.std_lan') as `std_lan`),
		ssk=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.ssk') as `ssk`),
		std=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.std') as `std`),
		emp_gov=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.emp_gov') as `emp_gov`),
		test=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.test') as `test`),
		std_con=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.std_con') as `std_con`),
		std_2lan=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.std_2lan') as `std_2lan`),
		std_inter=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.std_inter') as `std_inter`),
		emp_private=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.emp_private') as `emp_private`),
		remark_hrd=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.remark_hrd') as `remark_hrd`)
		WHERE d_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.d_id') as `d_id`);
    END WHILE;
	COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for clear_data;
-- ----------------------------
DROP PROCEDURE IF EXISTS `clear_data;`;
delimiter ;;
CREATE PROCEDURE `clear_data;`()
BEGIN
	START TRANSACTION;
		DELETE FROM quota_distribute;
		DELETE FROM adjustdetail;
		DELETE FROM create_plan;
		DELETE FROM adjust;
		DELETE FROM document_upload;
		DELETE FROM document_type;
		DELETE FROM fy;
 		DELETE FROM course;
 		DELETE FROM course_level;
 		DELETE FROM faculty;
		
-- 		DELETE FROM department;
-- 		DELETE FROM hrd_user WHERE uni_id!='HRD1';
-- 		DELETE FROM demand_user;
-- 		DELETE FROM supply_user;
-- 		DELETE FROM university WHERE uni_id!='HRD1';
-- 		DELETE FROM province_ministry;
	COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_course
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_course`;
delimiter ;;
CREATE PROCEDURE `delete_course`(IN `course_ids` VARCHAR(50))
BEGIN
UPDATE course set stt=2 WHERE course_id=course_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_department
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_department`;
delimiter ;;
CREATE PROCEDURE `delete_department`(IN `dept_ids` VARCHAR(20))
BEGIN
UPDATE department set stt=2 WHERE dept_id=dept_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_documentType
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_documentType`;
delimiter ;;
CREATE PROCEDURE `delete_documentType`(IN `doc_ids` INT(11))
BEGIN
DELETE FROM document_type WHERE doc_id=doc_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_documentUpload
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_documentUpload`;
delimiter ;;
CREATE PROCEDURE `delete_documentUpload`(IN `up_ids` INT(11))
BEGIN
DELETE FROM document_upload WHERE up_id=up_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_faculty
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_faculty`;
delimiter ;;
CREATE PROCEDURE `delete_faculty`(IN `fac_ids` VARCHAR(30))
BEGIN
Update faculty set stt=2 WHERE fac_id=fac_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_hrd
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_hrd`;
delimiter ;;
CREATE PROCEDURE `delete_hrd`(IN `user_ids` INT(11))
BEGIN
UPDATE hrd_user SET stt=2 WHERE user_id=user_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_level
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_level`;
delimiter ;;
CREATE PROCEDURE `delete_level`(IN `level_ids` INT(11))
BEGIN
	DELETE FROM course_level WHERE level_id=level_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_newadjust
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_newadjust`;
delimiter ;;
CREATE PROCEDURE `delete_newadjust`(IN `adj_ids` TEXT)
BEGIN
	IF EXISTS(SELECT * FROM adjustdetail WHERE adj_id=adj_ids) THEN
		SELECT "adjustdetail-has" AS msg;
	ELSEIF EXISTS(SELECT * FROM create_plan WHERE adj_id=adj_ids) THEN
		SELECT "create-has" AS msg;
	ELSE
			DELETE FROM adjust WHERE adj_id=adj_ids;
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_province
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_province`;
delimiter ;;
CREATE PROCEDURE `delete_province`(IN `p_m_ids` INT(11))
BEGIN
	START TRANSACTION;
		UPDATE province_ministry set stt=2 WHERE p_m_id=p_m_ids;
	COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_university
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_university`;
delimiter ;;
CREATE PROCEDURE `delete_university`(IN `uni_ids` VARCHAR(20))
BEGIN
UPDATE university SET stt=2 WHERE uni_id=uni_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_user
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_user`;
delimiter ;;
CREATE PROCEDURE `delete_user`(IN `user_ids` INT(11))
BEGIN
DELETE FROM user WHERE user_id=user_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_userDemand
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_userDemand`;
delimiter ;;
CREATE PROCEDURE `delete_userDemand`(IN `user_ids` INT(11))
BEGIN
UPDATE demand_user SET stt=2 WHERE user_id=user_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_userDepartment
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_userDepartment`;
delimiter ;;
CREATE PROCEDURE `delete_userDepartment`(IN `usr_dept_ids` INT(11))
BEGIN
UPDATE department_user SET stt=2 WHERE usr_dept_id=usr_dept_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_userSupply
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_userSupply`;
delimiter ;;
CREATE PROCEDURE `delete_userSupply`(IN `user_ids` INT(11))
BEGIN
UPDATE supply_user set stt=2 WHERE user_id=user_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for dept_approve
-- ----------------------------
DROP PROCEDURE IF EXISTS `dept_approve`;
delimiter ;;
CREATE PROCEDURE `dept_approve`(IN `items` TEXT,IN `adj_ids` TEXT)
BEGIN
DECLARE get_plans INT DEFAULT 0;
START TRANSACTION;
SET @i = (SELECT Json_Length(items));
	WHILE @i > 0 DO
     SET @i = @i - 1;
		 SET get_plans = (SELECT get_plan FROM adjustdetail WHERE d_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.d_id') as `d_id`));
			 IF(get_plans = (SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.get_plan') as `get_plan`)) THEN
					SELECT "" AS msg;
			 ELSE
					UPDATE adjustdetail SET get_plan=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.get_plan') as `get_plan`),user_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.user_id') as `user_id`) WHERE d_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.d_id') as `d_id`);	
			END IF;
		END WHILE;
		UPDATE adjust SET accept='1' WHERE adj_id=adj_ids;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_course
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_course`;
delimiter ;;
CREATE PROCEDURE `insert_course`(IN `course_ids` VARCHAR(50), IN `course_names` VARCHAR(50), IN `fac_ids` VARCHAR(30), IN `level_ids` INT(11))
BEGIN
INSERT INTO course SET course_id=course_ids,course_name=course_names,fac_id=fac_ids,level_id=level_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_createPlan
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_createPlan`;
delimiter ;;
CREATE PROCEDURE `insert_createPlan`(IN `items` TEXT)
BEGIN
START TRANSACTION;
SET @i = (SELECT Json_Length(items));
	WHILE @i > 0 DO
     SET @i = @i - 1;
		 IF(EXISTS(SELECT * FROM create_plan WHERE adj_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.adj_id') as `adj_id`) AND course_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.course_id') as `course_id`) AND user_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.user_id') as `user_id`))) THEN
		 SELECT "" as msg;
		 ELSE
		INSERT INTO create_plan SET adj_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.adj_id') as `adj_id`),course_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.course_id') as `course_id`),p_m_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.p_m_id') as `p_m_id`),std_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.std_qty') as `std_qty`),emp_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.emp_qty') as `emp_qty`),user_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.user_id') as `user_id`);
		END IF;
    END WHILE;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_department
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_department`;
delimiter ;;
CREATE PROCEDURE `insert_department`(IN `dept_ids` VARCHAR(20), IN `dept_names` VARCHAR(50))
BEGIN
INSERT INTO department SET dept_id=dept_ids, dept_name=dept_names;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_documentType
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_documentType`;
delimiter ;;
CREATE PROCEDURE `insert_documentType`(IN `doc_names` VARCHAR(50))
BEGIN
INSERT INTO document_type SET doc_name=doc_names;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_documentUpload
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_documentUpload`;
delimiter ;;
CREATE PROCEDURE `insert_documentUpload`(IN `doc_ids` INT(11), IN `fy_ids` VARCHAR(10), IN `descriptions` TEXT, IN `covers` VARCHAR(100), IN `up_dates` DATE, IN `file_uploads` TEXT)
BEGIN
INSERT INTO document_upload SET doc_id=doc_ids,fy_id=fy_ids,description=descriptions,cover=covers,up_date=up_dates,file_upload=file_uploads;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_faculty
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_faculty`;
delimiter ;;
CREATE PROCEDURE `insert_faculty`(IN `fac_ids` VARCHAR(30), IN `fac_names` VARCHAR(50), IN `uni_ids` VARCHAR(20))
BEGIN
INSERT INTO faculty SET fac_id=fac_ids,fac_name=fac_names,uni_id=uni_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_fy
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_fy`;
delimiter ;;
CREATE PROCEDURE `insert_fy`(IN `file_paths` VARCHAR(100), IN `years` YEAR(4), IN `statuss` TINYINT(1), IN `fy_ids` VARCHAR(10), IN `qty_s` INT(11), IN `qty_c` INT(11), IN `qty_i` INT(11), IN `qty_q` INT(11))
BEGIN
DECLARE json TEXT DEFAULT '';
START TRANSACTION;
INSERT INTO fy SET fy_id=fy_ids,`year`=years,file_path=file_paths,status=statuss,qty_student=qty_s,qty_con=qty_c,qty_student_inside=qty_i,qty_collegue_con=qty_q;
SET json = (SELECT JSON_ARRAYAGG(JSON_OBJECT('dept_id', dept_id)) from department);
SET @i = (SELECT Json_Length(json));
    WHILE @i > 0 DO
        SET @i = @i - 1;
					INSERT INTO adjust SET fy_id=fy_ids,dept_id=(SELECT JSON_VALUE(JSON_QUERY(json,CONCAT('$[',@i,']')), '$.dept_id') as `dept_id`);
    END WHILE;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_getplan
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_getplan`;
delimiter ;;
CREATE PROCEDURE `insert_getplan`(IN `items` TEXT)
BEGIN
START TRANSACTION;
SET @i = (SELECT Json_Length(items));
	WHILE @i > 0 DO
     SET @i = @i - 1;
		 IF EXISTS(SELECT * FROM adjustdetail WHERE adj_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.adj_id') as `adj_id`) AND course_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.course_id') as `course_id`)) THEN
			SELECT "" AS msg;
		 ELSE
				INSERT INTO adjustdetail SET adj_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.adj_id') as `adj_id`),course_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.course_id') as `course_id`),get_plan=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.get_plan') as `get_plan`),user_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.user_id') as `user_id`);
    END IF;
		END WHILE;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_hrd
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_hrd`;
delimiter ;;
CREATE PROCEDURE `insert_hrd`(IN `hrd_names` VARCHAR(50), IN `surnames` VARCHAR(50), IN `genders` VARCHAR(10), IN `tels` VARCHAR(30), IN `emails` VARCHAR(100), IN `passs` VARCHAR(100), IN `user_ids` INT(11), IN `uni_ids` VARCHAR(20))
BEGIN
INSERT INTO hrd_user SET
hrd_name=hrd_names,surname=surnames,gender=genders,tel=tels,email=emails,pass=passs,user_id=user_ids,uni_id=uni_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_level
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_level`;
delimiter ;;
CREATE PROCEDURE `insert_level`(IN `level_ids` INT(11),IN `level_names` VARCHAR(50))
BEGIN
	START TRANSACTION;
		IF EXISTS(SELECT * FROM course_level WHERE level_id=level_ids) THEN
			SELECT "same-id" as msg;
		ELSEIF EXISTS(SELECT * FROM course_level WHERE level_name=level_names) THEN
			SELECT "same-name" as msg;
		ELSE
			INSERT INTO course_level SET level_id=level_ids,level_name=level_names;
			SELECT "success" as msg;
		END IF;
	COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_newadjust
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_newadjust`;
delimiter ;;
CREATE PROCEDURE `insert_newadjust`(IN `fy_ids` TEXT, IN `dept_ids` TEXT)
BEGIN
	IF EXISTS(SELECT * FROM adjust WHERE fy_id=fy_ids AND dept_id=dept_ids) THEN
	SELECT "dept-same" AS msg;
	ELSE
			INSERT INTO adjust SET fy_id=fy_ids,dept_id=dept_ids;
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_province
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_province`;
delimiter ;;
CREATE PROCEDURE `insert_province`(IN `p_m_names` VARCHAR(50),IN `p_stts` INT(11))
BEGIN
	START TRANSACTION;
		IF EXISTS(SELECT * FROM province_ministry WHERE p_m_name=p_m_names) THEN
			SELECT "same" as msg;
		ELSE
			INSERT INTO province_ministry SET p_m_name=p_m_names,p_stt=p_stts;
			SELECT "success" as msg;
		END IF;
	COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_quota_distribute
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_quota_distribute`;
delimiter ;;
CREATE PROCEDURE `insert_quota_distribute`(IN `items` TEXT)
BEGIN
	START TRANSACTION;
SET @i = (SELECT Json_Length(items));
	WHILE @i > 0 DO
     SET @i = @i - 1;
		 IF EXISTS(SELECT * FROM quota_distribute WHERE d_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.d_id') as `d_id`) AND p_m_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.p_m_id') as `p_m_id`)) THEN
			SELECT "" AS msg;
		 ELSE
				INSERT INTO quota_distribute SET d_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.d_id') as `d_id`),p_m_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.p_m_id') as `p_m_id`),std_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.std_qty') as `std_qty`),emp_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.emp_qty') as `emp_qty`),user_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.user_id') as `user_id`);
    END IF;
		END WHILE;
COMMIT;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_statistic
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_statistic`;
delimiter ;;
CREATE PROCEDURE `insert_statistic`(IN `st_names` VARCHAR(100),IN `st_groups` INT(11),IN `level_ids` INT(11))
BEGIN
	START TRANSACTION;
		IF EXISTS(SELECT * FROM statatic WHERE st_name=st_names AND st_group=st_groups) THEN
		SELECT "same" as msg;
		ELSE
			INSERT INTO statatic SET st_name=st_names, st_group=st_groups,level_id=level_ids;
			SELECT "success" as msg;
		END IF;
	COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_statistic_detail
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_statistic_detail`;
delimiter ;;
CREATE PROCEDURE `insert_statistic_detail`(IN `adj_ids` INT(11),IN `st_ids` INT(11),IN `univers` INT(11),IN `univer_vals` INT(11),IN `provs` INT(11),IN `intvs` INT(11),IN `ad_tests` INT(11),IN `std_publics` INT(11),IN `emps` INT(11),IN `std_handis` INT(11),IN `std_lans` INT(11),IN `ssks` INT(11),IN `stds` INT(11),IN `emp_govs` INT(11),IN `tests` INT(11),IN `std_cons` INT(11),IN `std_2lans` INT(11),IN `std_inters` INT(11),IN `emp_privates` INT(11),IN `user_ids` INT(11))
BEGIN
	START TRANSACTION;
		INSERT INTO statistic_detail SET adj_id=adj_ids,st_id=st_ids,univer=univers,univer_valunteer=univer_vals,prov=provs,intv=intvs,ad_test=ad_tests,std_public=std_publics,emp=emps,
		std_handi=std_handis,std_lan=std_lans,ssk=ssks,std=stds,emp_gov=emp_govs,test=tests,std_con=std_cons,std_2lan=std_2lans,std_inter=std_inters,emp_private=emp_privates,user_id=user_ids;
	COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_statistic_distribute
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_statistic_distribute`;
delimiter ;;
CREATE PROCEDURE `insert_statistic_distribute`(IN `items` LONGTEXT)
BEGIN
	START TRANSACTION;
		SET @i = (SELECT Json_Length(items));
	WHILE @i > 0 DO
     SET @i = @i - 1;
				INSERT INTO statistic_distribute SET as_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.as_id') as `as_id`),p_m_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.p_m_id') as `p_m_id`),std_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.std_qty') as `std_qty`),emp_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.emp_qty') as `emp_qty`),user_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.user_id') as `user_id`);
		END WHILE;
	COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_statistic_group
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_statistic_group`;
delimiter ;;
CREATE PROCEDURE `insert_statistic_group`(IN `group_names` VARCHAR(100),IN `dept_ids` VARCHAR(20))
BEGIN
	START TRANSACTION;
		IF EXISTS(SELECT * FROM statatic_group WHERE group_name=group_names AND dept_id=dept_ids) THEN
		SELECT "same" as msg;
		ELSE
			INSERT INTO statatic_group SET group_name=group_names, dept_id=dept_ids;
			SELECT "success" as msg;
		END IF;
	COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_university
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_university`;
delimiter ;;
CREATE PROCEDURE `insert_university`(IN `uni_ids` VARCHAR(20), IN `uni_names` VARCHAR(50), IN `dept_ids` VARCHAR(20))
BEGIN
INSERT INTO university SET uni_id=uni_ids,uni_name=uni_names,dept_id=dept_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_user
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_user`;
delimiter ;;
CREATE PROCEDURE `insert_user`(IN `stt_ids` INT(11))
BEGIN
INSERT INTO user SET stt_id=stt_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_userDemand
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_userDemand`;
delimiter ;;
CREATE PROCEDURE `insert_userDemand`(IN `demand_names` VARCHAR(50), IN `surnames` VARCHAR(50), IN `genders` VARCHAR(10), IN `tels` VARCHAR(30), IN `emails` VARCHAR(100), IN `passs` VARCHAR(100), IN `user_ids` INT(11), IN `p_m_ids` INT(11))
BEGIN
INSERT INTO demand_user SET demand_name=demand_names,surname=surnames,gender=genders,tel=tels,email=emails,pass=passs,user_id=user_ids,p_m_id=p_m_ids; 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_userDepartment
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_userDepartment`;
delimiter ;;
CREATE PROCEDURE `insert_userDepartment`(IN `usr_names` VARCHAR(50), IN `surnames` VARCHAR(50), IN `genders` VARCHAR(10), IN `tels` VARCHAR(30), IN `emails` VARCHAR(100), IN `passs` VARCHAR(100), IN `user_ids` INT(11), IN `dept_ids` VARCHAR(20))
BEGIN
INSERT INTO department_user SET usr_name=usr_names,surname=surnames,gender=genders,tel=tels,email=emails,pass=passs,user_id=user_ids,dept_id=dept_ids; 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_userSupply
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_userSupply`;
delimiter ;;
CREATE PROCEDURE `insert_userSupply`(IN `sup_names` VARCHAR(50), IN `surnames` VARCHAR(50), IN `genders` VARCHAR(10), IN `tels` VARCHAR(30), IN `emails` VARCHAR(100), IN `passs` VARCHAR(100), IN `user_ids` INT(11), IN `uni_ids` VARCHAR(20))
BEGIN
INSERT INTO supply_user SET sup_name=sup_names,surname=surnames,gender=genders,tel=tels,email=emails,pass=passs,user_id=user_ids,uni_id=uni_ids; 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for login_department
-- ----------------------------
DROP PROCEDURE IF EXISTS `login_department`;
delimiter ;;
CREATE PROCEDURE `login_department`(IN `emails` VARCHAR(100), IN `passed` VARCHAR(100))
BEGIN
SELECT usr_dept_id,usr_name,surname,gender,tel,email,pass,su.user_id,su.dept_id,u.stt_id,us.stt_name,uni.dept_name FROM department_user su LEFT JOIN user u ON su.user_id=u.user_id LEFT JOIN user_status us ON u.stt_id=us.stt_id LEFT JOIN department uni ON su.dept_id=uni.dept_id WHERE su.email=emails AND su.pass=passed AND su.stt=1 ORDER BY usr_name ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for loop_insert_file
-- ----------------------------
DROP PROCEDURE IF EXISTS `loop_insert_file`;
delimiter ;;
CREATE PROCEDURE `loop_insert_file`()
BEGIN
	SET @i = 100;
	WHILE @i > 0 DO
        SET @i = @i - 1;
					INSERT INTO document_upload SET doc_id='11',fy_id='2021-2022',description=CONCAT('Description: ',@i),cover='Cover_6163a84b4d584.jpg';
   END WHILE;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_adjust
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_adjust`;
delimiter ;;
CREATE PROCEDURE `select_adjust`()
BEGIN
	SELECT adj_id,fy_id,a.dept_id,dept_name,accept FROM adjust a LEFT JOIN department d ON a.dept_id=d.dept_id ORDER BY accept DESC, fy_id ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_course
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_course`;
delimiter ;;
CREATE PROCEDURE `select_course`(IN `uni_ids` VARCHAR(20))
BEGIN
SELECT course_id,course_name,c.fac_id,fac_name,uni_name,c.level_id,level_name FROM course c
LEFT JOIN faculty f ON c.fac_id=f.fac_id
LEFT JOIN university u ON f.uni_id=u.uni_id
LEFT JOIN course_level cl ON c.level_id=cl.level_id
WHERE f.uni_id=uni_ids AND c.stt=1 ORDER BY course_name ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_createPlan
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_createPlan`;
delimiter ;;
CREATE PROCEDURE `select_createPlan`(IN `dept_names` VARCHAR(50))
BEGIN
SELECT cre_id,cp.adj_id,cp.course_id,p_m_id,std_qty,emp_qty,cp.user_id,course_name,c.fac_id,fac_name,f.uni_id,uni_name,u.dept_id,dept_name FROM create_plan cp LEFT JOIN course c on cp.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u on f.uni_id=u.uni_id LEFT JOIN department d ON u.dept_id=d.dept_id WHERE dept_name=dept_names ORDER BY uni_name ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_department
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_department`;
delimiter ;;
CREATE PROCEDURE `select_department`()
BEGIN
SELECT dept_id,dept_name FROM department WHERE stt=1 ORDER BY dept_name ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_documentType
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_documentType`;
delimiter ;;
CREATE PROCEDURE `select_documentType`()
BEGIN
SELECT doc_id,doc_name FROM document_type ORDER BY doc_name ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_document_Upload
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_document_Upload`;
delimiter ;;
CREATE PROCEDURE `select_document_Upload`()
BEGIN
SELECT up_id,du.doc_id,doc_name,du.fy_id,description,cover,up_date,file_path,status,doc_name,file_upload FROM document_upload du LEFT JOIN fy f ON du.fy_id=f.fy_id LEFT JOIN document_type dt on du.doc_id=dt.doc_id ORDER BY doc_name ASC; 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_faculty
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_faculty`;
delimiter ;;
CREATE PROCEDURE `select_faculty`(IN `uni_ids` VARCHAR(20))
BEGIN
SELECT fac_id,fac_name,f.uni_id,uni_name,dept_name FROM faculty f LEFT JOIN university u ON f.uni_id=u.uni_id LEFT JOIN department d ON u.dept_id=d.dept_id WHERE f.uni_id=uni_ids AND f.stt=1 ORDER BY fac_name ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_fy
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_fy`;
delimiter ;;
CREATE PROCEDURE `select_fy`()
BEGIN
SELECT * FROM fy ORDER BY fy_id ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_hrd
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_hrd`;
delimiter ;;
CREATE PROCEDURE `select_hrd`(IN `emails` VARCHAR(100), IN `passed` VARCHAR(100))
BEGIN
SELECT hrd_id,hrd_name,email,pass,hu.user_id,uni_id,u.stt_id FROM hrd_user hu 
LEFT JOIN `user` u ON hu.user_id=u.user_id
WHERE email=emails AND BINARY pass=passed AND stt=1 ORDER BY hrd_name ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_level
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_level`;
delimiter ;;
CREATE PROCEDURE `select_level`()
BEGIN
		SELECT * FROM course_level;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_package_user
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_package_user`;
delimiter ;;
CREATE PROCEDURE `select_package_user`()
  NO SQL 
Begin
SELECT u.user_id,u.stt_id,stt_name FROM `user` u 
left join user_status us on u.stt_id=us.stt_id
WHERE u.user_id NOT IN (SELECT h.user_id FROM hrd_user h) and u.user_id NOT IN (SELECT s.user_id FROM supply_user s) and u.user_id NOT IN (SELECT d.user_id FROM demand_user d) and u.user_id NOT IN (SELECT d.user_id FROM department_user d) order by u.user_id ASC;
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_province
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_province`;
delimiter ;;
CREATE PROCEDURE `select_province`()
BEGIN
	SELECT * FROM province_ministry where stt=1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_statistic
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_statistic`;
delimiter ;;
CREATE PROCEDURE `select_statistic`()
BEGIN
	SELECT st_id,st_name,st_group,group_name,dept_name,s.level_id,level_name FROM statatic s 
	LEFT JOIN statatic_group sg ON s.st_group=sg.group_id 
	LEFT JOIN department d ON sg.dept_id=d.dept_id
	LEFT JOIN course_level cl ON s.level_id=cl.level_id
	WHERE s.stt=1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_statistic_group
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_statistic_group`;
delimiter ;;
CREATE PROCEDURE `select_statistic_group`()
BEGIN
	SELECT group_id,group_name,s.dept_id,dept_name FROM statatic_group s LEFT JOIN department d ON s.dept_id=d.dept_id where s.stt=1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_university
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_university`;
delimiter ;;
CREATE PROCEDURE `select_university`()
BEGIN
SELECT uni_id,uni_name,u.dept_id,dept_name FROM university u LEFT JOIN department d ON u.dept_id=d.dept_id WHERE u.stt=1 ORDER BY uni_name ASC; 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_uni_adjust
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_uni_adjust`;
delimiter ;;
CREATE PROCEDURE `select_uni_adjust`(IN `adj_ids` INT(11), IN `dept_ids` VARCHAR(20), IN `uni_ids` TEXT)
BEGIN
	SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
  LEFT JOIN course c ON ad.course_id=c.course_id
  LEFT JOIN faculty f ON c.fac_id=f.fac_id
  LEFT JOIN university u ON f.uni_id=u.uni_id
  LEFT JOIN department d ON u.dept_id=d.dept_id
  LEFT JOIN adjust a ON ad.adj_id=a.adj_id
  WHERE ad.adj_id=adj_ids AND d.dept_id=dept_ids AND u.uni_id NOT IN (uni_ids) GROUP BY u.uni_id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_user
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_user`;
delimiter ;;
CREATE PROCEDURE `select_user`()
BEGIN
SELECT user_id,u.stt_id,stt_name FROM user u LEFT JOIN user_status us ON u.stt_id=us.stt_id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_userDemand
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_userDemand`;
delimiter ;;
CREATE PROCEDURE `select_userDemand`(IN `emails` VARCHAR(100), IN `passed` VARCHAR(100))
BEGIN
SELECT demand_id,demand_name,surname,gender,tel,email,pass,du.user_id,du.p_m_id,p_m_name,u.stt_id,us.stt_name FROM demand_user du LEFT JOIN province_ministry pm ON du.p_m_id=pm.p_m_id LEFT JOIN user u ON  du.user_id=u.user_id LEFT JOIN user_status us ON u.stt_id=us.stt_id WHERE email=emails AND BINARY pass=passed AND stt=1 ORDER BY demand_name ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_userDepartment
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_userDepartment`;
delimiter ;;
CREATE PROCEDURE `select_userDepartment`()
BEGIN
SELECT usr_dept_id,usr_name,surname,gender,tel,email,pass,su.user_id,su.dept_id,u.stt_id,us.stt_name,uni.dept_name FROM department_user su LEFT JOIN user u ON su.user_id=u.user_id LEFT JOIN user_status us ON u.stt_id=us.stt_id LEFT JOIN department uni ON su.dept_id=uni.dept_id WHERE su.stt=1 ORDER BY usr_name ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for select_userSupply
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_userSupply`;
delimiter ;;
CREATE PROCEDURE `select_userSupply`(IN `emails` VARCHAR(100), IN `passed` VARCHAR(100))
BEGIN
SELECT sup_id,sup_name,surname,gender,tel,email,pass,su.user_id,su.uni_id,u.stt_id,us.stt_name,uni.uni_name,uni.dept_id FROM supply_user su LEFT JOIN user u ON su.user_id=u.user_id LEFT JOIN user_status us ON u.stt_id=us.stt_id LEFT JOIN university uni ON su.uni_id=uni.uni_id WHERE email=emails AND BINARY pass=passed AND su.stt=1 ORDER BY sup_name ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for selete_statistic
-- ----------------------------
DROP PROCEDURE IF EXISTS `selete_statistic`;
delimiter ;;
CREATE PROCEDURE `selete_statistic`()
BEGIN
	SELECT st_id,st_name,st_group,group_name,dept_name FROM statatic s LEFT JOIN statatic_group sg ON s.st_group=sg.group_id LEFT JOIN department d ON sg.dept_id=d.dept_id WHERE s.stt=1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for test_report
-- ----------------------------
DROP PROCEDURE IF EXISTS `test_report`;
delimiter ;;
CREATE PROCEDURE `test_report`()
BEGIN
START TRANSACTION;
	SET @sql = NULL;
SELECT
  GROUP_CONCAT(DISTINCT
               CONCAT('SUM(IF(s.p_m_id = "', s.p_m_id,'", std_qty + emp_qty,"")) AS "',p_m_name,'"')
              ) INTO @sql
FROM quota_distribute s LEFT JOIN adjustdetail ad ON s.d_id=ad.d_id  LEFT JOIN province_ministry p ON s.p_m_id=p.p_m_id;


SET @sql = CONCAT('SELECT ad.course_id AS "ລະຫັດວິຊາ",course_name AS "ຊື່ວິຊາ",get_plan AS "ແຜນສ້າງ",univer AS "ມະຫາໄລ",prov AS "ແຂວງ", ', @sql, ' 
                 FROM quota_distribute s LEFT JOIN adjustdetail ad ON s.d_id=ad.d_id  LEFT JOIN province_ministry p ON s.p_m_id=p.p_m_id LEFT JOIN course c ON ad.course_id=c.course_id 
                 GROUP BY ad.`course_id`
                 ORDER BY ad.`course_id`;');
-- SELECT @sql;
PREPARE stmt FROM @sql;
EXECUTE stmt;
-- DEALLOCATE stmt;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_course
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_course`;
delimiter ;;
CREATE PROCEDURE `update_course`(IN `course_ids` VARCHAR(50), IN `course_names` VARCHAR(50), IN `fac_ids` VARCHAR(30), IN `level_ids` INT(11))
BEGIN
UPDATE course SET course_name=course_names,fac_id=fac_ids,level_id=level_ids WHERE course_id=course_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_createPlan
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_createPlan`;
delimiter ;;
CREATE PROCEDURE `update_createPlan`(IN `items` TEXT)
BEGIN
	START TRANSACTION;
	SET @i = (SELECT Json_Length(items));
	WHILE @i > 0 DO
     SET @i = @i - 1;
		 
		UPDATE create_plan SET std_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.std_qty') as `std_qty`),emp_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.emp_qty') as `emp_qty`) WHERE cre_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.cre_id') as `cre_id`);
    END WHILE;
	COMMIT;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_department
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_department`;
delimiter ;;
CREATE PROCEDURE `update_department`(IN `dept_ids` VARCHAR(20), IN `dept_names` VARCHAR(50))
BEGIN
UPDATE department SET dept_name=dept_names WHERE dept_id=dept_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_documentType
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_documentType`;
delimiter ;;
CREATE PROCEDURE `update_documentType`(IN `doc_names` VARCHAR(50), IN `doc_ids` INT(11))
BEGIN
UPDATE document_type SET doc_name=doc_names WHERE doc_id=doc_ids; 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_documentUpload
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_documentUpload`;
delimiter ;;
CREATE PROCEDURE `update_documentUpload`(IN `doc_ids` INT(11), IN `fy_ids` VARCHAR(10), IN `descriptions` TEXT, IN `covers` VARCHAR(100), IN `up_dates` DATE, IN `file_uploads` TEXT, IN `up_ids` INT(11))
BEGIN
UPDATE document_upload SET doc_id=doc_ids,fy_id=fy_ids,description=descriptions,cover=covers,up_date=up_dates,file_upload=file_uploads WHERE up_id=up_ids; 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_faculty
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_faculty`;
delimiter ;;
CREATE PROCEDURE `update_faculty`(IN `fac_ids` VARCHAR(30), IN `fac_names` VARCHAR(50), IN `uni_ids` VARCHAR(20))
BEGIN
UPDATE faculty SET fac_name=fac_names,uni_id=uni_ids WHERE fac_id=fac_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_fy
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_fy`;
delimiter ;;
CREATE PROCEDURE `update_fy`(IN `file_paths` VARCHAR(100),IN `years` Year(4), IN `statuss` TINYINT(1), IN `qty_s` INT(11), IN `qty_c` INT(11), IN `qty_i` INT(11), IN `qty_q` INT(11), IN `fy_ids` VARCHAR(10))
BEGIN
UPDATE fy SET status=statuss,file_path=file_paths,`year`=years,qty_student=qty_s,qty_con=qty_c,qty_student_inside=qty_i,qty_collegue_con=qty_q WHERE fy_id=fy_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_getplan
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_getplan`;
delimiter ;;
CREATE PROCEDURE `update_getplan`(IN `items` TEXT)
BEGIN
DECLARE get_plans INT DEFAULT 0;
START TRANSACTION;
SET @i = (SELECT Json_Length(items));
	WHILE @i > 0 DO
     SET @i = @i - 1;
		 SET get_plans = (SELECT get_plan FROM adjustdetail WHERE d_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.d_id') as `d_id`));
			 IF(get_plans = (SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.get_plan') as `get_plan`)) THEN
					SELECT "" AS msg;
			 ELSE
					UPDATE adjustdetail SET get_plan=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.get_plan') as `get_plan`),user_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.user_id') as `user_id`) WHERE d_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.d_id') as `d_id`);	
			END IF;
		END WHILE;
COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_hrd
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_hrd`;
delimiter ;;
CREATE PROCEDURE `update_hrd`(IN `hrd_names` VARCHAR(50), IN `surnames` VARCHAR(50), IN `genders` VARCHAR(10), IN `tels` VARCHAR(30), IN `emails` VARCHAR(100), IN `passs` VARCHAR(100), IN `uni_ids` VARCHAR(20), IN `hrd_ids` INT(11))
BEGIN
UPDATE hrd_user SET
hrd_name=hrd_names,surname=surnames,gender=genders,tel=tels,email=emails,pass=passs,uni_id=uni_ids WHERE hrd_id=hrd_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_level
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_level`;
delimiter ;;
CREATE PROCEDURE `update_level`(IN `level_ids` INT(11),IN `level_names` VARCHAR(50))
BEGIN
	START TRANSACTION;
		IF EXISTS(SELECT * FROM course_level WHERE level_name=level_names) THEN
			SELECT "same-name" as msg;
		ELSE
			UPDATE course_level SET level_name=level_names WHERE level_id=level_ids;
			SELECT "success" as msg;
		END IF;
	COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_province
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_province`;
delimiter ;;
CREATE PROCEDURE `update_province`(IN `p_m_ids` INT(11),IN `p_m_names` VARCHAR(50),IN `p_stts` INT(11))
BEGIN
	START TRANSACTION;
		IF EXISTS(SELECT * FROM province_ministry WHERE p_m_name=p_m_names AND p_m_id != p_m_ids) THEN
			SELECT "same" as msg;
		ELSE
			UPDATE province_ministry SET p_m_name=p_m_names,p_stt=p_stts WHERE p_m_id=p_m_ids;
			SELECT "success" as msg;
		END IF;
	COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_quota_distribute
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_quota_distribute`;
delimiter ;;
CREATE PROCEDURE `update_quota_distribute`(IN `items` TEXT)
BEGIN
	START TRANSACTION;
SET @i = (SELECT Json_Length(items));
	WHILE @i > 0 DO
     SET @i = @i - 1;
-- 		 IF EXISTS(SELECT * FROM quota_distribute WHERE id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.id') as `id`) AND std_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.std_qty') as `std_qty`) AND emp_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.emp_qty') as `emp_qty`)) THEN
-- 			SELECT "not-work" AS msg;
-- 		 ELSE
				UPDATE quota_distribute SET std_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.std_qty') as `std_qty`),emp_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.emp_qty') as `emp_qty`),user_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.user_id') as `user_id`) WHERE id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.id') as `id`);
				SELECT "success" as msg;
--     END IF;
	END WHILE;
COMMIT;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_statistic
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_statistic`;
delimiter ;;
CREATE PROCEDURE `update_statistic`(IN `st_ids` INT(11),IN `st_names` VARCHAR(100),IN `st_groups` INT(11),IN `level_ids` INT(11))
BEGIN
	START TRANSACTION;
		IF EXISTS(SELECT * FROM statatic WHERE st_name=st_names AND st_group=st_groups AND st_id!=st_ids) THEN
		SELECT "same" as msg;
		ELSE
			UPDATE statatic SET st_name=st_names, st_group=st_groups, level_id=level_ids WHERE st_id=st_ids;
			SELECT "success" as msg;
		END IF;
	COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_statistic_detail
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_statistic_detail`;
delimiter ;;
CREATE PROCEDURE `update_statistic_detail`(IN `as_ids` INT(11),IN `univers` INT(11),IN `univer_vals` INT(11),IN `provs` INT(11),IN `intvs` INT(11),IN `ad_tests` INT(11),IN `std_publics` INT(11),IN `emps` INT(11),IN `std_handis` INT(11),IN `std_lans` INT(11),IN `ssks` INT(11),IN `stds` INT(11),IN `emp_govs` INT(11),IN `tests` INT(11),IN `std_cons` INT(11),IN `std_2lans` INT(11),IN `std_inters` INT(11),IN `emp_privates` INT(11),IN `user_ids` INT(11))
BEGIN
	START TRANSACTION;
		UPDATE statistic_detail SET univer=univers,univer_valunteer=univer_vals,prov=provs,intv=intvs,ad_test=ad_tests,std_public=std_publics,emp=emps,
		std_handi=std_handis,std_lan=std_lans,ssk=ssks,std=stds,emp_gov=emp_govs,test=tests,std_con=std_cons,std_2lan=std_2lans,std_inter=std_inters,emp_private=emp_privates,user_id=user_ids WHERE as_id=as_ids;
	COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_statistic_distribute
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_statistic_distribute`;
delimiter ;;
CREATE PROCEDURE `update_statistic_distribute`(IN `items` LONGTEXT)
BEGIN
	START TRANSACTION;
		SET @i = (SELECT Json_Length(items));
	WHILE @i > 0 DO
     SET @i = @i - 1;
		 IF ((SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.sd_id') as `sd_id`) = 0) THEN
		 SELECT "Need insert" AS msg;
		 INSERT INTO statistic_distribute SET as_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.as_id') as `as_id`),p_m_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.p_m_id') as `p_m_id`),std_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.std_qty') as `std_qty`),emp_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.emp_qty') as `emp_qty`),user_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.user_id') as `user_id`);
 		 ELSE
				UPDATE statistic_distribute SET std_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.std_qty') as `std_qty`),emp_qty=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.emp_qty') as `emp_qty`),user_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.user_id') as `user_id`) WHERE sd_id=(SELECT JSON_VALUE(JSON_QUERY(items,CONCAT('$[',@i,']')), '$.sd_id') as `sd_id`);
				END IF;
		END WHILE;
	COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_statistic_group
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_statistic_group`;
delimiter ;;
CREATE PROCEDURE `update_statistic_group`(IN `group_ids` INT(11),IN `group_names` VARCHAR(100),IN `dept_ids` VARCHAR(20))
BEGIN
	START TRANSACTION;
		IF EXISTS(SELECT * FROM statatic_group WHERE group_name=group_names AND dept_id=dept_ids AND group_id!=group_ids) THEN
		SELECT "same" as msg;
		ELSE
			UPDATE statatic_group SET group_name=group_names, dept_id=dept_ids WHERE group_id=group_ids;
			SELECT "success" as msg;
		END IF;
	COMMIT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_university
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_university`;
delimiter ;;
CREATE PROCEDURE `update_university`(IN `uni_ids` VARCHAR(20), IN `uni_names` VARCHAR(50), IN `dept_ids` VARCHAR(20))
BEGIN
UPDATE university SET uni_name=uni_names,dept_id=dept_ids WHERE uni_id=uni_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_user
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_user`;
delimiter ;;
CREATE PROCEDURE `update_user`(IN `user_ids` INT(11), IN `stt_ids` INT(11))
BEGIN
UPDATE user SET stt_id=stt_ids where user_id=user_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_userDemand
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_userDemand`;
delimiter ;;
CREATE PROCEDURE `update_userDemand`(IN `demand_names` VARCHAR(50), IN `surnames` VARCHAR(50), IN `genders` VARCHAR(10), IN `tels` VARCHAR(30), IN `emails` VARCHAR(100), IN `passs` VARCHAR(100), IN `p_m_ids` INT(11), IN `demand_ids` INT(11))
BEGIN
UPDATE demand_user SET demand_name=demand_names,surname=surnames,gender=genders,tel=tels,email=emails,pass=passs,p_m_id=p_m_ids WHERE demand_id=demand_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_userDepartment
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_userDepartment`;
delimiter ;;
CREATE PROCEDURE `update_userDepartment`(IN `usr_dept_ids` INT(11), IN `usr_names` VARCHAR(50), IN `surnames` VARCHAR(50), IN `genders` VARCHAR(10), IN `tels` VARCHAR(30), IN `emails` VARCHAR(100), IN `passs` VARCHAR(100), IN `dept_ids` VARCHAR(20), IN `user_ids` INT(11))
BEGIN
UPDATE department_user SET usr_name=usr_names,surname=surnames,gender=genders,tel=tels,email=emails,pass=passs,dept_id=dept_ids,user_id=user_ids WHERE usr_dept_id=usr_dept_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_userSupply
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_userSupply`;
delimiter ;;
CREATE PROCEDURE `update_userSupply`(IN `sup_ids` INT(11), IN `sup_names` VARCHAR(50), IN `surnames` VARCHAR(50), IN `genders` VARCHAR(10), IN `tels` VARCHAR(30), IN `emails` VARCHAR(100), IN `passs` VARCHAR(100), IN `uni_ids` VARCHAR(20))
BEGIN
UPDATE supply_user SET sup_name=sup_names,surname=surnames,gender=genders,tel=tels,email=emails,pass=passs,uni_id=uni_ids WHERE sup_id=sup_ids;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for userAdmin
-- ----------------------------
DROP PROCEDURE IF EXISTS `userAdmin`;
delimiter ;;
CREATE PROCEDURE `userAdmin`()
  NO SQL 
BEGIN
SELECT u.user_id,u.stt_id,stt_name,hrd_name FROM user u LEFT JOIN user_status us ON u.stt_id=us.stt_id LEFT JOIN hrd_user h ON u.user_id=h.user_id WHERE u.stt_id = 4 ORDER BY u.user_id ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for userDemand
-- ----------------------------
DROP PROCEDURE IF EXISTS `userDemand`;
delimiter ;;
CREATE PROCEDURE `userDemand`()
  NO SQL 
BEGIN
SELECT demand_id,demand_name,surname,gender,tel,email,pass,du.user_id,du.p_m_id,p_m_name,u.stt_id,us.stt_name FROM demand_user du LEFT JOIN province_ministry pm ON du.p_m_id=pm.p_m_id LEFT JOIN user u ON  du.user_id=u.user_id LEFT JOIN user_status us ON u.stt_id=us.stt_id WHERE du.stt=1 ORDER BY demand_name ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for userHRD
-- ----------------------------
DROP PROCEDURE IF EXISTS `userHRD`;
delimiter ;;
CREATE PROCEDURE `userHRD`()
  NO SQL 
BEGIN
SELECT hrd_id,hrd_name,surname,gender,tel,email,pass,hu.user_id,hu.uni_id,uni_name,uni.dept_id,u.stt_id,us.stt_name,dept_name FROM hrd_user hu LEFT JOIN user u ON hu.user_id=u.user_id LEFT JOIN user_status us ON u.stt_id=us.stt_id LEFT JOIN university uni ON hu.uni_id=uni.uni_id LEFT JOIN department d ON uni.dept_id=d.dept_id WHERE hu.stt=1 ORDER BY hrd_name ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for userSupply
-- ----------------------------
DROP PROCEDURE IF EXISTS `userSupply`;
delimiter ;;
CREATE PROCEDURE `userSupply`()
  NO SQL 
BEGIN
SELECT sup_id,sup_name,surname,gender,tel,email,pass,su.user_id,su.uni_id,u.stt_id,us.stt_name,uni.uni_name,uni.dept_id FROM supply_user su LEFT JOIN user u ON su.user_id=u.user_id LEFT JOIN user_status us ON u.stt_id=us.stt_id LEFT JOIN university uni ON su.uni_id=uni.uni_id WHERE su.stt=1 ORDER BY sup_id ASC;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
