-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 10 Ekim 2010 saat 17:58:19
-- Sunucu sürümü: 5.0.51
-- PHP Sürümü: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `sifre`
--

-- --------------------------------------------------------

--
-- Tablo yapısı: `sifre`
--

CREATE TABLE IF NOT EXISTS `sifre` (
  `id` int(11) NOT NULL auto_increment,
  `url` text NOT NULL,
  `email` varchar(225) NOT NULL,
  `kadi` varchar(225) NOT NULL,
  `sifre` varchar(225) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;
