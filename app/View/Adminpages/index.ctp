<!-- File: /app/View/Adminpage/index.ctp -->
<?php ?>
<div class="article">
    <!--h2>Blog posts</span></h2><div class="clr"></div-->
    <h1><center>Admin Page</center></h1>
    <div>
        <h2>Articles</h2>
        <input type="submit" value="add article" onClick="parent.location='/cake/articles/add'"/>
        <input type="submit" value="edit articles" onClick="parent.location='/cake/articles/'"/>
    </div>
    <div>
        <h2>Comments</h2>
        <input type="submit" value="edit comments" onClick="parent.location='/cake/comments'"/>
    </div>
    <div>
        <h2>Posts</h2>
        <input type="submit" value="add post" onClick="parent.location='/cake/posts/add'"/>
        <input type="submit" value="edit posts" onClick="parent.location='/cake/posts/'"/>
    </div>  
    <div>
        <h2>Users</h2>
        <input type="submit" value="add user" onClick="parent.location='/cake/users/add'"/>
        <input type="submit" value="edit user" onClick="parent.location='/cake/posts/manageUsers'"/>
    </div>
    <div>
        <h2>Newsletter</h2>
        <input type="submit" value="send newsletter" onClick="parent.location='/cake/newsletters/send'"/>
        <input type="submit" value="manage e-mails" onClick="parent.location='/cake/newsletters/displayEmailList'"/>
    </div>
    <div>
        <h2>Search</h2>
        <input type="submit" value="reindex articles" onClick="parent.location='/cake/articles/reindex'"/>
        <input type="submit" value="reindex posts" onClick="parent.location='/cake/posts/reindex'"/>
        <input type="submit" value="reindex users" onClick="parent.location='/cake/users/reindex'"/>
    </div>
</div>
