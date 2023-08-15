<div id="popup_success">
    <div class="popup-content">
        <span id="popup-message"></span><i class="far fa-check-circle"></i>
    </div>
</div>
<div id="popup_error">
    <div class="popup-content">
        <span id="popup-message"></span><i class="fa fa-close"></i>
    </div>
</div>

@if(session('success'))
    <script>
        const popup = document.getElementById("popup_success");
        const popupMessage = document.getElementById("popup-message");
        popupMessage.innerHTML = "{{ session('success') }}";

        function showElement() {
            popup.classList.add('fade-in');
            popup.style.display = 'block';
        }

        function hideElement() {
            popup.classList.remove('fade-in');
            popup.classList.add('fade-out');
            setTimeout(() => {
                popup.style.display = 'none';
                popup.classList.remove('fade-out');
            }, 1000);
        }

        function showForDuration(duration) {
            showElement();
            setTimeout(hideElement, duration);
        }

        showForDuration(1500);
    </script>
@endif
@if(session('error'))
    <script>
        const popup = document.getElementById("popup_error");
        const popupMessage = document.getElementById("popup-message");
        popupMessage.innerHTML = "{{ session('error') }}";

        function showElement() {
            popup.classList.add('fade-in');
            popup.style.display = 'block';
        }

        function hideElement() {
            popup.classList.remove('fade-in');
            popup.classList.add('fade-out');
            setTimeout(() => {
                popup.style.display = 'none';
                popup.classList.remove('fade-out');
            }, 1000);
        }

        function showForDuration(duration) {
            showElement();
            setTimeout(hideElement, duration);
        }

        showForDuration(1500);
    </script>
@endif
