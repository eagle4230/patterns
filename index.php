<?php
/**
 * Created by PhpStorm.
 * User: Evgenii Rogozhuk
 * Date: 18.10.19
 * Time: 0:26
 */
?>
<style>
    body {
        line-height: 1.4;
    }

    .box {
        display: block;
        max-width: 800px;
        margin: 0 auto;
        font-size: 20px
    }

    a {
        color: red;
        text-decoration: none;
    }

    a:hover {
        color: #2d42bb;
    }
</style>
<div class="box">
    <h1>Windows проводник</h1>
    <br/>
    <?php

    // Look to get url and return real path
    if (isset($_GET['url'])) {
        $path = $_GET['url'];
    } else {
        $path = $_SERVER['DOCUMENT_ROOT'];
    }

    // Start Recursive iterator for current directory and files
    $splObjects = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($path),
        RecursiveIteratorIterator::CHILD_FIRST,
        false
    );

    // Take real path to folder
    $realPath = realpath('.');

    // Looking in to array
    foreach ($splObjects as $splObject) {

        // Take current name of directory or file
        $getPath = explode($path . '/', $splObject);
        $currentPath = implode($getPath);

        // Don't show dot
        if ($splObject->getFileName() !== '.') {

            /** @var $splObject RecursiveDirectoryIterator */

            if ($path != '/'
                && $currentPath == $splObject->getFileName()
            ) {
                // Start urls to folders and files
                $url = '/?url=' . $splObject->getFileName();

                if ($realPath !== $path) {
                    // if not main page look children
                    $url = '/?url=' . $path . '/' . $splObject->getFileName();

                    // If name dots
                    if ($splObject->getFileName() == '..') {
                        // Replace and make new back url
                        $parseUrl = explode('/', $path);
                        array_pop($parseUrl);
                        if ($parseUrl) {
                            // If not one child pop last part of url
                            $url = '/?url=' . implode('/', $parseUrl);
                        } else {
                            // If one child go to main
                            $url = '/';
                        }
                    };
                } else {
                    // If main page replace back url to hash
                    if ($splObject->getFileName() == '..') {
                        $url = '#';
                    }
                }

                // Look if it file or not
                if ($splObject->isFile()) {
                    echo $splObject->getFileName() . '<br>';
                } else {
                    echo "<a href='{$url}'>{$splObject->getFileName()}</a><br>";
                }
            }
        }
    }
    ?>
</div>
