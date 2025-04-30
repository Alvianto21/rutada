document.addEventListener("DOMContentLoaded", function () {
    function attachPaginationListeners() {
        const paginationLinks = document.querySelectorAll('.pagination a');

        paginationLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();

                fetch(link.href, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newTable = doc.querySelector('#user-table').parentElement.innerHTML;

                    document.querySelector('#user-table').parentElement.innerHTML = newTable;

                    // Reinitialize Alpine.js
                    if (window.Alpine) {
                        console.log('Reinitializing Alpine.js...');
                        window.Alpine.initTree(document.querySelector('#user-table'));
                    }

                    // Reattach event listeners for pagination
                    attachPaginationListeners();
                });
            });
        });
    }

    attachPaginationListeners();
});