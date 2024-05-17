<?php
$data = "";

if (isset($_POST['record'])) {
    $data .= '<table  id="my-table" border="2px" align="center" class="table table-bordered border-primary">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>password</th>
            <th>state</th>
            <th>gender</th>
            <th>hobbies</th>
            <th colspan="2">action</th>
        </tr>
    </thead>
    <tbody>';

    include('database.php');
    $selectquery = "SELECT * FROM student";
    $query = mysqli_query($conn, $selectquery);

    // Check if the query was successful
    if ($query) {
        while ($res = mysqli_fetch_assoc($query)) {
            $data .= "<tr>
                <td>" . $res['id'] . "</td>
                <td>" . $res['name'] . "</td>
                <td>" . $res['password'] . "</td>
                <td>" . $res['state'] . "</td>
                <td>" . $res['gender'] . "</td>
                <td>" . $res['hobbies'] . "</td>
                <td><button type='button' onclick='getuserdetails(" . $res['id'] . ")'>edit</button></td>
                <td><button type='button' onclick='deleteuser(" . $res['id'] . ")'>delete</a></td>
            </tr>";
        }

        $data .= ' </tbody>
                </table>';
        echo $data;
    } else {
        // If there is an error, display the error message
        echo "Error: " . mysqli_error($conn);
    }
}
?>
