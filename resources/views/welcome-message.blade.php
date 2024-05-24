<!-- resources/views/welcome-message.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Include Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 30px;
        }

        .container-fluid div span {
            border: 1px solid black;
            padding: 50px;
            border-radius: 10px;
        }

        p {
            font-size: 15px;
        }

        .cancel-btn {
            background-color: transparent;
            color: #6c757d;
            border-color: #6c757d;
        }

        .cancel-btn:hover {
            color: #343a40;
            background-color: #e9ecef;
        }

        .submit-btn {
            background-color: #007bff;
            border-color: #007bff;
        }

        .submit-btn:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>

</head>

<div class="container mt-5">
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confidentialityModal">
        View Confidentiality Agreement
    </button>

    <!-- Modal -->
    <div class="modal fade" id="confidentialityModal" tabindex="-1" role="dialog" aria-labelledby="confidentialityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="confidentialityModalLabel">Confidentiality Agreement and Terms and Conditions for Accessing Company Financial Data</h4>
                </div>
                <div class="modal-body" style="text-align: justify;">
                    <p>
                        <strong>1. Introduction</strong><br>
                        Welcome to the Tasteless Partner System ("System"). By accessing or using the System, you agree to comply with and be bound by the following terms and conditions. This document outlines the confidentiality obligations and security measures in place to protect the integrity and confidentiality of our company’s financial data. Unauthorized access, use, or distribution of this data is strictly prohibited.
                    </p>

                    <p>
                        <strong>2. Confidentiality Agreement</strong><br>
                        <strong>2.1 Confidential Information:</strong><br>
                        All financial data, reports, analyses, and any other information contained within the System (collectively, "Confidential Information") are proprietary and confidential to [Your Company Name]. This Confidential Information must not be disclosed, transmitted, or shared with any unauthorized individuals or entities.
                    </p>

                    <p>
                        <strong>2.2 User Obligations:</strong><br>
                        As an authorized user, you agree to:
                        <ul>
                            <li>Maintain the confidentiality of all Confidential Information.</li>
                            <li>Use the Confidential Information solely for the purposes for which you have been granted access.</li>
                            <li>Not disclose, share, or transmit Confidential Information to any third party without the express written consent of Beyond Concepts Inc.</li>
                        </ul>
                    </p>

                    <p>
                        <strong>2.3 Prohibited Actions:</strong><br>
                        Users are prohibited from:
                        <ul>
                            <li>Copying, downloading, or transferring any Confidential Information without authorization.</li>
                            <li>Discussing Confidential Information in public or unsecured areas.</li>
                            <li>Using the Confidential Information for any unauthorized or illegal purposes.</li>
                        </ul>
                    </p>

                    <p>
                        <strong>3. Security Measures</strong><br>
                        <strong>3.1 Access Controls:</strong><br>
                        <ul>
                            <li>User access to the System is restricted and granted based on role-specific needs.</li>
                            <li>Multi-factor authentication (MFA) is required for all users to access the System.</li>
                            <li>Regular audits and access reviews will be conducted to ensure compliance with access control policies.</li>
                        </ul>
                    </p>

                    <p>
                        <strong>3.2 Data Encryption:</strong><br>
                        <ul>
                            <li>All data within the System is encrypted both in transit and at rest using industry-standard encryption protocols.</li>
                            <li>Secure Sockets Layer (SSL) or Transport Layer Security (TLS) are used to secure all communications between users and the System.</li>
                        </ul>
                    </p>

                    <p>
                        <strong>3.3 Monitoring and Logging:</strong><br>
                        <ul>
                            <li>The System logs all access and usage activities, including login attempts, data queries, and modifications.</li>
                            <li>Continuous monitoring for suspicious activities and potential security breaches is in place.</li>
                        </ul>
                    </p>

                    <p>
                        <strong>3.4 Incident Response:</strong><br>
                        <ul>
                            <li>In the event of a suspected or actual security breach, an incident response plan will be activated.</li>
                            <li>Users are required to report any security incidents or vulnerabilities immediately to the IT security team.</li>
                        </ul>
                    </p>

                    <p>
                        <strong>4. Consequences of Violation</strong><br>
                        <strong>4.1 Disciplinary Action:</strong><br>
                        Any violation of these terms and conditions may result in disciplinary action, including but not limited to:
                        <ul>
                            <li>Revocation of access privileges to the System.</li>
                            <li>Termination of contractual relationships.</li>
                            <li>Legal action for breach of confidentiality and damages.</li>
                        </ul>
                    </p>

                    <p>
                        <strong>4.2 Legal Implications:</strong><br>
                        Unauthorized disclosure of Confidential Information may lead to civil or criminal penalties under applicable laws and regulations.
                    </p>

                    <p>
                        <strong>5. Acceptance of Terms</strong><br>
                        By accessing the System, you acknowledge that you have read, understood, and agree to abide by these confidentiality terms and conditions. Your compliance is essential to ensuring the security and confidentiality of [Your Company Name]’s financial data.
                    </p>

                    <p>
                        For any questions or concerns regarding these terms, please contact the IT security team at isd@digits.ph.<br>
                        <strong>Effective Date: May 25, 2024</strong>
                    </p>
                </div>
                <div class="modal-footer">
                    <form id="cancel-form" action="{{ route('cancel.welcome') }}" method="post" style="display: none;">
                        @csrf
                    </form>
                    <form action="{{ route('acknowledge.welcome', ['userId' => $userId]) }}" method="POST">
                        @csrf
                        <button type="button" class="btn btn-secondary" onclick="document.getElementById('cancel-form').submit();">Cancel</button>
                        <button type="submit" class="btn btn-primary">Agree</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</html>
