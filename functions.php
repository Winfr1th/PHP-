    <?php
    function connection(){
        $servername = "localhost"; 
        $username = "root";
        $password = "";
        $dbname = "uas";
        $connection = new mysqli($servername, $username, $password, $dbname);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        
        return $connection;

    }

    function loginUser($username, $password) {
        $connection = connection();
        $sql = "SELECT * FROM users WHERE Username = '$username' AND Password = '$password'";
        $result = $connection->query($sql);

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_array();
            session_start();
            $_SESSION['userType'] = $user['UserType'];
            $_SESSION['username'] = $user['Username'];
            $_SESSION['UserID'] = $user['UserID'];
            return true;
        } else {
            return false;
        }
    }

    function logout(){
        session_start();


        session_destroy();

        header("location:index.php");
        exit();
        
    }
    function updateUser($UserID, $name, $email, $phoneNumber) {
        $connection = connection();
        $sql = "UPDATE users SET Name = '$name', Email = '$email', PhoneNumber = '$phoneNumber' WHERE UserID = $UserID";
        $result = $connection->query($sql);
        return $result;
    }   
    function deleteUser($UserID) {
        $connection = connection();
        $sql = "DELETE FROM users WHERE UserID = $UserID";
        $result = $connection->query($sql);
        return $result;
    }
    function registerUser($name, $username, $password, $email, $phoneNumber) {
        $connection = connection();
        $usertype = 'user';

        $sql = "INSERT INTO users (Name, Username, Password, Email, PhoneNumber, UserType) 
                VALUES ('$name','$username', '$password', '$email', '$phoneNumber', '$usertype')";
        
        return $connection->query($sql);
    }

    function createOrder($UserID, $name, $email, $whatsapp, $jasa, $durasi, $price, $note){
        $connection = connection();

        $query= "INSERT INTO transactions (UserID, Name, Email, Whatsapp, ServiceID, QuantityBooked, Price, AdditionalInfo) value ('$UserID','$name', '$email', '$whatsapp', '$jasa', '$durasi','$price','$note' )";
        
        return $connection->query($query);
    }
    function fetchServices(){
        $connection = connection();
        $sql = "SELECT * from services";
        $result = $connection->query($sql);
        $options = '';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $options .= '<option value="'.$row["ServiceID"].'"data-rate="' . $row["RatePerHour"] . '">' . $row["ServiceName"] . '</option>';
            }
        }

        return $options;
    }

    function fetchUser($UserID){
        $connection = connection();
        $sql = "SELECT * FROM users WHERE UserID = '$UserID'";
        $result = $connection ->query($sql);
        if ($result && $result->num_rows > 0){
            return $result->fetch_array();
        }
    }

function fetchTransaction(){
    $connection = connection();
    $sql = "SELECT t.TransactionID, u.Name AS UserName, s.ServiceName, t.Name, t.Email, t.Whatsapp, t.QuantityBooked, t.Price, t.Timestamp, t.AdditionalInfo 
    FROM transactions t 
    LEFT JOIN users u ON t.UserID = u.UserID 
    LEFT JOIN services s ON t.ServiceID = s.ServiceID";
    $result = $connection ->query($sql);
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>User</th><th>Jasa</th><th>Nama</th><th>Email</th><th>Whatsapp</th><th>Durasi</th><th>Biaya</th><th>Timestamp</th><th>Notes</th></tr>";
        $total = 0;
        while ($row = $result->fetch_assoc()) {
            $total += $row['Price'];
            echo "<tr>";
            echo "<td>" . $row["TransactionID"] . "</td>";
            echo "<td>" . $row["UserName"] . "</td>";
            echo "<td>" . $row["ServiceName"] . "</td>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "<td>" . $row["Whatsapp"] . "</td>";
            echo "<td>" . $row["QuantityBooked"]. " Jam" . "</td>";
            echo "<td>" ."Rp. " .number_format($row['Price'])   . "</td>";
            echo "<td>" . $row["Timestamp"] . "</td>";
            echo "<td>" . $row["AdditionalInfo"] . "</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td colspan=\"9\">" . "Total" ."</td>";
        echo "<td>" . "Rp. ". number_format($total) ."</td>";
        echo "</tr>";
        echo "</table>";
}
}



?>