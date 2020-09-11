-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 06:21 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnus_feedback`
--

CREATE TABLE `alumnus_feedback` (
  `id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumnus_feedback`
--

INSERT INTO `alumnus_feedback` (`id`, `author`, `date`, `body`, `image`, `active`) VALUES
(1, 'mouli', '2019-11-19 08:31:17', 'An alumnus (Latin pronunciation: [aËˆlÊŠmnÊŠs]; masculine) or an alumna ([aËˆlÊŠmna]; feminine) of a college, university, or other school is a former student who has either attended or graduated in some fashion from the institution. The word is Latin and simply means student. The plural is alumni [aËˆlÊŠmniË] for men and mixed groups and alumnae [aËˆlÊŠmnaeÌ¯] for women. The term is not synonymous with \"graduate\"; one can be an alumnus without graduating. (Burt Reynolds, alumnus but not graduate of Florida State, is an example.) An alumnus can also be and is more recently expanded to include a former employee of an organization[1] and it may also apply to a former member, contributor', 'admin/upload/ebc1e42aa8.jpg', 1),
(2, 'mouli', '2019-11-19 15:27:31', 'An alumnus (Latin pronunciation: [aËˆlÊŠmnÊŠs]; masculine) or an alumna ([aËˆlÊŠmna]; feminine) of a college, university, or other school is a former student who has either attended or graduated in some fashion from the institution. The word is Latin and simply means student. The plural is alumni [aËˆlÊŠmniË] for men and mixed groups and alumnae [aËˆlÊŠmnaeÌ¯] for women. The term is not synonymous with \"graduate\"; one can be an alumnus without graduating. (Burt Reynolds, alumnus but not graduate of Florida State, is an example.) An alumnus can also be and is more recently expanded to include a former employee of an organization[1] and it may also apply to a former member, contributor,', 'admin/upload/a5cf59ea13.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_name` varchar(33) NOT NULL,
  `receiver_name` varchar(33) NOT NULL,
  `message_text` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_name`, `receiver_name`, `message_text`, `date_time`) VALUES
(1, 'a', 'a', 'hello!', '0000-00-00 00:00:00'),
(2, 'a', 'a', 'hello!', '2019-12-16 10:46:04'),
(3, 'a', 'a', 'hello....\r\n', '2019-12-16 10:46:20'),
(4, 'a', 'a', 'hello....\r\n', '2019-12-16 10:52:19'),
(5, 'a', 'tama', 'how are you...', '2019-12-16 10:52:37'),
(6, 'a', 'tama', 'nnmm,m', '2019-12-16 10:53:18'),
(7, 'a', 'tama', 'nkkkjkjk', '2019-12-16 10:53:50'),
(8, 'a', 'tama', 'love you baby..', '2019-12-16 10:55:55'),
(9, 'a', 'tama', 'hi...', '2019-12-16 11:33:13'),
(10, 'tama', 'a', 'hi', '2019-12-16 12:53:11'),
(11, 'tama', 'a', 'kjkjkjk', '2019-12-16 12:53:46'),
(12, 'tama', 'tama', 'hgjh', '2019-12-16 03:13:25'),
(13, 'a', '', 'how', '2019-12-16 04:58:45'),
(14, 'a', 'tama', 'hello', '2019-12-16 05:00:37'),
(15, 'rumpa2', 'tama', 'hi kutu\r\n', '2019-12-16 05:10:23'),
(16, 'rumpa2', 'tama', 'hello', '2019-12-16 05:10:28'),
(17, 'rumpa2', 'tama', 'how are you?', '2019-12-16 05:11:21'),
(18, 'tama', 'a', 'hello kemcho?', '2019-12-18 07:42:32'),
(19, 'tama', 'a', 'majama?', '2019-12-18 07:42:40'),
(20, 'a', 'tama', 'yah and you?', '2019-12-18 07:43:09'),
(21, 'tama', 'a', 'hello', '2019-12-19 03:46:49'),
(22, 'user1', 'tama', 'hello', '2019-12-19 03:48:33'),
(23, 'user2', 'tama', 'hi tama', '2019-12-19 04:03:07'),
(24, 'user2', 'rumpa2', 'how are you rumpa?', '2019-12-19 04:03:31'),
(25, 'tama', 'user1', 'huhj', '2019-12-20 07:14:15'),
(26, 'tama', 'user1', 'hi', '2019-12-21 02:00:25'),
(27, 'tama', 't', 'hello', '2019-12-21 05:21:43'),
(28, 'tama2', 'user1', 'kjkj', '2019-12-24 10:33:30'),
(29, 'tama2', 'user1', 'hi', '2019-12-24 10:33:46'),
(30, 'tama2', 'e', 'hbjhbj', '2019-12-24 10:34:26'),
(31, 'tama2', 'user1', 'nj', '2019-12-24 10:34:45'),
(32, 'tama2', 'p', 'jnjnj', '2019-12-24 10:36:01'),
(33, 'tama2', 'puspi', 'puspi', '2019-12-24 10:36:21'),
(34, 'puspi', 'tama', 'hello', '2019-12-24 10:38:26'),
(35, 'puspi', 'tama', ';;;', '2019-12-24 11:18:06'),
(36, 'puspi', 'tama', 'jk', '2019-12-24 11:20:53'),
(37, 'puspi', 'tama', 'kk', '2019-12-24 11:25:30'),
(38, 'puspi', 'tama', 'hi how are you', '2019-12-24 11:25:41'),
(39, 'piyan', 'tama', 'njj', '2019-12-24 11:54:05'),
(40, 'piyan', 'tama', 'mjk', '2019-12-24 11:56:17'),
(41, 'ayesha', 'a', 'kml', '2019-12-24 07:21:37'),
(42, 'ayesha', 'tama', 'hi', '2019-12-24 07:39:44'),
(43, 'tama2', 'e', 'hi', '2019-12-24 07:40:31'),
(44, 'tama2', 'ayesha', 'hi\r\n', '2019-12-24 07:41:16'),
(45, 'rumpa', 'tama2', 'hi\r\n', '2019-12-24 08:17:05'),
(46, 'rumpa', 'tama2', 'jokl', '2019-12-24 08:17:09'),
(47, 'rumpa', 'ayesha', 'hi', '2019-12-24 08:18:55'),
(48, 'rumpa', 'ayesha', 'df', '2019-12-24 08:19:02'),
(49, 'rumpa', 'ayesha', 'hello', '2019-12-24 08:19:07'),
(50, 'rumpa', 'tama2', 'fg', '2019-12-24 08:38:35'),
(51, 'rumpa', 'tama2', 'ji', '2019-12-26 03:08:38'),
(52, 'pappu', 'rumpa', 'hello chikni', '2019-12-26 04:04:30'),
(53, 'pappu', 'rumpa', 'hi', '2019-12-26 04:04:40'),
(54, 'rumpa', 'pappu', 'hlw lombu', '2019-12-26 04:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogpage`
--

