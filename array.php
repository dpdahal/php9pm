<?php

// index array
//  start: 0
//$users = array('ram', 'sita', 123);

//$users = ['ram', 'sita', 123,'hari'];
//echo count($users);
//for ($x = 0; $x < count($users); $x++) {
//    echo $users[$x];
//    echo "<br>";
//}

//echo $users[0];

/*
 *  Index array
 *  associative array
 * multidimensional array
 */

// 0,0

//$users = [
//    ['ram', 'siat', 'gita', 'hari'],
//    ['madan', 'laxmi', 'asmita', 'sunita'],
//    ['gopal', 'kalpana', 'durga', 'jiwan']
//];
//
//for ($x=0;$x<count($users);$x++){
//    for ($i=0;$i<count($users[$x]);$i++){
//        echo $users[$x][$i].",";
//    }
//    echo "<hr>";
//
//}

//echo "<pre>";

//print_r($users);

//echo $users[2][1];


//$users = ['name' => 'ram', 'age' => 20, 'address' => 'Kathmandu'];
//
//foreach ($users as $user){
//    echo $user;
//}

//echo "<pre>";
//print_r($users);

//echo $users['name'];


$users = [
    ['name' => 'ram', 'age' => 20, 'address' => 'Kathmandu'],
    ['name' => 'sita', 'age' => 60, 'address' => 'us'],
    ['name' => 'gita', 'age' => 40, 'address' => 'latipur'],
    ['name' => 'hari', 'age' => 50, 'address' => 'bhaktapur'],
    ['name' => 'laxmi', 'age' => 24, 'address' => 'pokhara'],
];

//echo "<pre>";
//print_r($users[0]['name']);
//echo "</pre>";

//foreach ($users as $user){
//    echo $user['name'];
//}

//echo "<pre>";
//print_r($users);


?>
<table border="1" width="100%">
    <tr>
        <th>S.n</th>
        <th>Name</th>
        <th>Age</th>
        <th>Address</th>
    </tr>
    <?php foreach ($users as $key => $user) : ?>
        <tr>
            <td><?= ++$key; ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['age'] ?></td>
            <td><?= $user['address'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
