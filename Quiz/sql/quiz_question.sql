-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2020 at 10:56 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `que_id` int(5) NOT NULL,
  `test_id` int(5) DEFAULT NULL,
  `que_desc` varchar(250) DEFAULT NULL,
  `ans1` varchar(275) DEFAULT NULL,
  `ans2` varchar(275) DEFAULT NULL,
  `ans3` varchar(275) DEFAULT NULL,
  `ans4` varchar(275) DEFAULT NULL,
  `true_ans` int(1) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`que_id`, `test_id`, `que_desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`, `date`) VALUES
(1, 1, 'Destructor has the same name as the constructor and it is preceded by ______ .', '!', '?', '~', '$', 3, '2020-07-10 05:10:26'),
(2, 1, 'Which of the following statement is incorrect?', 'Default arguments can be provided for pointers to functions.', 'Default argument cannot be provided for pointers to functions.', 'A function can have all its arguments as default.', 'A default argument cannot be redefined in later declaration.', 2, '2020-07-10 05:14:26'),
(3, 1, 'A union that has no constructor can be initialized with another union of __________ type.', 'different', 'virtual', 'same', 'class', 3, '2020-07-10 05:18:26'),
(4, 1, 'What will happen if a class is not having any name?', 'It cannot have a destructor.', 'It is not allowed.', 'It cannot have a constructor.', 'Both A and B.', 4, '2020-07-10 05:22:26'),
(5, 1, 'Which of the following keyword is used to overload an operator?', 'overload', 'friend', 'operator', 'override', 3, '2020-07-10 05:26:26'),
(6, 2, 'Which of the following access specifies is used in a class definition by default?', 'Private', 'Protected', 'Public', 'Friend', 1, '2020-07-10 05:30:26'),
(7, 2, 'Which of the following function declaration is/are incorrect?', 'int Sum(int a, int b = 2, int c = 3);', 'int Sum(int a = 0, int b, int c = 3);', 'int Sum(int a = 5, int b);', 'Both B and C are incorrect.', 4, '2020-07-10 05:34:26'),
(8, 2, 'Which constructor function is designed to copy objects of the same class type?', 'Create constructor', 'Dynamic constructor', 'Object constructor', 'Copy constructor', 4, '2020-07-10 05:36:26'),
(9, 2, 'How many objects can be created from an abstract class?', 'Zero', 'Two', 'One', 'As many as we want', 1, '2020-07-10 05:40:26'),
(10, 2, 'It is a __________ error to pass arguments to a destructor.', 'logical', 'syntax', 'virtual', 'linker', 2, '2020-07-10 05:43:26'),
(11, 3, 'A reference is declared using the _____ symbol.', '&&', '||', '&', '!', 3, '2020-07-10 05:46:26'),
(12, 3, 'Which of the following header file includes definition of cin and cout?', 'istream.h', 'iomanip.h', 'ostream.h', 'iostream.h', 4, '2020-07-10 05:49:26'),
(13, 3, 'Which of the following keywords is used to control access to a class member?', 'Default', 'Protected', 'Break', 'Asm', 2, '2020-07-10 05:52:26'),
(14, 3, 'Which one of the following is the correct way to declare a pure virtual function?', 'virtual void Display(void){0};', 'virtual void Display(void) = 0;', 'virtual void Display = 0;', 'void Display(void) = 0;', 2, '2020-07-10 05:55:26'),
(15, 3, 'Which of the following type of data member can be shared by all instances of its class?', 'Public', 'Static', 'Inherited', 'Friend', 2, '2020-07-10 05:56:26'),
(16, 5, 'Which method must be defined by a class implementing the java.lang.Runnable interface?', 'void run()', 'public void start()', 'public void run()', 'void run(int priority)', 3, '2020-07-10 05:58:26'),
(17, 5, 'Which is a valid keyword in java?', 'interface', 'float', 'string', 'unsigned', 1, '2020-07-10 06:02:26'),
(18, 5, 'What is the name of the method used to start a thread execution?', 'init();', 'run();', 'start();', 'resume();', 3, '2020-07-10 06:05:26'),
(19, 5, 'Which method registers a thread in a thread scheduler?', 'run();', 'start();', 'construct();', 'register();', 2, '2020-07-10 06:08:26'),
(20, 5, 'Which of the following will directly stop the execution of a Thread?', 'wait()', 'notifyall()', 'notify()', 'exits synchronized code', 1, '2020-07-10 06:11:26'),
(21, 6, 'Which of the following will not directly cause a thread to stop?', 'notify()', 'sleep()', 'wait()', 'all the above', 1, '2020-07-10 06:14:26'),
(22, 6, 'Which is a reserved word in the Java programming language?', 'method', 'subclasses', 'native', 'array', 3, '2020-07-10 06:18:26'),
(23, 6, 'Which cannot directly cause a thread to stop executing?', 'Calling the SetPriority() method on a Thread object.', 'Calling notify() method on an object.', 'Calling the wait() method on an object.', 'Calling read() method on an InputStream object.', 2, '2020-07-10 06:25:26'),
(24, 6, 'Which is true about a method-local inner class?', 'It must be marked final.', 'It can be marked public.', 'It can be marked abstract.', 'It can be marked static.', 3, '2020-07-10 06:28:26'),
(25, 6, 'Which interface provides the capability to store objects using a key-value pair?', 'Java.util.Map', 'Java.util.List', 'Java.util.Set', 'Java.util.Collection', 1, '2020-07-10 06:31:26'),
(26, 8, 'What is the maximum data rate for the 802.11g standard?', '6Mbps', '22Mbps', '11Mbps', '54Mbps', 4, '2020-07-10 06:34:26'),
(27, 8, 'Which command will show you all the translations active on your router?', 'show ip nat translations', 'debug ip nat', 'show ip nat statistics', 'clear ip nat translations*', 1, '2020-07-10 06:38:26'),
(28, 8, 'Which of the following is considered to be the destination host before translation?', 'Inside local', 'Inside global', 'Outside local', 'Outside global', 3, '2020-07-10 06:42:26'),
(29, 8, 'To back up an IOS, what command will you use?', 'backup IOS disk', 'copy tftp flash', 'copy ios tftp', 'copy flash tftp', 4, '2020-07-10 06:45:26'),
(30, 8, 'Which of the following is the decimal and hexadecimal equivalents of the binary number 10011101?', '155, 0x9B', '159, 0x9F', '157, 0x9D', '185, 0xB9', 3, '2020-07-10 06:47:26'),
(31, 9, 'What is the frequency range of the IEEE 802.11a standard?', '2.4Gbps', '2.4GHz', '5Gbps', '5GHz', 4, '2020-07-10 06:51:26'),
(32, 9, 'Which command will allow you to see real-time translations on your router?', 'show ip nat translations', 'debug ip nat', 'show ip nat statistics', 'clear ip nat translations *', 2, '2020-07-10 06:54:26'),
(33, 9, 'How many non-overlapping channels are available with 802.11h?', '3', '23', '12', '40', 2, '2020-07-10 06:58:26'),
(34, 9, 'Which of the following commands sets a trunk port on a 2960 switch?', 'trunk on', 'switchport trunk on', 'trunk all', 'switchport mode trunk', 4, '2020-07-10 07:01:26'),
(35, 9, 'What protocol is used to find the hardware address of a local device?', 'RARP', 'IP', 'ARP', 'ICMP', 3, '2020-07-10 07:07:26'),
(36, 11, 'What is (void*)0?', 'Representation of NULL pointer', 'Error', 'Representation of void pointer', 'None of above', 1, '2020-07-10 07:09:26'),
(37, 11, 'In which header file is the NULL macro defined?', 'stdio.h', 'stdio.h and stddef.h', 'stddef.h', 'math.h', 2, '2020-07-10 07:012:26'),
(38, 11, 'What do the following declaration signify? char *scr;', 'scr is a pointer to pointer variable.', 'scr is a pointer to char.', 'scr is a function pointer.', 'scr is a member of function pointer.', 2, '2020-07-10 07:15:26'),
(39, 11, 'What do the following declaration signify?  int *f();', 'f is a pointer variable of function type.', 'f is a function pointer.', 'f is a function returning pointer to an int.', 'f is a simple declaration of pointer variable.', 3, '2020-07-10 07:18:26'),
(40, 11, 'The operator used to get value at address stored in a pointer variable is', '*', '!!', '&&', '$$', 1, '2020-07-10 07:20:26'),
(41, 12, 'What do the following declaration signify? int *ptr[30];', 'ptr is a pointer to an array of 30 integer pointers.', 'ptr is a array of 30 integer pointers.', 'ptr is a array of 30 pointers to integers.', 'ptr is a array 30 pointers.', 3, '2020-07-10 07:23:26'),
(42, 12, 'What do the following declaration signify? void (*cmp)();', 'cmp is a pointer to an void function type.', 'cmp is a function that return a void pointer.', 'cmp is a void type pointer function.', 'cmp is a pointer to a function which returns void.', 4, '2020-07-10 07:26:26'),
(43, 12, 'In C, if you pass an array as an argument to a function, what actually gets passed?', 'Value of elements in array', 'Base address of the array', 'First element of the array', 'Address of the last element of array', 2, '2020-07-10 07:28:26'),
(44, 12, 'What does the following declaration mean? int (*ptr)[10];', 'ptr is array of pointers to 10 integers', 'ptr is an array of 10 integers', 'ptr is a pointer to an array of 10 integers', 'ptr is an pointer to array', 3, '2020-07-10 07:31:26'),
(45, 12, 'How many bytes are occupied by near, far and huge pointers (DOS)?', 'near=2 far=4 huge=4', 'near=2 far=4 huge=8', 'near=4 far=8 huge=8', 'near=4 far=4 huge=8', 1, '2020-07-10 07:36:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`que_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `que_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