CREATE TABLE `tbl_blogpage` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(80) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blogpage`
--

INSERT INTO `tbl_blogpage` (`id`, `title`, `body`, `image`, `author`, `date`, `active`) VALUES
(2, 'help post', 'Prior to the mid-1970s, software practitioners generally called themselves computer scientists, computer programmers or software developers, regardless of their actual jobs. Many people prefer to call themselves software developer and programmer, because most widely agree what these terms mean, while the exact meaning of software engineer is still being debated.\r\n\r\nHow to beciome a Software Engineer', 'admin/upload/07fd22b57a.jpg', 'mouli', '2019-11-03 11:04:38', 1),
(3, 'Job post', 'Bachelor of Science in Computer Science and Engineering primarily involves the study of a number of core courses, which every CSE graduate should know, and a significant number of courses from specialized areas. Core courses build the foundation and specialized courses prepare the students for the specific areas of Computer Science and Engineering. To understand the underpinning theory of the courses of Computer Science and Engineering, a number of courses on Mathematics and Basic Science have been felt mandatory to be included in the syllabus. In addition, some social science, management, accounting, economics, and communication-skills development related courses have been incorporated to make the syllabus a balanced and reasonably complete one. The objective of this undergraduate program in Computer Science and Engineering is to develop skilled and competent graduates to meet the current and future needs at home and abroad.\r\n\r\n\r\n', 'admin/upload/a875c8f9e6.jpg', 'sushmita', '2019-11-05 12:17:21', 1),
(4, 'Sharing Information', '\r\nDefinition - What does Information Sharing mean?\r\n\r\nInformation sharing describes the exchange of data between various organizations, people and technologies. There are several types of information sharing:\r\n\r\n    Information shared by individuals (such as a video shared on Facebook or YouTube)\r\n    Information shared by organizations (such as the RSS feed of an online weather report)\r\n    Information shared between firmware/software (such as the IP addresses of available network nodes or the availability of disk space)\r\n\r\nThe advent of wide distributed networks, intranets, cross-platform compatibility, application porting and standardization of IP protocols have all facilitated the huge growth in global information sharing. When it comes to personal information however, no matter how easy it is to port the actual data, there are laws in most countries prohibiting the sharing of personal data without explicit permission being granted. In the U.S. and Europe it is a criminal offense to share any personal data about anyone without such explicit permission. There is plenty of other information sharing that does not fall under the law and information sharing is increasing as more networks and organizations connect and information becomes easier to share across the internet.\r\n', 'admin/upload/c339155701.png', 'mouli', '2019-11-05 12:27:01', 0),
(5, 'Sharing Ideas', 'Marketers have the exciting -- and often challenging -- task of generating a steady stream of creative campaign ideas for their companies or clients. One person alone can\'t come up with all the concepts and collateral needed for these campaigns, so marketing leaders rely on the diverse viewpoints and imaginations of their teams.\r\n\r\nHowever, it\'s not always easy to get everyone to share their brilliant ideas. Your introverted staff members may be less inclined to speak up during meetings, and sometimes people are stuck in creative ruts and need a little motivation. Here\'s what 15 Forbes Communications Council members recommend doing to encourage everyone on your team to bring their campaign ideas to the table.', 'admin/upload/9580077d99.jpg', 'Mou', '2019-11-05 12:31:18', 0),
(6, 'ggjhjhj', 'gggggggggg', 'admin/upload/06e3bb5971.png', 'mou', '2019-11-06 06:14:40', 0),
(7, 'web developer', 'gggggggggggguiiiiiiiiiiiiiiiiiiiiiiiiiihhhhhhhhhhhhhbbbbbbbbbbbbbbbbbbbbbbbvccccccccccccccccjkjlkj bjhkj kjoj szedgfh nbjjnk nmnl cfg j', 'admin/upload/67182aad1e.jpg', 'mou', '2019-11-06 15:01:32', 0),
(8, 'Software Engineer', 'sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'admin/upload/137e13b51c.jpg', 'mou', '2019-11-06 15:52:24', 0),
(9, 'dddddddddddddddddddddd', 'ddddddddddddd ffffffffkp;l mmmmmmmmmmmm mmmmmmmm', 'admin/upload/6c5788bed5.png', 'mouli', '2019-11-06 15:54:26', 0),
(10, 'tama', 'tama', 'admin/upload/9b4b230eef.jpg', 'tama', '2019-11-09 06:32:44', 0),
(11, 'funny post', 'Nov 21, 2018 - To create a column with \'false\' as the default value, we can use the concept of â€œdefaultâ€ at the time of creation of the table. Note âˆ’ 0 represents false and 1 represents true. Creating a table using â€œdefaultâ€ false. Inserting records with no value, since we have set â€œdefaultâ€ above.', 'admin/upload/43eacca702.jpg', 'tama', '2019-11-09 20:06:13', 0),
(12, 'funny post', 'Nov 21, 2018 - To create a column with \'false\' as the default value, we can use the concept of â€œdefaultâ€ at the time of creation of the table. Note âˆ’ 0 represents false and 1 represents true. Creating a table using â€œdefaultâ€ false. Inserting records with no value, since we have set â€œdefaultâ€ above.', 'admin/upload/ddc7c66150.jpg', 'tama', '2019-11-09 20:07:33', 0),
(13, 'Database Administrator', 'Nov 21, 2018 - To create a column with \'false\' as the default value, we can use the concept of â€œdefaultâ€ at the time of creation of the table. Note âˆ’ 0 represents false and 1 represents true. Creating a table using â€œdefaultâ€ false. Inserting records with no value, since we have set â€œdefaultâ€ above.', 'admin/upload/1106329e87.jpg', 'tama', '2019-11-09 20:07:57', 0),
(14, 'Database Administrator', 'Nov 21, 2018 - To create a column with \'false\' as the default value, we can use the concept of â€œdefaultâ€ at the time of creation of the table. Note âˆ’ 0 represents false and 1 represents true. Creating a table using â€œdefaultâ€ false. Inserting records with no value, since we have set â€œdefaultâ€ above.', 'admin/upload/61018efa72.jpg', 'tama', '2019-11-09 20:08:22', 0),
(15, 'Database Administrator', 'Nov 21, 2018 - To create a column with \'false\' as the default value, we can use the concept of â€œdefaultâ€ at the time of creation of the table. Note âˆ’ 0 represents false and 1 represents true. Creating a table using â€œdefaultâ€ false. Inserting records with no value, since we have set â€œdefaultâ€ above.', 'admin/upload/c269170a47.jpg', 'tama', '2019-11-09 20:08:41', 1),
(16, 'Database Administrator', 'Nov 21, 2018 - To create a column with \'false\' as the default value, we can use the concept of â€œdefaultâ€ at the time of creation of the table. Note âˆ’ 0 represents false and 1 represents true. Creating a table using â€œdefaultâ€ false. Inserting records with no value, since we have set â€œdefaultâ€ above.', 'admin/upload/4ac74c8ea3.jpg', 'tama', '2019-11-09 20:09:18', 0),
(17, 'Database Administrator', 'Nov 21, 2018 - To create a column with \'false\' as the default value, we can use the concept of â€œdefaultâ€ at the time of creation of the table. Note âˆ’ 0 represents false and 1 represents true. Creating a table using â€œdefaultâ€ false. Inserting records with no value, since we have set â€œdefaultâ€ above.', 'admin/upload/2dc5b3d940.jpg', 'tama', '2019-11-09 20:10:53', 0),
(18, 'Data Architect ', 'Nov 21, 2018 - To create a column with \'false\' as the default value, we can use the concept of â€œdefaultâ€ at the time of creation of the table. Note âˆ’ 0 represents false and 1 represents true. Creating a table using â€œdefaultâ€ false. Inserting records with no value, since we have set â€œdefaultâ€ above.', 'admin/upload/24ad69070b.jpg', 'mou', '2019-11-09 20:13:53', 1),
(19, 'IT Support Engineer', 'An IT Support Engineer monitors and maintains computer systems and networks. The role of the IT Engineer usually depends on the organizationâ€™s network configuration and needs. An IT engineer may be confined to just one team or assigned to multiple teams. In recent times, most organizations are dependent on computers for decision-making and operations. In these situations, it becomes crucial to have a professional IT engineer for the maintenance of client IT systems.\r\n\r\nThe IT Support Engineer is responsible for taking offer application and technical support to the users. They have to respond and resolve the support requests and service tickets. It is a part of their job to identify, diagnose and rectify any issues in computer hardware, software, services, and applications. The IT engineer should offer reactive and proactive support to business units and take into consideration the critical issues.\r\n\r\nThe professional should investigate the problems and recommend effective remedies for the prevention of problems. IT engineering involves assisting with troubleshooting technical issues and playing an important role in policy related end user issues, servers, storage, and networking technology. The engineer will look into the selection and installation of IT equipment and software. They need to handle security control and IT systems management.', 'admin/upload/04d63c4cc7.jpg', 'admin', '2019-11-17 14:55:07', 1),
(20, 'Web Designer', 'Try Wix\'s Website Design Tools, Designer-Made Templates & Top Customization Features. Wix Offers the Freedom You Need to Create Your Own Unique Online Look. Traffic generation tools. Easy drag nâ€™ drop. Customizable online store. SEO wizard. Custom domain name.', 'admin/upload/618f42afc7.jpg', 'mou', '2019-11-17 15:26:25', 1),
(21, 'web developer', 'Web developers are professionals who build attractive and functional websites. A professional and user-friendly website reflects a business that is trustworthy, relevant and client or consumer-centric. People make decisions about which products and services to buy based on information theyâ€™ve searched for online.\r\n\r\nThere are many templates available to set up your own website, but itâ€™s not foolproof. Unfortunately, a confusing or sloppily designed website negatively impacts your professional image and equates to losing out on business.\r\n\r\nWeb development is broad and includes a variety of aspects of building web applications and data management tools, to developing an ecommerce website. Web developers may specialize in one aspect, or be a â€˜full-stackâ€™ developer and work on all of them.\r\n\r\nA full-stack developer is all you need for a standard sized website with good functionality. If youâ€™re looking to improve or update a particular aspect of your website, a specialized developer can surpass expectations.\r\n\r\nWeb developers will ensure that your business or personal website works reliably and effortlessly. Furthermore, they can make your life easier by creating a user-friendly content management system to control your content. Youâ€™ll confidently promote your website, knowing that it reflects your brandâ€™s value, and reap the rewards.', 'admin/upload/7cb4acdb77.jpg', 'mouli', '2019-11-18 13:29:38', 1),
(22, '', 'anything', 'admin/upload/33b1baaa03.jpg', 'mou', '2019-11-19 08:21:27', 0),
(23, '', 'An alumnus (Latin pronunciation: [aËˆlÊŠmnÊŠs]; masculine) or an alumna ([aËˆlÊŠmna]; feminine) of a college, university, or other school is a former student who has either attended or graduated in some fashion from the institution. The word is Latin and simply means student. The plural is alumni [aËˆlÊŠmniË] for men and mixed groups and alumnae [aËˆlÊŠmnaeÌ¯] for women. The term is not synonymous with \"graduate\"; one can be an alumnus without graduating. (Burt Reynolds, alumnus but not graduate of Florida State, is an example.) An alumnus can also be and is more recently expanded to include a former employee of an organization[1] and it may also apply to a former member, contributor, or inmate.[2][3]', 'admin/upload/36b4160ce2.jpg', 'mouli', '2019-11-19 08:23:28', 0),
(24, '', 'An alumnus (Latin pronunciation: [aËˆlÊŠmnÊŠs]; masculine) or an alumna ([aËˆlÊŠmna]; feminine) of a college, university, or other school is a former student who has either attended or graduated in some fashion from the institution. The word is Latin and simply means student. The plural is alumni [aËˆlÊŠmniË] for men and mixed groups and alumnae [aËˆlÊŠmnaeÌ¯] for women. The term is not synonymous with \"graduate\"; one can be an alumnus without graduating. (Burt Reynolds, alumnus but not graduate of Florida State, is an example.) An alumnus can also be and is more recently expanded to include a former employee of an organization[1] and it may also apply to a former member, contributor, or inmate.[2][3]', 'admin/upload/7391b714dd.jpg', 'mouli', '2019-11-19 08:25:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_careerpage`
--

