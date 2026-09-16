</div> 

<!-- Bootstrap 5 & AdminLTE 4 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta2/dist/js/adminlte.min.js"></script>

<!-- SortableJS Library -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<!-- Initialize Drag-and-Drop functionality -->
<script>
            document.addEventListener('DOMContentLoaded', () => {
                // Select all card containers across all Kanban lanes
                const lanes = document.querySelectorAll('.cards-container');

                lanes.forEach(lane => {
                    new Sortable(lane, {
                        group: 'kanban-board', 
                        animation: 150,        
                        draggable: '.card',    
                        filter: 'button, .no-drag, .no-drag *',
                        preventOnFilter: false,     
                        ghostClass: 'opacity-50', 
                        onEnd: function (event) {
                        // event.item is the card element that was moved
                        // event.to is the list (cards-container) it was dropped into
                        const cardId = event.item.dataset.cardId;
                        const newListId = event.to.dataset.listId;

                        fetch('/cards/move', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            card_id: cardId,
                            list_id: newListId
                        })
                    });
                }
            });
        });
    });
</script>

</body>
</html>