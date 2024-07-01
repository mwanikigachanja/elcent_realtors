    <!-- Modal for adding new property -->
    <div id="addPropertyModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add New Property</h2>
            <form action="add_property.php" method="POST">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" required>

                <label for="description">Description</label>
                <textarea name="description" id="description" required></textarea>

                <label for="price">Price</label>
                <input type="number" name="price" id="price" required>

                <label for="location">Location</label>
                <input type="text" name="location" id="location" required>

                <label for="features">Features</label>
                <textarea name="features" id="features"></textarea>

                <label for="images">Images</label>
                <input type="file" name="images" id="images" multiple>

                <button type="submit">Add Property</button>
            </form>
        </div>
    </div>

    <script>
        var modal = document.getElementById("addPropertyModal");
        var btn = document.getElementById("addPropertyBtn");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</div>
<footer class="footer bg-dark text-white text-center py-3">
    &copy; <?php echo date("Y"); ?> Elcent Realtors. All Rights Reserved.
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
