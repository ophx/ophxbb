<div class="bg-[#1f1f1f] shadow-lg rounded p-4 flex justify-between">
    <p class="text-gray-400">Dashboard / <?php echo basename($_SERVER["PHP_SELF"], ".php"); ?></p>
    <p class="text-gray-400">Welcome, <span class="text-purple-600"><?php echo $_SESSION["username"]; ?></span>!</p>
</div>
<div class="border-b border-[#1f1f1f]"></div>