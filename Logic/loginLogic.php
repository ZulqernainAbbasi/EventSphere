<?php

include("../Database/Database.php");
session_start();

class Login extends Database {
    private $email;
    private $password;

    public function __construct($email, $password) {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
    }

    public function authenticate() {
        $statement = $this->connection->prepare("SELECT * FROM users WHERE email = ?");
        $statement->bind_param("s", $this->email);
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($this->password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];

                switch ($user['role']) {
                    case 'Participant':
                        header("Location: ../Participant/dashboard.php");
                        break;
                    case 'Organizer':
                        header("Location: ../Organizer/dashboard.php");
                        break;
                }
                exit;
            }
        }
        return false;
    }
}

class SignUp extends Database {
    private $name;
    private $email;
    private $password;
    private $confirmPassword;
    private $profilePicture;
    private $shortBio;
    private $role;

    public function __construct($name, $email, $password, $confirmPassword, $profilePicture, $shortBio, $role) {
        parent::__construct();
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->profilePicture = $profilePicture;
        $this->shortBio = $shortBio;
        $this->role = strtolower($role);
    }

    public function register() {
        if ($this->password != $this->confirmPassword) {
            return "Passwords do not match";
        }

        // Check if email already exists
        $checkStatement = $this->connection->prepare("SELECT id FROM users WHERE email = ?");
        $checkStatement->bind_param("s", $this->email);
        $checkStatement->execute();
        $checkStatement->store_result();
        if ($checkStatement->num_rows > 0) {
            return "Email already exists";
        }

        // Handle profile picture upload
        $profilePicName = "";
        if (!empty($this->profilePicture['name'])) {
            $imgname = basename($this->profilePicture['name']);
            $folder = "../images/" . $imgname;
            $loc = $this->profilePicture['tmp_name'];

            if (!is_dir("../images")) {
                mkdir("../images", 0777, true);
            }

            if (move_uploaded_file($loc, $folder)) {
                $profilePicName = $imgname;
            } else {
                return "Failed to upload profile picture";
            }
        }

        // Hash password
        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);

        // Insert user
        $insertStatement = $this->connection->prepare(
            "INSERT INTO users (name, email, password, profile_picture, short_bio, role) VALUES (?, ?, ?, ?, ?, ?)"
        );
        $insertStatement->bind_param(
            "ssssss",
            $this->name,
            $this->email,
            $passwordHash,
            $profilePicName,
            $this->shortBio,
            $this->role
        );

        if ($insertStatement->execute()) {
            return true;
        } else {
            return "Error: " . $this->connection->error;
        }
    }
}


?>
