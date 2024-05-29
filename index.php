<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surah Yaseen</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Surah Yaseen</h1>
        <?php
        // Fetch Surah Yaseen data from API
        $api_url = 'http://api.alquran.cloud/v1/surah/36/editions/quran-simple,en.sahih,ur.jalandhry';
        $response = file_get_contents($api_url);
        $data = json_decode($response, true);

        // Ensure the API call was successful
        if ($data['code'] == 200) {
            $arabic_ayahs = $data['data'][0]['ayahs'];
            $english_ayahs = $data['data'][1]['ayahs'];
            $urdu_ayahs = $data['data'][2]['ayahs'];

            // Display each Ayah with translations
            foreach ($arabic_ayahs as $index => $ayah) {
                echo "<div class='ayah'>";
                echo "<p class='arabic'>{$ayah['text']}</p>";
                echo "<p class='translation urdu'>{$urdu_ayahs[$index]['text']}</p>";
                echo "<p class='translation english'>{$english_ayahs[$index]['text']}</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Failed to fetch Surah Yaseen. Please try again later.</p>";
        }
        ?>
        <audio controls>
            <source src="audio/yaseen.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>
</body>
</html>
