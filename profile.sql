CREATE TABLE profiles(
    idProfiles int(11) AUTO_INCREMENT PRIMARY KEY,
    idUsers int(11),
    uidUsers varchar(128),
    pictureProfiles blob,
    coverProfiles blob,
    bioProfiles varchar(200),
    FOREIGN KEY (idUsers) REFERENCES users(idUsers),
    FOREIGN KEY (uidUsers) REFERENCES users(uidUsers)
);