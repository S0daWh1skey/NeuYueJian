-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2018 at 05:53 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `YueJian`
--

-- --------------------------------------------------------

--
-- Table structure for table `Activity`
--

CREATE TABLE `Activity` (
  `ActivityID` int(11) NOT NULL COMMENT '活动ID',
  `ActivityName` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '活动名字',
  `ActivityPic` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '活动图片',
  `ActivityIntro` varchar(500) COLLATE utf8_bin NOT NULL COMMENT '活动介绍',
  `ActivityUploadTime` datetime NOT NULL COMMENT '发布时间',
  `ActivityTime` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '活动时间',
  `ActivityPrice` int(11) NOT NULL COMMENT '活动价格',
  `ActivityPhoneNumber` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '活动联系方式',
  `ActivityJoinNumber` int(11) NOT NULL COMMENT '参加人数',
  `ActivityAddress` varchar(90) COLLATE utf8_bin NOT NULL COMMENT '活动地址',
  `ActivityLikeNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Activity`
--

INSERT INTO `Activity` (`ActivityID`, `ActivityName`, `ActivityPic`, `ActivityIntro`, `ActivityUploadTime`, `ActivityTime`, `ActivityPrice`, `ActivityPhoneNumber`, `ActivityJoinNumber`, `ActivityAddress`, `ActivityLikeNum`) VALUES
(1, 'qwhiueqwehuiqwe', '1.jpg', 'sahdoahduasd', '2018-07-18 09:38:13', '12:00', 20, '18897289172', 898, '0', 1233),
(2, 'laskahsak', '2.jpg', 'hojhoahsoas', '2018-07-06 00:00:00', '12:00', 30, '1222121121211', 888, '0', 2112),
(3, '去哦的仨猴似的', '1.jpg', '大师李东海嗲说', '2018-07-06 00:00:00', '12:00', 29, '188999999999', 1111, '四阿哥大宋大师的', 2999),
(4, '上课就啊大地啊速度哈', '2.jpg', '等哈说大师大师大师大师的', '2018-07-05 00:00:00', '30', 20, '188778761111', 898, '刷卡嗲说大师度', 1222);

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `SuID` int(11) NOT NULL COMMENT '超级管理员ID',
  `SuName` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '超级管理员姓名',
  `SuPwd` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '超级管理员密码',
  `SuEmail` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '超级管理员邮箱',
  `SuRand` int(11) NOT NULL COMMENT '超级管理员验证码'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`SuID`, `SuName`, `SuPwd`, `SuEmail`, `SuRand`) VALUES
(1, '123', '202cb962ac59075b964b07152d234b70', '1@qq.com', 164486);

-- --------------------------------------------------------

--
-- Table structure for table `Award`
--

