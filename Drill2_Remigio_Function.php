<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frank Ocean PHP Functions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .btn-container {
            margin-bottom: 20px;
            text-align: left;
            padding: 20px;
            border-radius: 5px;
        }
        .btn-container h2 {
            color: white;
            margin-bottom: 15px;
        }
        .task-content {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Frank Ocean PHP Functions Demo</h1>
        
        <div class="btn-container bg-primary">
            <h2>Task 1: Simple Function</h2>
            <div class="task-content">
                <?php
                function displayAlbum() {
                    echo "<p>Frank Ocean's album 'Blonde' was released in 2016.</p>";
                }

                displayAlbum();
                ?>
            </div>
        </div>
        
        <div class="btn-container bg-success">
            <h2>Task 2: Function with Return</h2>
            <div class="task-content">
                <?php
                function getSongInfo($songName) {
                    $songs = [
                        'Nikes' => 'Track 1 on Blonde, duration: 5:14',
                        'Ivy' => 'Track 3 on Blonde, duration: 4:09',
                        'Pink + White' => 'Track 4 on Blonde, duration: 3:04'
                    ];
                    
                    return $songs[$songName] ?? 'Song not found in database';
                }

                $song = 'Ivy';
                echo "<p>Info about '$song': " . getSongInfo($song) . "</p>";
                ?>
            </div>
        </div>
        
        <div class="btn-container bg-danger">
            <h2>Task 3: Function By Reference</h2>
            <div class="task-content">
                <?php
                function updateStreamCount(&$streams, $increment) {
                    $streams += $increment;
                }

                $blondeStreams = 1500000000;
                echo "<p>Initial stream count for Blonde: " . number_format($blondeStreams) . "</p>";

                updateStreamCount($blondeStreams, 5000000);
                echo "<p>After update: " . number_format($blondeStreams) . " streams</p>";
                ?>
            </div>
        </div>
        
        <div class="btn-container bg-warning text-dark">
            <h2>Task 4: Function with Multiple Returns</h2>
            <div class="task-content">
                <?php
                function getFrankOceanFact($index) {
                    $facts = [
                        "Frank Ocean's real name is Christopher Edwin Breaux.",
                        "He was a member of the collective Odd Future.",
                        "He wrote songs for Justin Bieber, Beyoncé, and John Legend.",
                        "Channel Orange was nominated for Album of the Year at the 2013 Grammys."
                    ];
                    
                    if ($index < 0 || $index >= count($facts)) {
                        return "Invalid fact index. Please choose between 0 and " . (count($facts) - 1);
                    }
                    
                    return $facts[$index];
                }

                echo "<p>Frank Ocean Fact #2: " . getFrankOceanFact(2) . "</p>";
                echo "<p>Frank Ocean Fact #5: " . getFrankOceanFact(5) . "</p>";
                ?>
            </div>
        </div>
        
        <div class="btn-container bg-info">
            <h2>Task 5: Include Function</h2>
            <div class="task-content">
                <?php
                $includeContent = '<?php
                function getAlbumYear($albumName) {
                    $albums = [
                        "channel ORANGE" => 2012,
                        "Blonde" => 2016,
                        "Endless" => 2016,
                        "Nostalgia, Ultra" => 2011
                    ];
                    return $albums[$albumName] ?? "Unknown";
                }
                ?>';
                
                file_put_contents('frank_functions.php', $includeContent);
                
                include 'frank_functions.php';
                
                $album = 'Blonde';
                echo "<p>The album '$album' was released in " . getAlbumYear($album) . "</p>";
                
                unlink('frank_functions.php');
                ?>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
