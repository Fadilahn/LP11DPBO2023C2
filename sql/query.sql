CREATE DATABASE db_uas;

USE db_uas;

CREATE TABLE penyakit (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100)
);

CREATE TABLE pasien (
    id INT(10) PRIMARY KEY AUTO_INCREMENT,
    nik VARCHAR(20),
    nama VARCHAR(100),
    tempat_lahir VARCHAR(50),
    tanggal_lahir DATE,
    gender VARCHAR(20),
    email VARCHAR(100),
    telp VARCHAR(20),
    foto VARCHAR(100),
    id_penyakit INT(10),
    FOREIGN KEY (id_penyakit) REFERENCES penyakit(id)
);

-- Menambahkan data penyakit
INSERT INTO penyakit (nama)
VALUES
    ('Flu'),
    ('Demam'),
    ('Hipertensi'),
    ('Diabetes'),
    ('Asma'),
    ('Migrain'),
    ('Gastritis'),
    ('Kolesterol tinggi'),
    ('Kanker'),
    ('Anemia');


-- Menambahkan data pasien
INSERT INTO pasien (nik, nama, tempat_lahir, tanggal_lahir, gender, email, telp, foto, id_penyakit)
VALUES
    ('1234567890', 'Bambang', 'Jakarta', '1990-01-01', 'L', 'just@example.com', '081234567890', 'image.jpg', 1),
    ('9876543210', 'Sukijah', 'Surabaya', '1992-05-10', 'P', 'just@example.com', '082345678901', 'image.jpg', 2),
    ('4567890123', 'Asep', 'Bandung', '1988-07-15', 'L', 'just@example.com', '083456789012', 'image.jpg', 3),
    ('7890123456', 'Kamis bin senin', 'Medan', '1995-03-20', 'P', 'just@example.com', '084567890123', 'image.jpg', 4),
    ('2345678901', 'Bingung', 'Yogyakarta', '1993-11-28', 'L', 'just@example.com', '085678901234', 'image.jpg', 5);

