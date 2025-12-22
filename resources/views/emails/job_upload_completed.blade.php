<h2>Bulk Job Upload Completed</h2>

<p><strong>Total Jobs:</strong> {{ $upload->total_rows }}</p>
<p><strong>Successfully Uploaded:</strong> {{ $upload->processed_rows }}</p>
<p><strong>Failed:</strong> {{ $upload->failed_rows }}</p>

<p>Status: <b>{{ strtoupper($upload->status) }}</b></p>

<p>Thank you,<br>Skill Launches Team</p>
