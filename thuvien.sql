CREATE TABLE Books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL,
    year INT NOT NULL,
    quantity INT NOT NULL CHECK (quantity >= 0)
);

CREATE TABLE Readers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    birthday DATE NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL
);

CREATE TABLE Borrows (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reader_id INT NOT NULL,
    book_id INT NOT NULL,
    borrow_date DATE NOT NULL,
    return_date DATE,
    status ENUM('borrowed', 'returned') NOT NULL,
    FOREIGN KEY (reader_id) REFERENCES Readers(id),
    FOREIGN KEY (book_id) REFERENCES Books(id),
    CHECK (return_date IS NULL OR return_date >= borrow_date)
);
library_managementbooks