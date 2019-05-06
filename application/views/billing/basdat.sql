-- No 1
DELIMITER //
CREATE OR REPLACE PROCEDURE p_view_admin()
BEGIN
SELECT b.id_billing, u.username, b.duration_first, b.duration_last, b.email, b.name, p.name, p.price
FROM billing b JOIN users u
ON(b.user_id = u.user_id)
JOIN package p
ON(b.id_package = p.id_package)
GROUP BY b.id_billing;
END;//
DELIMITER ;

CALL p_view_admin();

-- No 2
DELIMITER //
CREATE OR REPLACE PROCEDURE p_view_user()
BEGIN
SELECT*FROM billing;
END;//
DELIMITER ;

CALL p_view_user()




DELIMITER //
CREATE OR REPLACE PROCEDURE input_billing(
	v_user_id VARCHAR(255),
	v_id_package VARCHAR(255),
	v_duration_first Varchar(255),
	v_duration_last varchar(255),
	v_email VARCHAR(255),
	v_name VARCHAR(255),
	v_status VARCHAR(255),
	v_status_install VARCHAR(255)
)
BEGIN
INSERT INTO billing(
	`user_id`, 
	`id_package`, 
	`duration_first`, 
	`duration_last`, 
	`email`, 
	`name`,
	`status`, 
	`status_install`
) VALUES (
	v_user_id,
	v_id_package,
	v_duration_first,
	v_duration_last,
	v_email,
	v_name,
	v_status,
	v_status_install
);
END//
DELIMITER ;

 CALL input_billing(  '2', '4', '2019-05-14', '2019-05-15', 'Adejelek@gmail.com', 'ade jelek banget', '2', '1');






DELIMITER //
CREATE OR REPLACE FUNCTION tgl(`tgl` VARCHAR(191))
RETURNS varchar(191) DETERMINISTIC
BEGIN
         RETURN(date_format(tgl, '%d %M %Y'));
END;//
DELIMITER ;

SELECT tgl(duration_first),duration_first FROM billing;








DELIMITER //
CREATE OR REPLACE PROCEDURE viewadmin(uid INT (11))
BEGIN 
DECLARE duration_firstt, duration_lastt date DEFAULT '';
DECLARE emaill varchar(255) DEFAULT '';
DECLARE namee VARCHAR(255) DEFAULT '';
DECLARE selesai,no INT DEFAULT 0;
DECLARE hasil TEXT DEFAULT '';
DECLARE cdata CURSOR FOR
	SELECT duration_first, duration_last ,email,name
	FROM billing
	WHERE user_id = uid;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET selesai = 1;

SET hasil = CONCAT(RPAD('NO',5,' '),'|',RPAD('Duration First',25,' '),'|',RPAD('Duration Last',25,' '),'|',RPAD('Email',20,' '),'|',RPAD('Name',25,' '),'|','\n');
OPEN cdata;
	databilling: LOOP
		FETCH cdata INTO duration_firstt,duration_lastt,emaill,namee;
		IF selesai = 1 THEN
	LEAVE databilling;
END IF;
SET no = no+1;
SET hasil = CONCAT(hasil,RPAD(no,5,' '),'|',RPAD(duration_firstt,25,' '),'|',RPAD(duration_lastt,25,' '),'|',RPAD(emaill,20,' '),'|',RPAD(namee,25,' '),'|','\n');
END LOOP databilling;
CLOSE cdata;
SELECT hasil;
END; //
DELIMITER ;

CALL viewadmin(2);
