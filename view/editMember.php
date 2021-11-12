<?php
ob_start()
?>
    <div>
        <p class="text-5xl pb-8">Member</p>
        <form method="action" >
            <label class="text-gray-700 text-xl">Name</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   type="text" id="title" name="name"><br><br>
            <input type="submit" value="Create Field" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
        </form>
    </div>
<?php
$content = ob_get_clean();
require_once 'homepage.php';
?>