CREATE TABLE `Award` (
  `AwardID` int(11) NOT NULL COMMENT '奖品ID',
  `AwardName` varchar(100) COLLATE utf8_bin NOT NULL COMMENT '奖品名字',
  `AwardPic` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '奖品图片',
  `AwardContent` varchar(500) COLLATE utf8_bin NOT NULL COMMENT '奖品内容',
  `AwardValue` int(11) NOT NULL COMMENT '奖品兑换值',
  `Isrecommend` int(11) NOT NULL,
  `AwardTitle` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Award`
--

INSERT INTO `Award` (`AwardID`, `AwardName`, `AwardPic`, `AwardContent`, `AwardValue`, `Isrecommend`, `AwardTitle`) VALUES
(1, '撒都不叫阿三版嗲舍不得', '1.jpg', '圣诞节大孙佳断奶的技能', 11222, 1, '是生生世世生生世世'),
(2, '但是不健康的霸道', '2.jpg', '撒了点叫阿三开的酒吧说', 13311, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `ClassID` int(11) NOT NULL COMMENT '课程ID',
  `ClassName` varchar(80) COLLATE utf8_bin NOT NULL COMMENT '课程名',
  `ClassIntro` varchar(500) COLLATE utf8_bin NOT NULL COMMENT '课程简介',
  `ClassPrice` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '课程价格',
  `ClassPic` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '上课图片',
  `ClassAddress` varchar(100) COLLATE utf8_bin NOT NULL COMMENT '上课地址',
  `ClassNotice` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '上课须知',
  `ClassTime` varchar(90) COLLATE utf8_bin NOT NULL COMMENT '上课时间',
  `ClassGrade` int(11) NOT NULL,
  `ClubID` int(11) DEFAULT NULL,
  `ClassSIntro` char(40) COLLATE utf8_bin NOT NULL,
  `ClassType` int(11) NOT NULL,
  `Isrecom` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Class`
--

INSERT INTO `Class` (`ClassID`, `ClassName`, `ClassIntro`, `ClassPrice`, `ClassPic`, `ClassAddress`, `ClassNotice`, `ClassTime`, `ClassGrade`, `ClubID`, `ClassSIntro`, `ClassType`, `Isrecom`) VALUES
(1, 'ijzhdiasdh', 'asidhoasdhiuahsdoa', '¥90', '20180712131953548.jpg', '大连', '啊啊啊啊', '12:00-19:00', 4, 1, '啊啊啊啊啊', 1, 0),
(2, 'alknsajksnasnla', 'lskalksnasap', '¥40', '2.jpg', '大连市西岗区', '角斗士的', '18:00-20:00', 2, 1, '啊啊啊啊啊', 2, 0),
(3, 'fdgf', '就换个环境保护金碧辉煌', '23', '20180712134016905.jpg', 'v 就会回家', '模版艰苦通过', '12:00', 4, 4, '环境保护局', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Club`
--

CREATE TABLE `Club` (
  `ClubID` int(11) NOT NULL COMMENT '俱乐部ID',
  `ClubName` varchar(80) COLLATE utf8_bin NOT NULL COMMENT '俱乐部名字',
  `ClubPic` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '俱乐部图片',
  `ClubPic1` char(20) COLLATE utf8_bin NOT NULL,
  `ClubPic2` char(20) COLLATE utf8_bin NOT NULL,
  `ClubPic3` char(20) COLLATE utf8_bin NOT NULL,
  `ClubIntro` varchar(500) COLLATE utf8_bin NOT NULL COMMENT '俱乐部简介',
  `ClubContact` varchar(400) COLLATE utf8_bin NOT NULL COMMENT '俱乐部联系方式',
  `ClubAddress` varchar(80) COLLATE utf8_bin NOT NULL,
  `ClubOpenTime` char(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Club`
--

INSERT INTO `Club` (`ClubID`, `ClubName`, `ClubPic`, `ClubPic1`, `ClubPic2`, `ClubPic3`, `ClubIntro`, `ClubContact`, `ClubAddress`, `ClubOpenTime`) VALUES
(1, 'lycddd', '1.jpg', '2.jpg', '3.jpg', '4.jpg', 'haokan', '11111111', '0', '0'),
(2, 'lililili', '1.jpg', '2.jpg', '3.jpg', '4.jpg', '激动死哦', 'hdasoiu的后期和企鹅佛', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `Clubadmin`
--

CREATE TABLE `Clubadmin` (
  `ClubAdminID` int(11) NOT NULL,
  `ClubAdminName` varchar(10) COLLATE utf8_bin NOT NULL,
  `ClubAdminPwd` char(32) COLLATE utf8_bin NOT NULL,
  `ClubAdminPhoneNum` varchar(20) COLLATE utf8_bin NOT NULL,
  `ClubAdminEmail` varchar(40) COLLATE utf8_bin NOT NULL,
  `ClubAdminRand` int(11) NOT NULL DEFAULT '0',
  `ClubAdminIsChecked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Clubadmin`
--

INSERT INTO `Clubadmin` (`ClubAdminID`, `ClubAdminName`, `ClubAdminPwd`, `ClubAdminPhoneNum`, `ClubAdminEmail`, `ClubAdminRand`, `ClubAdminIsChecked`) VALUES
(1, '123', '202cb962ac59075b964b07152d234b70', '18988889999', '18988889999@qq.com', 0, 1),
(2, '123', '202cb962ac59075b964b07152d234b70', '11111111', '1@qq.com', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Clubfavor`
--

CREATE TABLE `Clubfavor` (
  `ClubFavorID` int(11) NOT NULL,
  `ClubID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `FavorTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Clubfavor`
--

INSERT INTO `Clubfavor` (`ClubFavorID`, `ClubID`, `UserID`, `FavorTime`) VALUES
(1, 1, 4, '2018-07-07 15:07:31'),
(2, 2, 4, '2018-07-07 15:07:39'),
(3, 2, 5, '2018-07-07 15:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `Coach`
--

CREATE TABLE `Coach` (
  `CoachID` int(11) NOT NULL COMMENT '教练ID',
  `CoachName` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '教练姓名',
  `CoachIntro` varchar(500) COLLATE utf8_bin NOT NULL COMMENT '教练介绍',
  `CoachPic` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '教练图片',
  `CoachPhone` varchar(30) COLLATE utf8_bin NOT NULL COMMENT '教练电话',
  `ClubID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Coach`
--

INSERT INTO `Coach` (`CoachID`, `CoachName`, `CoachIntro`, `CoachPic`, `CoachPhone`, `ClubID`) VALUES
(1, 'kaka', 'saihiusasaishaushbhj', '1.jpg', '12233445566', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `CommnetID` int(11) NOT NULL COMMENT '评论ID',
  `PicID` int(11) NOT NULL COMMENT '图片ID',
  `CommentContent` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '评论内容',
  `From_uid` int(11) NOT NULL COMMENT '来自用户',
  `To_uid` int(11) DEFAULT NULL COMMENT '回复目标用户',
  `CommentTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` (`CommnetID`, `PicID`, `CommentContent`, `From_uid`, `To_uid`, `CommentTime`) VALUES
(1, 1, 'aaaaaaaaa', 5, 5, '2018-07-05 00:00:00'),
(4, 1, '好好好好', 4, 5, '2018-07-07 00:00:00'),
(5, 1, '好好好好', 4, 5, '2018-07-07 13:07:45'),
(6, 1, '好好好好', 4, 5, '2018-07-09 09:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `Insurance`
--

CREATE TABLE `Insurance` (
  `InsuranceID` int(11) NOT NULL,
  `OrderSNum` char(20) COLLATE utf8_bin NOT NULL,
  `InsuranceName` varchar(15) COLLATE utf8_bin NOT NULL,
  `InsuranceIDNumber` char(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Insurance`
--

INSERT INTO `Insurance` (`InsuranceID`, `OrderSNum`, `InsuranceName`, `InsuranceIDNumber`) VALUES
(1, '20180706110035226482', '宋仲基', '330902111199990001');

-- --------------------------------------------------------

--
-- Table structure for table `Master`
--

CREATE TABLE `Master` (
  `MasterID` int(11) NOT NULL COMMENT '大师ID',
  `Mastername` varchar(60) COLLATE utf8_bin NOT NULL COMMENT '大师名字',
  `MasterPic` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '大师图片',
  `MasterIntro` varchar(500) COLLATE utf8_bin NOT NULL COMMENT '大师简介',
  `MaterFacePic` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '大师头像',
  `MasterAddress` varchar(80) COLLATE utf8_bin NOT NULL,
  `MasterLikeNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Master`
--

INSERT INTO `Master` (`MasterID`, `Mastername`, `MasterPic`, `MasterIntro`, `MaterFacePic`, `MasterAddress`, `MasterLikeNum`) VALUES
(1, '决赛谁啊', '1.jpg', '卡孙佳大噶三个嗲说嗲说', '11.jpg', '的萨克哈死都好', 200),
(2, '说白了大赛的', '2.jpg', '但是低俗好的', 'sd.jpg', 'sdjahdsah', 2901);

-- --------------------------------------------------------

--
-- Table structure for table `Match`
--

CREATE TABLE `Match` (
  `MatchID` int(11) NOT NULL COMMENT '比赛ID',
  `MatchName` varchar(60) COLLATE utf8_bin NOT NULL COMMENT '比赛名',
  `MatchPic` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '比赛图片',
  `MatchIntro` varchar(500) COLLATE utf8_bin NOT NULL COMMENT '比赛介绍',
  `UploadTime` datetime NOT NULL COMMENT '添加时间',
  `MatchTime` varchar(30) COLLATE utf8_bin NOT NULL COMMENT '比赛时间',
  `MatchAddress` varchar(80) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Match`
--

INSERT INTO `Match` (`MatchID`, `MatchName`, `MatchPic`, `MatchIntro`, `UploadTime`, `MatchTime`, `MatchAddress`) VALUES
(1, '急哦啊手机哦啊', '1.jpg', '扫散啊', '2018-07-04 00:00:00', '21009.221.21212', '阿斯顿叫阿松ID叫阿三'),
(2, '那是看见你打', '2.jpg', '撒到都爱大大似乎都啊说的话', '2018-07-04 00:00:00', '1209.99.111.111.1', '卡的还是打算的');

-- --------------------------------------------------------

--
-- Table structure for table `Notification`
--

CREATE TABLE `Notification` (
  `NotificationID` int(11) NOT NULL,
  `NotificationContent` varchar(500) COLLATE utf8_bin NOT NULL,
  `AdminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Orderform`
--

CREATE TABLE `Orderform` (
  `OrderID` int(11) NOT NULL COMMENT '订单ID',
  `OrderUID` int(11) NOT NULL COMMENT '下单用户ID',
  `OrderActivityID` int(11) NOT NULL COMMENT '订单课程ID',
  `OrderAdultNumber` int(11) DEFAULT NULL COMMENT '订单数量成人票',
  `OrderTime` datetime NOT NULL COMMENT '下单时间',
  `PayMethod` int(11) NOT NULL COMMENT '支付方式',
  `OrderStudentNumber` int(11) DEFAULT NULL COMMENT '订单数量儿童票',
  `OrderSNum` char(20) COLLATE utf8_bin NOT NULL,
  `UserName` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '真实姓名',
  `UserPhoneNumber` varchar(20) COLLATE utf8_bin NOT NULL,
  `OrderStatus` int(11) NOT NULL DEFAULT '0',
  `OrderTotalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Orderform`
--

INSERT INTO `Orderform` (`OrderID`, `OrderUID`, `OrderActivityID`, `OrderAdultNumber`, `OrderTime`, `PayMethod`, `OrderStudentNumber`, `OrderSNum`, `UserName`, `UserPhoneNumber`, `OrderStatus`, `OrderTotalPrice`) VALUES
(2, 5, 1, 2, '2018-07-06 00:00:00', 1, NULL, '20180706110035226482', '宋仲基', '18899998888', 2, 90);

-- --------------------------------------------------------

--
-- Table structure for table `Questionandanswer`
--

CREATE TABLE `Questionandanswer` (
  `QAndAID` int(11) NOT NULL COMMENT '问题ID',
  `QAndAQUID` int(11) NOT NULL COMMENT '提问用户ID',
  `QAndAQContent` varchar(100) COLLATE utf8_bin NOT NULL COMMENT '提问内容',
  `QAndAQTime` datetime NOT NULL COMMENT '提问时间',
  `QAndAAUID` int(11) DEFAULT NULL COMMENT '回答用户ID',
  `QAndAAContent` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '回答内容',
  `QAndAATime` datetime DEFAULT NULL COMMENT '回答时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Questionandanswer`
--

INSERT INTO `Questionandanswer` (`QAndAID`, `QAndAQUID`, `QAndAQContent`, `QAndAQTime`, `QAndAAUID`, `QAndAAContent`, `QAndAATime`) VALUES
(1, 5, 'hiuashdiuasd', '2018-07-05 00:00:00', 1, 'kahjsdvvasdjasdasdhu', '2018-07-04 00:00:00'),
(2, 4, 'ohdiasdbiasdasjkbdas', '2018-07-04 00:00:00', 2, 'sajbdksabdkhasdasd', '2018-07-11 00:00:00'),
(3, 6, 'sadbaksjdbas', '2018-07-03 00:00:00', NULL, NULL, NULL),
(4, 3, '你说好不好', '2018-07-07 00:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Redeem`
--

CREATE TABLE `Redeem` (
  `AwardRedeemID` int(11) NOT NULL COMMENT '兑换ID',
  `AwardRedeemUID` int(11) NOT NULL COMMENT '兑换用户ID',
  `AwardRedeemAwardID` int(11) NOT NULL COMMENT '兑换奖品ID',
  `AwardRedeemStatus` int(11) NOT NULL DEFAULT '0' COMMENT '兑换状态',
  `RedeemName` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '兑换人姓名',
  `RedeemPhone` char(20) COLLATE utf8_bin NOT NULL COMMENT '兑换人手机号',
  `RedeemAddress` varchar(60) COLLATE utf8_bin NOT NULL COMMENT '兑换人地址',
  `RedeemZip` char(10) COLLATE utf8_bin NOT NULL COMMENT '兑换人邮编'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Redeem`
--

INSERT INTO `Redeem` (`AwardRedeemID`, `AwardRedeemUID`, `AwardRedeemAwardID`, `AwardRedeemStatus`, `RedeemName`, `RedeemPhone`, `RedeemAddress`, `RedeemZip`) VALUES
(1, 4, 1, 0, '张三', '18877898888', '上海市佘山区', '3110000'),
(2, 4, 1, 0, '张三', '18877898888', '上海市佘山区', '3110000');

-- --------------------------------------------------------

--
-- Table structure for table `Sharepicture`
--

CREATE TABLE `Sharepicture` (
  `PicID` int(11) NOT NULL COMMENT '晒图ID',
  `Pic` varchar(30) COLLATE utf8_bin NOT NULL COMMENT '晒图图片',
  `PicContent` varchar(500) COLLATE utf8_bin NOT NULL COMMENT '晒图内容',
  `PicUploadTime` datetime NOT NULL COMMENT '晒图上传时间',
  `PicUserID` int(11) NOT NULL COMMENT '晒图用户',
  `Pictag` varchar(20) COLLATE utf8_bin NOT NULL,
  `CommentCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Sharepicture`
--

INSERT INTO `Sharepicture` (`PicID`, `Pic`, `PicContent`, `PicUploadTime`, `PicUserID`, `Pictag`, `CommentCount`) VALUES
(1, '1.jpg', '啊啊啊啊啊啊啊啊', '2018-07-04 00:00:00', 5, '#hhhhhh#', 1),
(2, '2.jpg', '订单点点滴滴', '2018-07-05 00:00:00', 5, '#66666666#', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Trainingorder`
--

CREATE TABLE `Trainingorder` (
  `OrderID` int(11) NOT NULL COMMENT '培训订单ID',
  `OrderUID` int(11) NOT NULL COMMENT '下单用户ID',
  `OrderClassID` int(11) NOT NULL COMMENT '订单课程ID',
  `OrderNumber` int(11) NOT NULL COMMENT '订单数量',
  `OrderTime` datetime NOT NULL COMMENT '下单时间',
  `PayMethod` int(11) NOT NULL COMMENT '下单方式',
  `UserName` varchar(80) COLLATE utf8_bin NOT NULL COMMENT '下单用户名称',
  `UserPhoneNumber` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '下单用户联系方式',
  `OrderStatus` int(11) NOT NULL DEFAULT '0',
  `OrderTotalPrice` int(11) NOT NULL,
  `OrderSNum` char(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Trainingorder`
--

INSERT INTO `Trainingorder` (`OrderID`, `OrderUID`, `OrderClassID`, `OrderNumber`, `OrderTime`, `PayMethod`, `UserName`, `UserPhoneNumber`, `OrderStatus`, `OrderTotalPrice`, `OrderSNum`) VALUES
(1, 5, 1, 2, '2018-07-06 00:00:00', 1, '宋仲基', '18899998888', 0, 1, ''),
(2, 5, 1, 2, '2018-07-07 00:00:00', 1, '宋仲基', '18899998888', 2, 0, '20180707164024495502');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserID` int(11) NOT NULL COMMENT '用户ID',
  `UserName` varchar(80) COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `UserPwd` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '用户密码',
  `UserPic` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '用户头像',
  `UserEmail` varchar(80) COLLATE utf8_bin NOT NULL COMMENT '用户邮箱',
  `UserPhoneNumber` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '用户手机号',
  `SportValue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserID`, `UserName`, `UserPwd`, `UserPic`, `UserEmail`, `UserPhoneNumber`, `SportValue`) VALUES
(5, 'AlbertShepherd', 'ee4e182bdc789df8e130bf1f5cebb689', '20180705101118671.jpg', '375314596@qq.com', '13567778889', 1000),
(16, 'ChenyuWong', 'ee4e182bdc789df8e130bf1f5cebb689', '20180709112146254.jpg', '375314596@qq.com', '13567778889', 100),
(18, 'ChenyuWong', 'ee4e182bdc789df8e130bf1f5cebb689', '20180709112148764.jpg', '375314596@qq.com', '13567778889', 1000),
(19, 'ChenyuWong', 'ee4e182bdc789df8e130bf1f5cebb689', '20180709112158288.jpg', '375314596@qq.com', '13567778889', 0),
(20, 'ChenyuWong', 'ee4e182bdc789df8e130bf1f5cebb689', '20180709112159102.jpg', '375314596@qq.com', '13567778889', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Video`
--

CREATE TABLE `Video` (
  `VideoID` int(11) NOT NULL COMMENT '视频ID',
  `VideoName` varchar(60) COLLATE utf8_bin NOT NULL COMMENT '视频名',
  `VideoIntro` varchar(400) COLLATE utf8_bin NOT NULL COMMENT '视频介绍',
  `VideoSrc` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '视频地址',
  `MasterID` int(11) DEFAULT NULL COMMENT '大师ID',
  `ClubID` int(11) DEFAULT NULL COMMENT '俱乐部ID',
  `VideoLikeNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Video`
--

INSERT INTO `Video` (`VideoID`, `VideoName`, `VideoIntro`, `VideoSrc`, `MasterID`, `ClubID`, `VideoLikeNum`) VALUES
(1, '122323232323', 'josahdiuasdasdasd', 'mi.mp4', 1, 1, 1111),
(2, 'qwwqwqwq', 'nasjca', 'ddsadd.mp4', 1, 1, 1212);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Activity`
--
ALTER TABLE `Activity`
  ADD PRIMARY KEY (`ActivityID`);

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`SuID`);

--
-- Indexes for table `Award`
--
ALTER TABLE `Award`
  ADD PRIMARY KEY (`AwardID`);

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `Club`
--
ALTER TABLE `Club`
  ADD PRIMARY KEY (`ClubID`);

--
-- Indexes for table `Clubadmin`
--
ALTER TABLE `Clubadmin`
  ADD PRIMARY KEY (`ClubAdminID`);

--
-- Indexes for table `Clubfavor`
--
ALTER TABLE `Clubfavor`
  ADD PRIMARY KEY (`ClubFavorID`);

--
-- Indexes for table `Coach`
--
ALTER TABLE `Coach`
  ADD PRIMARY KEY (`CoachID`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`CommnetID`);

--
-- Indexes for table `Insurance`
--
ALTER TABLE `Insurance`
  ADD PRIMARY KEY (`InsuranceID`);

--
-- Indexes for table `Master`
--
ALTER TABLE `Master`
  ADD PRIMARY KEY (`MasterID`);

--
-- Indexes for table `Match`
--
ALTER TABLE `Match`
  ADD PRIMARY KEY (`MatchID`);

--
-- Indexes for table `Notification`
--
ALTER TABLE `Notification`
  ADD PRIMARY KEY (`NotificationID`);

--
-- Indexes for table `Orderform`
--
ALTER TABLE `Orderform`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `Questionandanswer`
--
ALTER TABLE `Questionandanswer`
  ADD PRIMARY KEY (`QAndAID`);

--
-- Indexes for table `Redeem`
--
ALTER TABLE `Redeem`
  ADD PRIMARY KEY (`AwardRedeemID`);

--
-- Indexes for table `Sharepicture`
--
ALTER TABLE `Sharepicture`
  ADD PRIMARY KEY (`PicID`);

--
-- Indexes for table `Trainingorder`
--
ALTER TABLE `Trainingorder`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `Video`
--
ALTER TABLE `Video`
  ADD PRIMARY KEY (`VideoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Activity`
--
ALTER TABLE `Activity`
  MODIFY `ActivityID` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动ID', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `SuID` int(11) NOT NULL AUTO_INCREMENT COMMENT '超级管理员ID', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Award`
--
ALTER TABLE `Award`
  MODIFY `AwardID` int(11) NOT NULL AUTO_INCREMENT COMMENT '奖品ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Class`
--
ALTER TABLE `Class`
  MODIFY `ClassID` int(11) NOT NULL AUTO_INCREMENT COMMENT '课程ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Club`
--
ALTER TABLE `Club`
  MODIFY `ClubID` int(11) NOT NULL AUTO_INCREMENT COMMENT '俱乐部ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Clubadmin`
--
ALTER TABLE `Clubadmin`
  MODIFY `ClubAdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Clubfavor`
--
ALTER TABLE `Clubfavor`
  MODIFY `ClubFavorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Coach`
--
ALTER TABLE `Coach`
  MODIFY `CoachID` int(11) NOT NULL AUTO_INCREMENT COMMENT '教练ID', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `CommnetID` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论ID', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Insurance`
--
ALTER TABLE `Insurance`
  MODIFY `InsuranceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Master`
--
ALTER TABLE `Master`
  MODIFY `MasterID` int(11) NOT NULL AUTO_INCREMENT COMMENT '大师ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Match`
--
ALTER TABLE `Match`
  MODIFY `MatchID` int(11) NOT NULL AUTO_INCREMENT COMMENT '比赛ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Notification`
--
ALTER TABLE `Notification`
  MODIFY `NotificationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Orderform`
--
ALTER TABLE `Orderform`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Questionandanswer`
--
ALTER TABLE `Questionandanswer`
  MODIFY `QAndAID` int(11) NOT NULL AUTO_INCREMENT COMMENT '问题ID', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Redeem`
--
ALTER TABLE `Redeem`
  MODIFY `AwardRedeemID` int(11) NOT NULL AUTO_INCREMENT COMMENT '兑换ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Sharepicture`
--
ALTER TABLE `Sharepicture`
  MODIFY `PicID` int(11) NOT NULL AUTO_INCREMENT COMMENT '晒图ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Trainingorder`
--
ALTER TABLE `Trainingorder`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT COMMENT '培训订单ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Video`
--
ALTER TABLE `Video`
  MODIFY `VideoID` int(11) NOT NULL AUTO_INCREMENT COMMENT '视频ID', AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
