### INIT

> first : create database named `'phpcrud'`
then input SQL query

> __SQL table tbbiodata__
```
CREATE TABLE IF NOT EXISTS `tbBiodata` (  
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `hp` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
```

>__SQL table TBBIODATA__
```
INSERT INTO `tbBiodata`(`id`, `nama`, `alamat`, `hp`) VALUES  
(1,'John Doe','Jl. DI Pandjaitan No. 128','086545654687'),
(2,'Joni Subarjo','Jl. Mawar No. 29','08767565665'),
(3,'Jokowi','Jl. Kenanga No. 33','0554454545'),
(4,'Slamet','Jl. Slamet No. 1','0765566565'),
(5,'Mike Portnoy','Jl. Sidaurip No. 22','0855665666')
```

>__SQL table TBLOGIN__
```
CREATE TABLE IF NOT EXISTS `tbLogin` (  
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
```