CREATE TABLE `tbl_careerpage` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_careerpage`
--

INSERT INTO `tbl_careerpage` (`id`, `image`, `title`, `body`) VALUES
(12, 'upload/cda647f786.jpg', 'Software Engineer', '<p>A software engineer is a person who applies the principles of software engineering to the design, development, maintenance, testing, and evaluation of computer software.</p>\r\n<p>Prior to the mid-1970s, software practitioners generally called themselves computer scientists, computer programmers or software developers, regardless of their actual jobs. Many people prefer to call themselves software developer and programmer, because most widely agree what these terms mean, while the exact meaning of software engineer is still being debated.</p>\r\n<p>How to beciome a Software Engineer</p>\r\n<p>1. Earn a degree in computer science or a related field. Most software engineer positions require a bachelor\'s degree.[1] Majoring in computer science will provide the most useful background for designing and perfecting software. Most often, interviewers will ask questions focusing on data structures and algorithms, so the theoretical background provided by traditional computer science degrees best prepares you for this. However, you will likely need to spend considerable time outside of the classroom writing software to learn how the theoretical concepts you\'re taught can apply in the practice of writing real software.<br />It is possible to get hired with an associate\'s degree or even with nothing but self-taught experience. Pursuing this route, you should have a strong collection of completed and functional projects demonstrating your skills on a website like Github. You can also pursue open source projects to contribute fixes and new features to in case you don\'t have a concept of your own. Open source means that the code (source) for a piece of software is publicly viewable (open). Often, this allows anyone to submit code to a project, pending approval of the project maintainers. Finding an open source project with a welcoming community of developers can greatly accelerate your skills after you\'ve established a baseline skillset.</p>\r\n<p>2<br />Begin programming. Even if you\'re still in grade school, you can give yourself a huge head start by teaching yourself programming.<br />Software engineering is not focused exclusively on coding, but you will need to know at least a couple languages, and a deeper understanding of how they function. There is no widespread agreement on which languages are most useful, but these are all popular choices:<br />Python<br />Ruby<br />JavaScript<br />C#<br />Java<br />C++<br />Be aware that some languages are better at solving some problems than others. No one language is better than another. No one language is objectively easier than another. Most languages were written with certain types of problems in mind and are better at solving them while weaker at solving others. Experiment and get a feel for your style. At first, only focus on getting the most basic of programs running in one language. Once you\'ve gotten comfortable with one, start experimenting with a second. There is no need to learn all languages. Find your niche and become awesome at it!<br />For youth, MIT (Massachusetts Institute of Technology) created the website and programming tool, Scratch. This tool teaches programming concepts using visual queues rather than intimidating text. It\'s also useful to adults who would feel more comfortable focusing on visual elements rather than abstract concepts and text.</p>\r\n<p>3<br />Study data structures and algorithms. \"Algorithm\" simply means a formula or process for solving a problem.[2] Common examples are path-finding for finding the shortest distance between two points[3], searching for finding a specific item of data in a large set of data, and sorting for arranging data in some order.[4][5] A \"data structure\" is a certain way of organizing data to make it easier to solve certain problems.[6] Common examples are arrays that simply contain items of data one after another in some order and hash tables that store data by some \"key\" instead of a position in a list.[7][8] Focus on developing and maintaining your skills in order to do your best once you\'ve obtained a position as a software engineer.[9]<br />(Optional) Study math. Mathematics will be a part of any computer science major, and many algorithms and data structures knowledge stems from mathematics. While not absolutely necessary, having a strong background in math will give you stronger core skills for analyzing and designing new algorithms. If you\'re targeting companies that do cutting-edge research and development, math will be a must. If you want a cushy corporate job, you can likely skim through higher level math.<br />Discrete mathematics is a particularly useful area of study, as is any math course that involves software.</p>'),
(13, 'upload/378e145ad8.jpg', 'Mobile App Developer', '<p>Mobile applications drive the modern world. Since the inception of smartphones, mobile apps have become the most significant focus of enterprises. This is the reason Mobile Applications Developers enjoy one of the highest paying computer science jobs. As a Mobile Applications Developer, you will be developing mainly Android or iPhone apps for consumers worldwide. This is one of the highest paying computer jobs you can apply for this year also.</p>\r\n<p>Requirements for this job</p>\r\n<p>Need to possess great networking and architectural skills.<br /> Should be familiar with commonly used smartphone application frameworks like Android Studio.<br /> Should be able to develop both native and hybrid mobile application alike.<br /> Need to be proficient in languages like Java, C#, Swift, and other commonly used tools.<br /> Should be able to adapt and migrate to newer tech stacks fast.</p>'),
(14, 'upload/e9d1206cc4.jpg', 'Network Engineer', '<p>Network engineers (also called network architects) plan, construct and manage networks to ensure they&rsquo;re optimized and functioning as intended.</p>\r\n<p>As a network engineer, you&rsquo;re responsible for the foundation of an organization&rsquo;s IT system (and by default, the entire organization).</p>\r\n<p>While network technicians or IT administrators assist with daily IT and troubleshooting tasks, network engineers take on the high-level challenge of designing and improving networks.</p>\r\n<p>Depending on the company, you&rsquo;ll be creating and implementing physical and wireless networks, troubleshooting issues and researching and integrating new technologies. Here are a few common networking career questions:</p>\r\n<p>Is networking a good career? Network engineering is a fast-growing occupation. The Bureau of Labor Statistics estimates that network engineer employment is projected to grow 6 percent from 2016 to 2026, above average for all occupations.<br /> How much do network engineers make? The national average salary for network engineers is above $72,000. Junior network engineers make around $64,000. The average salary for network analysts is $59,000.<br /> Experience level: Most network engineers have 5-10 years of experience.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

CREATE TABLE `tbl_catagory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`id`, `name`) VALUES
(10, 'Programming'),
(11, 'Introduction to Computer'),
(12, 'Electeronics 1 / Circuit 1'),
(13, 'Electeronics 2 / Circuit 2'),
(14, 'Professional Ethics'),
(15, 'Physics'),
(16, 'Chemistry');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`, `active`) VALUES
(24, 15, 'getting problem in physics', 'Physics is the natural science that studies matter, its motion and behavior through space and time, and that studies the related entities of energy and force. Physics is one of the most fundamental scientific disciplines, and its main goal is to understand how the universe behaves', 'upload/791e7748dd.jpg', 'mou', 'physics', '2019-11-14 10:54:32', 1),
(25, 15, 'getting problem in physics', 'Physics is the natural science that studies matter, its motion and behavior through space and time, and that studies the related entities of energy and force. Physics is one of the most fundamental scientific disciplines, and its main goal is to understand how the universe behaves', '', 'mou', 'physics', '2019-11-14 10:58:41', 1),
(26, 12, 'electronics', 'In the diagram below, the three resistors are now connected in parallel with each other. The current in the wire coming from the battery must split three ways to pass through each parallel resistor. ... However, the sum of the currents passing through each resistor must equal the total current passing through the battery.', '', 'mouli', 'circuit 1', '2019-11-14 11:00:05', 0),
(27, 12, 'Electronics circuit 1', 'Engineering requires many building blocks and tools. To produce real world results, one must practically apply mathematics and sciences to tangible problems and scenarios. Included in this category are the various technical topics which cut across engineering disciplines, encompassing many branches of mathematics and scientific disciplines.\r\n\r\nSTARS Articles\r\nSTARS articles are peer-reviewed articles on the history of major developments in technology. Available in the scientific tools and discovery category are:\r\n\r\nMaxwell\'s Equations\r\nScanning Probe Microscopy\r\nSubcategories\r\nAcoustics - The science of waves, subcategories include acoustic propagation, biomedical acoustics and nonlinear acoustics\r\nDesign methodology - Topics that pertain to design and creation, including critical thinking methods, sustainability and articulation.\r\nDistillation - The process of purification of liquids\r\nFields, waves & electromagnetics - The relationship between magnetic and electrical fields that provides the foundational theory of electrical engineering\r\nInstrumentation - Topics relating to devices used for measurement, such as oscilloscopes and probes\r\nKinetics & catalysis - Various topics of energy related to applications in physics and chemistry\r\nLasers, lighting & electrooptics - Topics relating to electric lighting, lasers and photonics\r\nMathematics - Mathematics such as calculus, algebra, and numerical analysis are all essential components of engineering\r\nMeasurement - Related to instrumentation, measurements of various quantities has many real world applications\r\nMixing - The combination of multiple materials to form a homogeneous solution\r\nParticle technology & fluidization - Sciences dealing with particulates and fluids\r\nProcess development - Disciplines related to the optimization of various engineering and scientific processes\r\nReaction engineering - Chemistry related topics dealing with the engineering of various reactions\r\nReliability - The ability of a system or component to perform its required functions under stated conditions for a specified period of time\r\nScientific disciplines - Various non-engineering scientific disciplines such as physics, chemistry, biology and astronomy\r\nSeparations - Topics in chemistry related to the separation of materials into distinct substances\r\nSystems engineering and theory - An interdisciplinary method to engineering which has practical uses in complex projects which span multiple fields\r\nThermodynamics - a physical science that studies that effects on material bodies of transfer of heat and work\r\nTransport and fluid mechanics - Topics concerning the mass and energy exchange between systems', '', 'sushmita', 'circuit 1', '2019-11-14 15:27:27', 0),
(29, 10, 'web developer', 'rrrytuyuyccccccccccccccccccccccccccccc', 'admin/upload/f3f16388c7.jpg', 'mou', 'php', '2019-11-20 07:26:26', 1),
(0, 10, 'How to be expert in programming..', 'hhhh', 'admin/upload/5fe8b25c4f.jpg', 'hhh', 'hhh', '2019-12-20 08:18:52', 1),
(0, 11, 'How to be expert in programming..', 'hi hello', 'admin/upload/73e68054d5.jpg', 'hhh', 'sfsdf', '2019-12-20 08:34:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skill`
--

