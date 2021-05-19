<?php

/* * * * * * * * * * * * * * *
* Returns all published posts
* * * * * * * * * * * * * * */
function getPublishedPosts() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}

function getOwnedPosts(){
	// use global $conn object
	global $conn;
	$sql = "SELECT * FROM posts WHERE user_id = '".$_SESSION["ID"]."' AND published=true";
	$result= mysqli_query($conn, $sql);
	// fetchs posts that the current user owns
	$ownedposts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_ownedposts = array();
	foreach ($ownedposts as $ownedpost) {
		$ownedpost['topic'] = getPostTopic($ownedpost['id']);
		array_push($final_ownedposts, $ownedpost);
	}
	return $final_ownedposts;
}

function getRecentPosts(){
	// use global $conn object
	global $conn;
	$sql = "SELECT * FROM posts WHERE user_id = '".$_SESSION["ID"]."' AND published=true 
			ORDER BY updated_at DESC LIMIT 1";
	$result= mysqli_query($conn, $sql);
	// fetchs posts that the current user owns
	$recentposts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_recentposts = array();
	foreach ($recentposts as $recentpost) {
		$recentpost['topic'] = getPostTopic($recentpost['id']);
		array_push($final_recentposts, $recentpost);
	}
	return $final_recentposts;
}

function getBlogComments() {
	// use global $conn object
	global $conn;
	$sql = "SELECT * FROM comments WHERE post_id=$post_id";
	$result = mysqli_query($conn,$sql);

	$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

	foreach ($comments as $comment) {
		$final_comments[] = array(
			'post_id' => $comment['post_id'],
			'user_id' => $comment['user_id'],
			'username' => $comment['username'],
			'comment' => $comment['comment']
		);
	}
	return $final_comments;
}

/* * * * * * * * * * * * * * *
* Receives a post id and
* Returns topic of the post
* * * * * * * * * * * * * * */
function getPostTopic($post_id){
	global $conn;
	$sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic;
}

/* * * * * * * * * * * * * * * *
* Returns all posts under a topic
* * * * * * * * * * * * * * * * */
function getPublishedPostsByTopic($topic_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id 
				HAVING COUNT(1) = 1)";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}

/* * * * * * * * * * * * * * * *
* Returns topic name by topic id
* * * * * * * * * * * * * * * * */
function getTopicNameById($id)
{
	global $conn;
	$sql = "SELECT name FROM topics WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic['name'];
}

/* * * * * * * * * * * * * * *
* Returns a single post
* * * * * * * * * * * * * * */
function getPost($slug){
	global $conn;
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$post_slug' AND published=true";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);
	if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['id']);
	}
	return $post;
}
/* * * * * * * * * * * *
*  Returns all topics
* * * * * * * * * * * * */
function getAllTopics()
{
	global $conn;
	$sql = "SELECT * FROM topics";
	$result = mysqli_query($conn, $sql);
	$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $topics;
}
?>