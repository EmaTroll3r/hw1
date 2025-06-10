<?php
    if (isset($_GET['gameId'])) {
        $conn = mysqli_connect("localhost", "root", "", "bgg") or die("Connection failed: " . mysqli_connect_error());

        $gameId = mysqli_real_escape_string($conn, $_GET['gameId']);

        $queryBoardgame = "SELECT * FROM boardgame WHERE id = '". $gameId . "'";
        $queryAltNames = "SELECT name FROM Boardgame_AlternativeNames WHERE boardgame_id = '". $gameId . "'";
        $queryDesigners = "SELECT person.id, person.name 
                           FROM Boardgame_Designer 
                           JOIN person on person.id = Boardgame_Designer.person_id 
                           WHERE boardgame_id = '". $gameId . "'";
        $queryArtists = "SELECT person.id, person.name 
                           FROM Boardgame_Artist 
                           JOIN person on person.id = Boardgame_Artist.person_id 
                           WHERE boardgame_id = '". $gameId . "'";
        $queryPublishers = "SELECT person.id, person.name 
                           FROM Boardgame_Publisher 
                           JOIN person on person.id = Boardgame_Publisher.person_id 
                           WHERE boardgame_id = '". $gameId . "'";        
        $queryImages = "SELECT id, uri 
                           FROM Boardgame_Media
                           WHERE boardgame_id = '". $gameId . "' AND media_type = 'image'
                           LIMIT 10";
        $queryNImages = "SELECT COUNT(*) as count 
                           FROM Boardgame_Media
                           WHERE boardgame_id = '". $gameId . "' AND media_type = 'image'";               
        $queryAwards = "SELECT Awards.id, Awards.name, Boardgame_Awards.year_won
                        from Boardgame_Awards
                        JOIN Awards ON Boardgame_Awards.award_id = Awards.id
                        WHERE boardgame_id = '". $gameId . "'";
        $queryTags = "SELECT Boardgame_Category.name, Boardgame_Category.category_type, Boardgame_Category.id
                        FROM Boardgame_Categories
                        JOIN Boardgame_Category ON Boardgame_Categories.category_id = Boardgame_Category.id
                        WHERE boardgame_id = '". $gameId . "'";
        $queryReviewVideo = "SELECT boardgame_media.id, boardgame_media.title,  max(boardgame_media.n_likes) AS likes, video_category.name as category, video.thumbnail_url as thumbnail, user.username as author, boardgame_media.upload_date as publishDate, boardgame_media.n_comments as comments, language.name as language
                            FROM Video
                            JOIN Boardgame_Media ON Video.media_id = boardgame_media.id
                            JOIN video_category ON video_category.id = video.video_category_id
                            JOIN User ON User.id = boardgame_media.uploader_user_id
                            JOIN Language ON Language.id = boardgame_media.language_id
                            WHERE boardgame_id = '". $gameId . "' AND media_type = 'video'
                            AND video_category.name = 'Reviews'";
        $queryIstructionalVideo = "SELECT boardgame_media.id, boardgame_media.title,  max(boardgame_media.n_likes) AS likes, video_category.name as category, video.thumbnail_url as thumbnail, user.username as author, boardgame_media.upload_date as publishDate, boardgame_media.n_comments as comments, language.name as language
                                FROM Video
                                JOIN Boardgame_Media ON Video.media_id = boardgame_media.id
                                JOIN video_category ON video_category.id = video.video_category_id
                                JOIN User ON User.id = boardgame_media.uploader_user_id
                                JOIN Language ON Language.id = boardgame_media.language_id
                                WHERE boardgame_id = '". $gameId . "' AND media_type = 'video'
                                AND video_category.name = 'Istructional'";
        $queryLastVideo = "SELECT boardgame_media.id, boardgame_media.title, boardgame_media.n_likes AS likes, video_category.name as category, video.thumbnail_url as thumbnail, user.username as author, boardgame_media.upload_date as publishDate, boardgame_media.n_comments as comments, language.name as language
                                FROM Video
                                JOIN Boardgame_Media ON Video.media_id = boardgame_media.id
                                JOIN video_category ON video_category.id = video.video_category_id
                                JOIN User ON User.id = boardgame_media.uploader_user_id
                                JOIN Language ON Language.id = boardgame_media.language_id
                                WHERE boardgame_id = '". $gameId . "' AND media_type = 'video'
                                ORDER BY upload_date DESC
                                LIMIT 1";
        $queryNVideos = "SELECT COUNT(*) as count 
                           FROM Boardgame_Media
                           WHERE boardgame_id = '". $gameId . "' AND media_type = 'video'";               
        $queryReviewHots = "SELECT boardgame_media.id, boardgame_media.title, boardgame_media.n_likes AS likes, forum_category.name as category, user.username as author, boardgame_media.upload_date as publishDate, boardgame_media.n_comments as comments, user.avatar_url as authorImage, user.n_published_media as publishedReviews, user.id as authorId
                            FROM Boardgame_Media 
                            JOIN Forum ON Boardgame_Media.id = Forum.media_id
                            JOIN Forum_Category ON Forum.forum_category_id = Forum_Category.id
                            JOIN User ON User.id = Boardgame_Media.uploader_user_id
                            WHERE boardgame_id = '". $gameId . "' AND media_type = 'forum'
                            AND Forum_Category.name = 'Reviews'
                            ORDER BY boardgame_media.n_likes DESC
                            LIMIT 2";
        $queryReviewRecents = "SELECT boardgame_media.id, boardgame_media.title, boardgame_media.n_likes AS likes, forum_category.name as category, user.username as author, boardgame_media.upload_date as publishDate, boardgame_media.n_comments as comments, user.avatar_url as authorImage, user.n_published_media as publishedReviews, user.id as authorId
                            FROM Boardgame_Media 
                            JOIN Forum ON Boardgame_Media.id = Forum.media_id
                            JOIN Forum_Category ON Forum.forum_category_id = Forum_Category.id
                            JOIN User ON User.id = Boardgame_Media.uploader_user_id
                            WHERE boardgame_id = '". $gameId . "' AND media_type = 'forum'
                            AND Forum_Category.name = 'Reviews'
                            ORDER BY boardgame_media.upload_date DESC
                            LIMIT 6";
        $queryNTextReviews = "SELECT COUNT(*) as count 
                            FROM Boardgame_Media
                            JOIN Forum ON Boardgame_Media.id = Forum.media_id
                            JOIN Forum_Category ON Forum.forum_category_id = Forum_Category.id
                            WHERE boardgame_id = '". $gameId . "' AND media_type = 'forum'
                            AND Forum_Category.name = 'Reviews'";
        $queryNVideoReviews = "SELECT COUNT(*) as count 
                            FROM Boardgame_Media
                            JOIN Video ON Boardgame_Media.id = Video.media_id
                            JOIN Video_Category ON Video.video_category_id = Video_Category.id
                            WHERE boardgame_id = '". $gameId . "' AND media_type = 'video'
                            AND Video_Category.name = 'Reviews'";  
        $queryReleatedBoardgames = "SELECT releated_game.name as title, releated_game.id as id, releated_game.image_url as image, releated_game.bgg_rank as rank, releated_game.n_likes as likes
                                    FROM boardgame
                                    JOIN releated_boardgames ON boardgame.id = releated_boardgames.main_boardgame_id
                                    JOIN boardgame AS releated_game ON releated_game.id = releated_boardgames.related_boardgame_id
                                    WHERE Releated_Boardgames.main_boardgame_id = '". $gameId . "'
                                    LIMIT 6";
        $queryNReleatedBoardgames  = "SELECT count(*) as count
                                    FROM boardgame
                                    JOIN releated_boardgames ON boardgame.id = releated_boardgames.main_boardgame_id
                                    JOIN boardgame AS releated_game ON releated_game.id = releated_boardgames.related_boardgame_id
                                    WHERE Releated_Boardgames.main_boardgame_id = '". $gameId . "'";                                                    
        $queryForumHots = "SELECT boardgame_media.id, boardgame_media.title, boardgame_media.n_likes AS likes, forum_category.name as tag, user.username as author, boardgame_media.upload_date as publishDate, boardgame_media.n_comments as comments, user.n_published_media as publishedReviews, user.id as authorId
                            FROM Boardgame_Media 
                            JOIN Forum ON Boardgame_Media.id = Forum.media_id
                            JOIN User ON User.id = Boardgame_Media.uploader_user_id
                            JOIN Forum_Category ON Forum.forum_category_id = Forum_Category.id
                            WHERE boardgame_id = '". $gameId . "' AND media_type = 'forum'
                            ORDER BY boardgame_media.n_likes DESC
                            LIMIT 2";
        $queryForumRecents = "SELECT boardgame_media.id, boardgame_media.title, boardgame_media.n_likes AS likes, forum_category.name as tag, user.username as author, boardgame_media.upload_date as publishDate, boardgame_media.n_comments as comments, user.n_published_media as publishedReviews, user.id as authorId
                            FROM Boardgame_Media 
                            JOIN Forum ON Boardgame_Media.id = Forum.media_id
                            JOIN User ON User.id = Boardgame_Media.uploader_user_id
                            JOIN Forum_Category ON Forum.forum_category_id = Forum_Category.id
                            WHERE boardgame_id = '". $gameId . "' AND media_type = 'forum'
                            ORDER BY boardgame_media.upload_date DESC
                            LIMIT 6";
        $queryNForums = "SELECT COUNT(*) as count 
                            FROM Boardgame_Media
                            JOIN Forum ON Boardgame_Media.id = Forum.media_id
                            WHERE boardgame_id = '". $gameId . "' AND media_type = 'forum'";
        $queryFileHots = "SELECT boardgame_media.id, boardgame_media.title, boardgame_media.n_likes AS likes, user.username as author, boardgame_media.upload_date as publishDate, boardgame_media.n_comments as comments, user.id as authorId, boardgame_media.description, language.name as language
                            FROM Boardgame_Media 
                            JOIN File ON Boardgame_Media.id = File.media_id
                            JOIN User ON User.id = Boardgame_Media.uploader_user_id
                            JOIN Language ON Language.id = boardgame_media.language_id
                            WHERE boardgame_id = '". $gameId . "' AND media_type = 'file'
                            ORDER BY boardgame_media.n_likes DESC
                            LIMIT 2";
        $queryFileRecents = "SELECT boardgame_media.id, boardgame_media.title, boardgame_media.n_likes AS likes, user.username as author, boardgame_media.upload_date as publishDate, boardgame_media.n_comments as comments, user.id as authorId, boardgame_media.description, language.name as language
                            FROM Boardgame_Media 
                            JOIN File ON Boardgame_Media.id = File.media_id
                            JOIN User ON User.id = Boardgame_Media.uploader_user_id
                            JOIN Language ON Language.id = boardgame_media.language_id
                            WHERE boardgame_id = '". $gameId . "' AND media_type = 'file'
                            ORDER BY boardgame_media.upload_date DESC
                            LIMIT 6";
        $queryNFiles = "SELECT count(*) as count
                            FROM Boardgame_Media 
                            JOIN File ON Boardgame_Media.id = File.media_id
                            WHERE boardgame_id = '". $gameId . "' AND media_type = 'file'";
        $queryNExpansions = "SELECT COUNT(*) as count 
                            FROM Edition
                            WHERE base_boardgame_id = '". $gameId . "'
                            AND edition_type = 'expansion'";
        $queryNVersions = "SELECT COUNT(*) as count 
                            FROM Edition
                            WHERE base_boardgame_id = '". $gameId . "'
                            AND edition_type = 'version'";
        $queryNNews = "SELECT COUNT(*) as count 
                            FROM Boardgame_Media
                            WHERE boardgame_id = '". $gameId . "'
                            AND media_type = 'news'";


        $resBoardgame = mysqli_query($conn, $queryBoardgame) or die("Query failed: " . mysqli_error($conn));
        $resAltNames = mysqli_query($conn, $queryAltNames) or die("Query failed: " . mysqli_error($conn));
        $resDesigners = mysqli_query($conn, $queryDesigners) or die("Query failed: " . mysqli_error($conn));
        $resArtists = mysqli_query($conn, $queryArtists) or die("Query failed: " . mysqli_error($conn));
        $resPublishers = mysqli_query($conn, $queryPublishers) or die("Query failed: " . mysqli_error($conn));
        $resImages = mysqli_query($conn, $queryImages) or die("Query failed: " . mysqli_error($conn));
        $resNImages = mysqli_query($conn, $queryNImages) or die("Query failed: " . mysqli_error($conn));
        $resAwards = mysqli_query($conn, $queryAwards) or die("Query failed: " . mysqli_error($conn));
        $resTags = mysqli_query($conn, $queryTags) or die("Query failed: " . mysqli_error($conn));
        $resReviewVideo = mysqli_query($conn, $queryReviewVideo) or die("Query failed: " . mysqli_error($conn));
        $resIstructionalVideo = mysqli_query($conn, $queryIstructionalVideo) or die("Query failed: " . mysqli_error($conn));
        $resLastVideo = mysqli_query($conn, $queryLastVideo) or die("Query failed: " . mysqli_error($conn));
        $resNVideo = mysqli_query($conn, $queryNVideos) or die("Query failed: " . mysqli_error($conn));
        $resReviewHots = mysqli_query($conn, $queryReviewHots) or die("Query failed: " . mysqli_error($conn));
        $resReviewRecents = mysqli_query($conn, $queryReviewRecents) or die("Query failed: " . mysqli_error($conn));
        $resNTextReviews = mysqli_query($conn, $queryNTextReviews) or die("Query failed: " . mysqli_error($conn));
        $resNVideoReviews = mysqli_query($conn, $queryNVideoReviews) or die("Query failed: " . mysqli_error($conn));
        $resReleatedBoardgames = mysqli_query($conn, $queryReleatedBoardgames) or die("Query failed: " . mysqli_error($conn));
        $resNReleatedBoardgames = mysqli_query($conn, $queryNReleatedBoardgames) or die("Query failed: " . mysqli_error($conn));
        $resForumHots = mysqli_query($conn, $queryForumHots) or die("Query failed: " . mysqli_error($conn));
        $resForumRecents = mysqli_query($conn, $queryForumRecents) or die("Query failed: " . mysqli_error($conn));
        $resNForums = mysqli_query($conn, $queryNForums) or die("Query failed: " . mysqli_error($conn));
        $resFileHots = mysqli_query($conn, $queryFileHots) or die("Query failed: " . mysqli_error($conn));
        $resFileRecents = mysqli_query($conn, $queryFileRecents) or die("Query failed: " . mysqli_error($conn));
        $resNFiles = mysqli_query($conn, $queryNFiles) or die("Query failed: " . mysqli_error($conn));
        $resNExpansions = mysqli_query($conn, $queryNExpansions) or die("Query failed: " . mysqli_error($conn));
        $resNVersions = mysqli_query($conn, $queryNVersions) or die("Query failed: " . mysqli_error($conn));
        $resNNews = mysqli_query($conn, $queryNNews) or die("Query failed: " . mysqli_error($conn));

        $result = [];

        // if (mysqli_num_rows($resBoardgame) > 0 && mysqli_num_rows($resAltNames) > 0 && mysqli_num_rows($resDesigners) > 0 && mysqli_num_rows($resArtists) > 0 && mysqli_num_rows($resPublishers) > 0 && mysqli_num_rows($resImages) > 0 && mysqli_num_rows($resNImages) > 0 && mysqli_num_rows($resAwards) > 0 && mysqli_num_rows($resTags) > 0 && mysqli_num_rows($resReviewVideo) > 0 && mysqli_num_rows($resIstructionalVideo) > 0 && mysqli_num_rows($resLastVideo) > 0  && mysqli_num_rows($resNVideo) > 0) {
        if (mysqli_num_rows($resBoardgame) > 0) {
            $result['boardgame'] = mysqli_fetch_assoc($resBoardgame);
            
            $array = [];
            while ($row = mysqli_fetch_assoc($resAltNames)) {
                $array[] = $row;
            }
            $result['alternativeNames'] = $array;

            
            $array = [];
            while ($row = mysqli_fetch_assoc($resDesigners)) {
                $array[] = $row;
            }
            $result['designers'] = $array;

            
            $array = [];
            while ($row = mysqli_fetch_assoc($resArtists)) {
                $array[] = $row;
            }
            $result['artists'] = $array;

            
            $array = [];
            while ($row = mysqli_fetch_assoc($resPublishers)) {
                $array[] = $row;
            }
            $result['publishers'] = $array;

            
            $array = [];
            while ($row = mysqli_fetch_assoc($resImages)) {
                $array[] = $row;
            }
            $result['images'] = $array;


            $result['nImages'] = mysqli_fetch_assoc($resNImages);
            
            
            $array = [];
            while ($row = mysqli_fetch_assoc($resAwards)) {
                $array[] = $row;
            }
            $result['awards'] = $array;
            
            
            $array = [];
            while ($row = mysqli_fetch_assoc($resTags)) {
                $array[] = $row;
            }
            $result['tags'] = $array;
            
            

            $result['reviewVideo'] = mysqli_fetch_assoc($resReviewVideo);
            $result['istructionalVideo'] = mysqli_fetch_assoc($resIstructionalVideo);
            $result['lastVideo'] = mysqli_fetch_assoc($resLastVideo);
            $result['nVideos'] = mysqli_fetch_assoc($resNVideo);

            
            $array = [];
            while ($row = mysqli_fetch_assoc($resReviewHots)) {
                $array[] = $row;
            }
            $result['reviewHots'] = $array;

            
            $array = [];
            while ($row = mysqli_fetch_assoc($resReviewRecents)) {
                $array[] = $row;
            }
            $result['reviewRecents'] = $array;


            $result['nTextReviews'] = mysqli_fetch_assoc($resNTextReviews);
            $result['nVideoReviews'] = mysqli_fetch_assoc($resNVideoReviews);
            

            $array = [];
            while ($row = mysqli_fetch_assoc($resReleatedBoardgames)) {
                $array[] = $row;
            }
            $result['releatedBoardgames'] = $array;


            $result['nReleatedBoardgames'] = mysqli_fetch_assoc($resNReleatedBoardgames);


            $array = [];
            while ($row = mysqli_fetch_assoc($resForumHots)) {
                $array[] = $row;
            }
            $result['forumHots'] = $array;


            $array = [];
            while ($row = mysqli_fetch_assoc($resForumRecents)) {
                $array[] = $row;
            }
            $result['forumRecents'] = $array;


            $result['nForums'] = mysqli_fetch_assoc($resNForums);


            $array = [];
            while ($row = mysqli_fetch_assoc($resFileHots)) {
                $array[] = $row;
            }
            $result['fileHots'] = $array;


            $array = [];
            while ($row = mysqli_fetch_assoc($resFileRecents)) {
                $array[] = $row;
            }
            $result['fileRecents'] = $array;


            $result['nFiles'] = mysqli_fetch_assoc($resNFiles);


            $result['nExpansions'] = mysqli_fetch_assoc($resNExpansions);
            $result['nVersions'] = mysqli_fetch_assoc($resNVersions);

            $result['nBggNews'] = mysqli_fetch_assoc($resNNews);

            mysqli_free_result($resBoardgame);
            mysqli_free_result($resAltNames);
            mysqli_free_result($resDesigners);
            mysqli_free_result($resArtists);
            mysqli_free_result($resPublishers);
            mysqli_free_result($resImages);
            mysqli_free_result($resNImages);
            mysqli_free_result($resAwards);
            mysqli_free_result($resTags);
            mysqli_free_result($resReviewVideo);
            mysqli_free_result($resIstructionalVideo);
            mysqli_free_result($resLastVideo);
            mysqli_free_result($resNVideo);
            mysqli_free_result($resReviewHots);
            mysqli_free_result($resReviewRecents);
            mysqli_free_result($resNTextReviews);
            mysqli_free_result($resNVideoReviews);
            mysqli_free_result($resReleatedBoardgames);
            mysqli_free_result($resNReleatedBoardgames);
            mysqli_free_result($resForumHots);
            mysqli_free_result($resForumRecents);
            mysqli_free_result($resNForums);
            mysqli_free_result($resFileHots);
            mysqli_free_result($resFileRecents);
            mysqli_free_result($resNFiles);
            mysqli_free_result($resNExpansions);
            mysqli_free_result($resNVersions);
            mysqli_free_result($resNNews);

            mysqli_close($conn);

            echo json_encode($result);   
        }
    }
?>