CREATE TABLE `tbl_skill` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percentage` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_skill`
--

INSERT INTO `tbl_skill` (`id`, `user_id`, `name`, `percentage`) VALUES
(1, 8, 'PHP', 90),
(3, 12, 'PHP', 90),
(4, 8, 'Java S', 60),
(5, 8, 'HTML', 70),
(6, 8, 'JS', 85),
(7, 25, 'php', 50),
(8, 25, 'html', 90),
(9, 30, 'php', 60),
(10, 31, 'php', 90),
(11, 31, 'html', 90),
(12, 33, 'php', 60);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_id`
--

CREATE TABLE `tbl_student_id` (
  `id` int(11) NOT NULL,
  `std_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_id`
--

INSERT INTO `tbl_student_id` (`id`, `std_id`) VALUES
(2, '1612020001'),
(3, '1612020002'),
(4, '1612020003'),
(5, '1612020004'),
(6, '1612020005'),
(7, '1612020010');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70'),
(2, 'mouli', '6950aac2d7932e1f1a4c3cf6ada1316e');

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Our title', 'Our slogan', 'upload/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `user2`
--

CREATE TABLE `user2` (
  `id` int(11) NOT NULL,
  `std_id` int(20) NOT NULL,
  `user_name` varchar(33) NOT NULL,
  `password` varchar(33) NOT NULL,
  `occupation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user2`
--

INSERT INTO `user2` (`id`, `std_id`, `user_name`, `password`, `occupation`) VALUES
(1, 0, 'tama', 'tama', ''),
(2, 0, 'puspi', '9446381cb43764f42c9a69a6d2a09987', ''),
(3, 0, 'puspi', '9446381cb43764f42c9a69a6d2a09987', ''),
(4, 0, 'tama2', 'ff29df8ebff3f5de06e86e84c75bdad5', ''),
(5, 0, 'piyan', 'd58f238da138d352026610bbf84b9e64', ''),
(6, 0, 'rumpa', '78168ac6e8d5a4b31a2f838c6af7e718', ''),
(7, 0, 'ayesha', 'cec9818936add98229817fb432540b18', ''),
(8, 12, 'adi', 'c46335eb267e2e1cde5b017acb4cd799', ''),
(9, 1612020011, 'tama22', 'd197d8269dab744135c66c19a3a470ac', ''),
(10, 1612020010, 'tiya', '6a9256f715db66fca7daffcd48aaccf5', ''),
(11, 1612020001, 'pappu', 'd13fe0a49db0ea88fe97488f6713719c', ''),
(12, 0, 'niloy', '4bc66266b4b908b8657fad3e889e54ff', ''),
(13, 0, 'gourab', 'b7af8d441ff8f59d3b37846f0f03871f', ''),
(14, 1612020009, 'gourab', 'b7af8d441ff8f59d3b37846f0f03871f', 'Student'),
(15, 1612020005, 'tonni', 'b06f4f189208af2eb96e850c97e13bdc', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `std_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `name`, `email`, `website`, `username`, `occupation`, `phone`, `image`, `std_id`) VALUES
(7, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Justin Doyle', 'focamezi@mailinator.com', NULL, 'kituluciri', NULL, NULL, NULL, 0),
(8, '827ccb0eea8a706c4c34a16891f84e7b', 'Sumon', 'csesumonpro@gmail.com', 'https://www.guwozalafeke.net', 'csesumonpro', 'Student', '+8801611606484', 'img/9544869d8d.jpg', 0),
(9, '827ccb0eea8a706c4c34a16891f84e7b', 'sss', 'sss@gmail.com', 'dasdsad', 'sss', 'atd', '234324234', 'img/8579bde441.jfif', 0),
(10, '827ccb0eea8a706c4c34a16891f84e7b', 'gggg', 'gg@gmail.com', 'fsdfesdfsdf', 'gggggghgggg', 'atds', '4324324', 'img/71f0577be8.jfif', 456467567),
(11, '827ccb0eea8a706c4c34a16891f84e7b', 'yyy', 'yyy@gmail.com', 'fsdfesdfsdf', 'yyy', 'Student', '4324324', 'img/0bf2e5300c.jfif', 12345),
(12, 'ff29df8ebff3f5de06e86e84c75bdad5', 'tama', 'tama', 'fsdfesdfsdf', 'tama', 'Student', '4324324', 'img/3890be3ca8.', 1612),
(25, '12d2f20718abf7394dc4acff0ac19a0b', 'Puspita Goswami', 'puspita', 'iiiji', 'puspita', 'Student', '01799202720', 'img/24f0984b25.jpg', 12),
(26, '407b056f5e6197a948b7f836567fb63d', 'tama', 'sss@gmail.com', NULL, 'tama', NULL, NULL, NULL, 12),
(27, '407b056f5e6197a948b7f836567fb63d', 'tama', 'tama', NULL, 'puspita', NULL, NULL, NULL, 12),
(28, '407b056f5e6197a948b7f836567fb63d', 'tama', 'tama', NULL, 'tama', NULL, NULL, NULL, 12),
(29, 'd58f238da138d352026610bbf84b9e64', 'piyan', 'piyan', 'Sylhet', 'Piyan', 'Student', '123', 'img/24718a9581.jpg', 123),
(30, '534b9a3588bdd87bf7c3b9d650e43e46', 'pu', 'pu', 'jiji', 'pu', 'Student', '1212', 'img/8844be11de.jfif', 4545),
(31, '49d02d55ad10973b7b9d0dc9eba7fdf0', 'tiya', 'tiya@yahoo.com', NULL, 'tiya', NULL, NULL, NULL, 1234),
(32, '49f68a5c8493ec2c0bf489821c21fc3b', 'hi', 'hi@gmail.com', NULL, 'hi', NULL, NULL, NULL, 161202001),
(33, '4124bc0a9335c27f086f24ba207a4912', 'aa', 'aa@gmail.com', NULL, 'aa', NULL, NULL, NULL, 1212);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_skill`
--
ALTER TABLE `tbl_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_id`
--
ALTER TABLE `tbl_student_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user2`
--
ALTER TABLE `user2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_skill`
--
ALTER TABLE `tbl_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_student_id`
--
ALTER TABLE `tbl_student_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user2`
--
ALTER TABLE `user2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
