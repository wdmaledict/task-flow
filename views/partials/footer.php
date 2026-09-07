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
        const lanes = document.querySelectorAll('.card-body');

        lanes.forEach(lane => {
            new Sortable(lane, {
                group: 'kanban-board', 
                animation: 150,        
                draggable: '.card',    
                filter: 'button',      
                ghostClass: 'opacity-50' 
            });
        });
    });
</script>

</body>
</html>