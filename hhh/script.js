function loadDTRHistory() {
    $.ajax({
        url: 'fetch_dtr_submissions.php',
        type: 'GET',
        success: function(response) {
            const submissions = JSON.parse(response);
            let tableContent = '';
            
            submissions.forEach(submission => {
                let statusBadge = '';
                switch(submission.status) {
                    case 'pending':
                        statusBadge = '<span class="badge bg-warning">Pending</span>';
                        break;
                    case 'approved':
                        statusBadge = '<span class="badge bg-success">Approved</span>';
                        break;
                    case 'rejected':
                        statusBadge = '<span class="badge bg-danger">Rejected</span>';
                        break;
                }
                
                tableContent += `
                    <tr>
                        <td>${submission.date_submitted}</td>
                        <td>${submission.file_name}</td>
                        <td>${statusBadge}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" onclick="downloadDTR(${submission.id})">
                                <i class="fas fa-download"></i> Download
                            </button>
                        </td>
                    </tr>
                `;
            });
            
            $('#dtrHistoryBody').html(tableContent);
        },
        error: function(xhr, status, error) {
            console.error('Error loading DTR history:', error);
            alert('Failed to load DTR history. Please try again.');
        }
    });
}

function downloadDTR(submissionId) {
    window.location.href = `download_dtr.php?id=${submissionId}`;
}

$(document).ready(function() {
    loadDTRHistory();
});