-- la creation du table course 
CREATE TABLE course( course_id int PRIMARY KEY AUTO_INCREMENT, title varchar(50), description varchar(255), niveu ENUM('Débutant', 'Intermédiaire', 'Avancé') NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP );
-- la creation du table sections 
CREATE TABLE sections( id_section int PRIMARY KEY AUTO_INCREMENT, course_id int , title_section varchar(50), content_section text, FOREIGN KEY(course_id) REFERENCES course(course_id) ON UPDATE CASCADE ON DELETE CASCADE );
-- l'ajout de deux colones dans le tableau sections
ALTER TABLE sections ADD position int, ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP;
--  l'insertion dans le tableau  et sections 
INSERT INTO `course` (`course_id`, `title`, `description`, `niveu`, `created_at`) VALUES (NULL, 'php', 'php description', 'Débutant', current_timestamp());
    -- partie sections
 $sections_titles = $_POST["SectionTitle"];
                    $sections_content = $_POST["content"];
                    $sections_position = $_POST["position"];
                    $count = count($sections_titles);
                    $stmt = $conn->prepare("INSERT INTO sections (course_id,title_section,content_section,position) VALUES(?,?,?,?)");
                    $stmt->bind_param("issi", $last_Id, $title, $content, $position);
                    for ($i = 0; $i < $count; $i++) {
                        $title = $sections_titles[$i];
                        $content = $sections_content[$i];
                        $position = $sections_position[$i];
                        if (!empty($title)) {
                            $stmt->execute();
                        }
                    }
                    $stmt->close();
-- l'edit d'un course
 $sql=$conn->prepare("UPDATE course set
    title=?,
    description=?,
    niveu=?
    where course_id=?
    ");
   $sql->bind_param("sssi", $title, $description, $level, $id);
    $sql->execute();
    $sql->close();

-- Supprimer un cours
$sql = "DELETE FROM course where course_id='$id'";


--  Brief 2
    -- Tableau users
CREATE TABLE users(
	id int PRIMARY KEY AUTO_INCREMENT ,
    userName varchar(100),
    email varchar(255),
    password varchar(255)
)
    -- tableau enrollements for relation many to many
CREATE TABLE enrollments(
    courseId int ,
    userId int ,
    PRIMARY KEY(courseId,userId),
    FOREIGN KEY (courseId) REFERENCES course(course_id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (userId) REFERENCES users(Id) ON UPDATE CASCADE ON DELETE CASCADE,
    enrolled_at DATETIME DEFAULT CURRENT_TIMESTAMP
)


-- 
SELECT courseId,COUNT(userId) FROM enrollments 
GROUP BY courseId;