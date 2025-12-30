<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>Submit and display form data</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <h1>Form</h1>
    <form action="get-form-data.php" method="POST">
        <label for="name">Name: </label><input type="text" name="name"><br/>
        <label for="email">E-mail: </label><input type="email" name="email"><br/>
        <input type="submit">
    </form>
    <h1>Query string</h1>
    <?php 
        $form_data = $_POST;
        if (!empty($form_data)) {

            echo "<dl>
                <dt>Name:</dt><dd>{$form_data['name']}</dd>
                <dt>Email:</dt><dd><a href=\"mailto:{$form_data['email']}\">{$form_data['email']}</a></dd>
            </dl>";
        }
        else {
            echo '<p>No form data available.</p>';
        }
    ?>
</body>
</html>
