CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255),
  email VARCHAR(255),
  password VARCHAR(255),
  role ENUM('patient', 'doctor')
);

CREATE TABLE appointments (
  id INT PRIMARY KEY AUTO_INCREMENT,
  patient_id INT,
  doctor_id INT,
  appointment_date DATE,
  appointment_time TIME,
  FOREIGN KEY (patient_id) REFERENCES users(id),
  FOREIGN KEY (doctor_id) REFERENCES users(id)
);

CREATE TABLE payments (
  id INT PRIMARY KEY AUTO_INCREMENT,
  appointment_id INT,
  payment_method VARCHAR(255),
  payment_status VARCHAR(255),
  FOREIGN KEY (appointment_id) REFERENCES appointments(id)
);

CREATE TABLE telemedicine_sessions (
  id INT PRIMARY KEY AUTO_INCREMENT,
  appointment_id INT,
  session_start_time DATETIME,
  session_end_time DATETIME,
  FOREIGN KEY (appointment_id) REFERENCES appointments(id)
);