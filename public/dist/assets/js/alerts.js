function confirmDeletion(event, element) {
    if (confirm("Are you sure you want to delete this item?")) {
        element.closest('form').submit();
    } else {
        alert("Deletion canceled.");
    }
}