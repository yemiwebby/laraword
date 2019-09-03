<?php

namespace App\Http\Controllers;

use App\Post;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postToWp(Request $request, $id){
        echo 'hello';
        $post = Post::find($id);
        $username = 'admin';
        $password = 'admin';
        $client = new Client([
            'base_uri' => 'http://wordpress.local/wp-json/wp/v2/',
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($username . ':' . $password),
                'Accept' => 'application/json',
                'Content-type' => 'application/json',
                'Content-Disposition' => 'attachment',
            ]
        ]);
        // uploading featured image to wordpress media and getting id
        $name = $post->title . '.' . 'jpg';
        $responses = $client->post(
            'media',
            [
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => $post->image ? file_get_contents($post->image) : null,
                        'filename' => $name
                    ],
                ]
            ]);
        $image_id_wp = json_decode($responses->getBody(), true);

// uploading post to wordpress with featured image id
        $response = $client->post('posts', [
            'multipart' => [
                [
                    'name' => 'title',
                    'contents' => $post->title
                ],
                [
                    'name' => 'content',
                    'contents' => $post->body
                ],
                [
                    'name' => 'featured_media',
                    'contents' => $post->image ? $image_id_wp['id'] : null
                ],
            ]
        ]);
        return redirect('/home')->with('success','post has been created');
    }
}
