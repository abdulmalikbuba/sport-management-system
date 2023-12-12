<% if SessionMessage.Message %>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-sm fa-bell me-2"></i>$SessionMessage.Message
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<%-- $SessionMessage.Message --%>
<% end_if %>
