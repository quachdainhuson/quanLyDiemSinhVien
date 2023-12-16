<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qldsv_db";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
    exit(1);
}

// Close the connection to the default database
$conn->close();

// Connect to the created database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL statements for table creation
$sql = "
CREATE TABLE `tbl_sinhvien` (
  `msv` varchar(255) PRIMARY KEY,
  `holot` integer,
  `ten` varchar(255),
  `sodidong` varchar(255),
  `email` varchar(255),
  `mlcn` varchar(255)
);

CREATE TABLE `tbl_lopchuyennganh` (
  `mlcn` varchar(255) PRIMARY KEY,
  `tenlop` varchar(255),
  `nienkhoa` varchar(255),
  `siso` integer,
  `mk` varchar(255)
);

CREATE TABLE `tbl_diemhocphan` (
  `msv` varchar(255),
  `mhp` varchar(255),
  `a` integer,
  `b` integer,
  `c` varchar(255),
  PRIMARY KEY (`msv`, `mhp`)
);

CREATE TABLE `tbl_hocphan` (
  `mhp` varchar(255) PRIMARY KEY,
  `tenhocphan` varchar(255),
  `tinchi` integer
);

CREATE TABLE `tbl_khoa` (
  `mk` varchar(255) PRIMARY KEY,
  `ten_khoa` varchar(255),
  `dien_thoai` varchar(255)
);

CREATE TABLE `tbl_lophocphan` (
  `mlcn` varchar(255),
  `mhp` varchar(255),
  `nhom` varchar(255),
  `hocki` varchar(255),
  `namhoc` varchar(255),
  PRIMARY KEY (`mlcn`, `mhp`)
);

ALTER TABLE `tbl_diemhocphan` ADD FOREIGN KEY (`msv`) REFERENCES `tbl_sinhvien` (`msv`);

ALTER TABLE `tbl_sinhvien` ADD FOREIGN KEY (`mlcn`) REFERENCES `tbl_lopchuyennganh` (`mlcn`);

ALTER TABLE `tbl_diemhocphan` ADD FOREIGN KEY (`mhp`) REFERENCES `tbl_hocphan` (`mhp`);

ALTER TABLE `tbl_lophocphan` ADD FOREIGN KEY (`mhp`) REFERENCES `tbl_hocphan` (`mhp`);

ALTER TABLE `tbl_lophocphan` ADD FOREIGN KEY (`mlcn`) REFERENCES `tbl_lopchuyennganh` (`mlcn`);

ALTER TABLE `tbl_lopchuyennganh` ADD FOREIGN KEY (`mk`) REFERENCES `tbl_khoa` (`mk`);
";

// Execute multi-query
if ($conn->multi_query($sql) === TRUE) {
    echo "Tables created successfully\n";
} else {
    echo "Error creating tables: " . $conn->error . "\n";
}

// Close the connection
$conn->close();
?>
