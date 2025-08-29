<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCAA for Insurance/MAS - {{ $pli_name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.4;
            margin: 0;
            padding: 20px;
            padding-bottom: 60px; /* Space for timestamp footer */
            color: #000;
        }
        
        /* Timestamp footer that appears on every page */
        .page-footer {
            position: fixed;
            bottom: 10px;
            left: 20px;
            right: 20px;
            height: 30px;
            font-size: 9px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 5px;
            background: white;
            z-index: 1000;
        }
        
        .timestamp-left {
            float: left;
        }
        
        .timestamp-right {
            float: right;
        }
        
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        
        .subtitle {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .section-title {
            font-size: 12px;
            font-weight: bold;
            margin-top: 25px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        
        .subsection-title {
            font-size: 11px;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 10px;
        }
        
        .pli-info {
            background-color: #f5f5f5;
            padding: 15px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }
        
        .pli-info h3 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 12px;
            font-weight: bold;
        }
        
        .pli-info p {
            margin: 5px 0;
        }
        
        ol, ul {
            margin: 10px 0;
            padding-left: 20px;
        }
        
        li {
            margin-bottom: 8px;
        }
        
        .highlight {
            background-color: #ffff99;
            font-weight: bold;
        }
        
        .deleted {
            text-decoration: line-through;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        
        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        
        .table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        
        .signature-section {
            margin-top: 40px;
            page-break-inside: avoid;
        }
        
        .signature-line {
            border-bottom: 1px solid #000;
            width: 300px;
            margin: 20px 0 5px 0;
            display: inline-block;
        }
        
        .page-break {
            page-break-before: always;
        }
        
        .indent {
            margin-left: 20px;
        }
        
        .double-indent {
            margin-left: 40px;
        }
        
        .bold {
            font-weight: bold;
        }
        
        .underline {
            text-decoration: underline;
        }
        
        .center {
            text-align: center;
        }
        
        .no-break {
            page-break-inside: avoid;
        }

        /* Print-specific styles for better PDF generation */
        @media print {
            .page-footer {
                position: fixed;
                bottom: 0;
            }
            
            body {
                padding-bottom: 50px;
            }
        }
    </style>
</head>
<body>
    <!-- Page Footer with Timestamps (appears on every page) -->
    <div class="page-footer clearfix">
        <div class="timestamp-left">
            <strong>Generated:</strong> {{ \Carbon\Carbon::now('Asia/Manila')->format('F j, Y \a\t g:i A') }}
        </div>
        <div class="timestamp-right">
            <strong>PLI:</strong> {{ $pli_name }} | <strong>Document:</strong> TCAA for Insurance/MAS
        </div>
    </div>

    <!-- Header Section -->
    <div class="header">
        <div class="title">Terms and Conditions of the APDS Accreditation (TCAA)</div>
        <div class="subtitle">FOR INSURANCE PREMIA AND MEMBERSHIP DUES/CONTRIBUTIONS</div>
    </div>

    <!-- PLI Information Block 
    <div class="pli-info">
        <h3>PLI Information</h3>
        <p><strong>Institution Name:</strong> {{ $pli_name }}</p>
        <p><strong>Loan Code:</strong> {{ $loan_code ?: 'TBD' }}</p>
        <p><strong>MAS Code:</strong> {{ $mas_code ?: 'TBD' }}</p>
        <p><strong>Insurance Code:</strong> {{ $insurance_code ?: 'TBD' }}</p>
        <p><strong>Classification:</strong> {{ $classification }}</p>
        <p><strong>Coverage:</strong> {{ implode(', ', $regions) }}</p>
        <p><strong>Order Number:</strong> [TBD]</p>
        <p><strong>Date:</strong> [TBD]</p>
    </div>-->

    <!-- Statement of Principles -->
    <div class="section-title">1. Statement of Principles</div>
    
    <ol>
        <li>Participation in the DepEd Automatic Payroll Deduction System (APDS) at the national, regional and school levels may be granted to private institutions authorized under specific law to be paid through salary deductions, and accredited by DepEd after fulfillment of requirements as provided in DepEd Order No. 999, s. 2021.</li>
        
        <li>The accredited private institution shall subscribe to the following principles:
            <ol style="list-style-type: lower-alpha;">
                <li>Full transparency in reporting operations and financial status as evidenced by audited financial statements and appropriate disclosure statements; and</li>
                <li>Integrity of operations through proper and complete documentation of insurance policies and/or memberships of DepEd personnel.</li>
            </ol>
        </li>
        
        <li>The DepEd shall ensure that the objectives and purposes of APDS are achieved through proper regulation, periodic review, and accreditation/re-accreditation.</li>
        
        <li>The APDS shall be implemented in accordance with the limitations imposed by existing and new laws, such as on monthly net take-home pay (NTHP) and order of preference of deductions.</li>
    </ol>

    <!-- Accreditation and Assignment of APDS Code -->
    <div class="section-title">2. Accreditation and Assignment of APDS Code</div>
    
    <ol>
        <li>Accredited entities shall be assigned APDS codes for their exclusive use.</li>
        
        <li><strong>APDS Code {{ $mas_code ?: ($insurance_code ?: '[TBD]') }}, and the Sub-Codes</strong><sup>1</sup> <strong>listed in Annex "B", if any,</strong> for insurance premia and/or membership dues/contributions shall strictly be used for the collection of such payments only<sup>2</sup>.</li>
        
        <li>In case of issuance of a sub-code for policy loan, the rates of interest and other charges shall not be higher than the prescribed ceiling set under paragraph _____, Enclosure 1 of DepEd Order No. _____, s. 2021.</li>
        
        <li>The APDS Code is not transferable, for sale, or for assignment to any other entity, except in cases of acquisition, merger, and consolidation of entities. In the event that the Accredited Entity changes its corporate name or effects other corporate changes, the Accredited Entity shall furnish DepEd with duly certified copies of the amended Articles of Incorporation/Cooperation [as applicable to the entity] and by-laws approved by the SEC/CDA [as applicable to the entity] to enable the DepEd to update its records accordingly.</li>
    </ol>

    <!-- Processing of Applications -->
    <div class="section-title">3. Processing of Applications for Insurance Policy/Membership/Other Allowed Obligation</div>
    
    <ol>
        <li>For payment of insurance premia and/or membership dues/contributions intended to be serviced through the APDS, the Accredited Entity shall process applications for insurance policy/membership/other allowed obligation (hereinafter referred to as "Application") in accordance with the terms and conditions herein.</li>
        
        <li>Processing of <strong>online digital applications</strong> may be allowed under APDS, provided that DepEd is notified by the Accredited Entity in writing, duly supported with information on its detailed procedures/mechanics and online process flow presented to the DepEd Central Office APDS Task Force, and acknowledged/authorized by DepEd prior to its implementation.</li>
        
        <!-- Footnotes -->
        <div style="margin-top: 40px; border-top: 1px solid #000; padding-top: 10px;">
            <p><sup>1</sup> In case of multiple products and services, the Accredited Entity shall be issued a maximum of three (3) APDS Sub-Codes and shall cease using the APDS Code (main code). Annex C contains the list of Sub-Codes issued.</p>
            <p><sup>2</sup> The APDS Code and Sub-Codes (if any) issued in this TCAA shall not be used for deductions for any type of loan.</p>
        </div>

        <div class="page-break"></div>

        <li>The Accredited Entity <strong>shall exert all efforts to examine the authenticity of documents submitted online by the applicant</strong>. In case of fraud, and/or misrepresentation thereof, it shall be solely responsible for the process of approving the membership application of DepEd personnel.</li>

        <li>The Accredited Entity may approve an Application only upon issuance of a certification by the DepEd Verifier, secured by the Accredited Entity through the DepEd Employee (hereinafter referred to as "Employee"), stating that the monthly payments can be accommodated within the threshold of the monthly NTHP as required by the General Appropriations Act (GAA) at the time of approval of the Application. Succeeding deductions shall conform to the monthly NTHP as provided for by the GAA or other applicable laws at the time of the deduction.</li>

        <li>The Accredited Entity shall follow the procedure on the approval of Applications as contained in <strong>Annex "C-1 and C-2"</strong>.</li>
        
        <li>The Accredited Entity shall accept applications only from DepEd officials and personnel who have <strong>served at least six (6) months in DepEd</strong> and are incorporated in the regular payroll with issued employee number, whether assigned at the national, regional, schools division, or school level [implementing unit (IU) or non-IU].</li>
        
        <li>The Accredited Entity shall ensure that every Application and/or transaction is fully documented with a completely filled out Authority to Deduct (ATD), Certificate of Membership, Policy Contract, and/or other documents evidencing insurance coverage/membership. The ATD must be accomplished following the standard form/template as contained in <strong>Annex "D"</strong>, and with consistent information. The Accredited Entity shall furnish the Employee copies of these documents free of charge, upon approval of the Application.</li>
        
        <li>The Accredited Entity shall immediately notify the Employee upon approval of his/her Application.</li>
        
        <li>The Accredited Entity shall fully explain the terms and conditions of the insurance policy/membership/other allowed obligation to the Employee. The Accredited Entity shall submit a Sworn Statement to this effect together with its billing. (See <strong>Annex "E"</strong>)</li>
        
        <li>The Accredited Entity shall ensure that the venue of litigation in the event of legal suit against the Employee or the Accredited Entity shall be within the location of the Employee's work station only.</li>
    </ol>

    <!-- Billing of Insurance Premia -->
    <div class="section-title">4. Billing of Insurance Premia and/or Membership Dues/Contributions</div>
    
    <ol>
        <li>The Accredited Entity shall consolidate all the insurance policies and/or memberships approved within a month into one billing.</li>
        
        <li>The Accredited Entity shall be responsible for submitting monthly billings to the PSU and IU, and checking and retrieving any returned billings (refer to <strong>Annex F</strong> for the procedure). Any billing for new insurance premia and/or membership dues/contributions approved by the Accredited Entity that will reduce the monthly minimum NTHP shall not be accommodated and shall be returned to the Accredited Entity.</li>
        
        <li>The Accredited Entity shall not bill new insurance premia and/or membership dues/contributions if the Employee has existing Undeducted Obligations as reflected in his/her pay slip.</li>
        
        <li>For payments to be incorporated in the next payroll month, the Accredited Entity shall submit billings for all Applications approved within the current month on or before the <strong>5th working day</strong> of the same month. Under no circumstance shall the Accredited Entity bill an Employee for Applications and/or transactions not yet approved.</li>
        
        <li>The Accredited Entity shall submit billing statement to DepEd in an electronic format as agreed with the PSU and IU. The billing must be duly supported with soft copies of the required ATD, Certificate of Membership, Policy Contract, and/or other documents evidencing membership duly acknowledged by Employees, and Sworn Statement mentioned in item 3.9 above. Only billings certified by DepEd Verifier that such insurance premia or membership dues/contributions could be accommodated in the payroll and with complete supporting documents shall be processed by the PSU. The Accredited Entity may opt to submit billing statement via email (refer to <strong>Annex F</strong> for the procedure) or direct to the PSU/IU secondary school's office.
            <br><br>The APDS Accredited entity shall be solely responsible in case of misrepresentation in the submission of the said supporting documents.</li>
        
        <li>The Accredited Entity shall provide copies of the billings to the concerned Schools Division Offices within ten (10) days after the submission of its billing to the DepEd.</li>

        <li>The Accredited Entity shall not charge penalties/fines/surcharges due to delays of payments as a result of any of the following:
            <ol style="list-style-type: lower-alpha;">
                <li>Failure on the part of the Accredited Entity to pick up remittance checks;</li>
                <li>Non-remittance due to suspension or revocation of Accreditation;</li>
                <li>Failure of the DepEd to remit on time due to errors, inadvertence, force majeure, or any extreme circumstance;</li>
                <li>Non-existence of office or affiliate company in a particular province; and</li>
                <li>Other reasons/causes similar or analogous to the above.</li>
            </ol>
        </li>
        
        <li>The Accredited Entity shall be responsible for collecting the outstanding balances of its members outside APDS, in case of their retirement, resignation, or termination of appointment.</li>
        
        <li>In case of Employee's transfer of work station to other region but the Accredited Entity has no office/branch within the said region, <strong>for purposes of collection only</strong>, the Accredited Entity may submit the corresponding billing to the concerned PSU/IU. Such billing shall be supported with ATD signed by the Employee and other requirements specified in item 4.5 above.</li>
    </ol>

    <!-- Over-the-Counter Payments -->
    <div class="section-title">5. Over-the-Counter Payments</div>
    
    <ol>
        <li>The Accredited Entity shall not refuse to accept tender of payment made in advance by Employees, whether partial or in full. Official receipt (OR) shall be issued on the date of payment.</li>
        
        <li>In case of full payment of dues by the Employee, the Accredited Entity shall automatically include the Employee's name in the list of insurance premia/membership deductions for stoppage in the payroll and in the Deletion File to be effected immediately in the next payroll month.</li>
        
        <li>The Accredited Entity shall request the PSU and IU the monthly list of payroll deductions that were stopped, and the corresponding supporting documents such as the Employee's request for stoppage.</li>
    </ol>

    <!-- Over-deduction -->
    <div class="section-title">6. Over-deduction</div>
    
    <ol>
        <li>In case of over-deductions, the Accredited Entity shall refund the corresponding amount to the Employee concerned within thirty (30) days from knowledge or notice thereof.</li>
        
        <li>The Accredited Entity shall request DepEd for the adjustment of Service Fee in the next payroll month, corresponding to the amount refunded on over-deductions. The said request must be duly supported with proof of refund, duly acknowledged by the Employee.</li>
    </ol>

    <!-- Remittance -->
    <div class="section-title">7. Remittance</div>
    
    <ol>
        <li>The Accredited Entity shall pay DepEd a service fee of _____ percent (___%) of the total monthly collection, which shall be automatically deducted from their collection before remittance. [The rate shall be based on Title IV General Principles, paragraph 26, of the Revised Guidelines on Accreditation/Re-Accreditation of Private Entities under the APDS.]</li>
        
        <li>The Accredited Entity shall issue an OR to DepEd within fifteen (15) days after remittance of payments. Failure to do so will cause the suspension of the release of succeeding remittances until the issuance of the OR. The Accredited Entity may request DepEd to remit the payments through either of the following modes:
            <ol style="list-style-type: lower-alpha;">
                <li>Through intra- or interbank fund transfer: The Accredited Entity shall coordinate with the remitting DepEd office for the procedure in setting up the fund transfer. The Accredited Entity shall shoulder the service charge, if any.</li>
                <li>Through check: The Accredited Entity shall pick up the remittance check from DepEd within the succeeding month after the deductions were effected in the payroll. Otherwise, the preparation of succeeding checks will be suspended until the prepared check is picked up. Any request for replacement of stale checks shall be supported by written justification from the Accredited Entity.</li>
            </ol>
        </li>
        
        <li>Payments for insurance premia and/or membership dues/contributions shall be refunded to the concerned Employees in case the corresponding remittance checks become stale and not requested by the Accredited Entity for replacement after notification by DepEd for three (3) times.</li>
    </ol>

    <!-- Documentary Requirements -->
    <div class="section-title">8. Documentary Requirements</div>
    
    <ol>
        <li>The Accredited Entity shall ensure the issuance of a Statement of Account (SOA) to an Employee, free of charge, annually and anytime upon request, preferably within the day that the request was made by DepEd or by the Employee, but in no case after more than three (3) days from such request. The SOA shall include an up-to-date payment history.</li>
        
        <li>The Accredited Entity shall submit through email or electronic medium (USB) and other digital means the following documents, duly certified as true copies by the concerned government regulatory agencies (i.e. SEC/CDA/IC) to the DepEd Central Office (CO) annually, through the APDS Secretariat, on or before September 30, except for business permit/s, the deadline for which is March 31 of the current year:
            <ul>
                <li>Audited Financial Statements for the previous year, duly filed and stamped received by the BIR</li>
                <li>Corporate income tax return for the previous year, duly filed and stamped received by the BIR</li>
                <li>Business Permit/s for the current year in the provinces where the Accredited Entity has its office/s</li>
            </ul>
            <em>[Additional documents as applicable to the entity:]</em>
            <ul>
                <li>SEC Certification that (i) the Accredited Entity has not been dissolved and (ii) that the Commission has not received any derogatory information that would prevent the entity from exercising its purpose/s as stated in its Articles of Incorporation. The Certification shall cover a period of one year immediately preceding its issuance.</li>
                <li>General Information Sheet for the current year stamped received by the SEC</li>
                <li>Certificate of Compliance issued by the CDA for the current year</li>
                <li>Cooperative Annual Progress Report (CAPR) for the current year</li>
                <li>PDIC Certificate of Good Standing covering the current year</li>
                <li>IC Certificate of Authority covering the current year</li>
            </ul>
        </li>
    </ol>

    <!-- Other Conditions -->
    <div class="section-title">9. Other Conditions</div>
    
    <ol>
        <li>The Accredited Entity shall not enter into any contract or agreement with DepEd offices other than the CO/Regional Office (RO) regarding insurance premia and/or membership dues/contributions under APDS.</li>
        
        <li>The Accredited Entity shall limit its operation to provinces/regions where it has office/s or affiliates companies. The office shall employ a full-time manager or authorized personnel, and staff who shall maintain the complete records/documents, accept payments, issue SOA, OR, and CFP, and attend to other transactions and any queries/complaints of DepEd personnel. <strong>Annex "G"</strong>, which forms an integral part of this TCAA, contains the provinces/region/s, including the location of the main office per province/region, where the Accredited Entity is authorized to operate.</li>
        
        <li>In case of transfer of the Accredited Entity's office/s to another location or site, the Accredited Entity shall notify DepEd in writing regarding such transfer before the closure of the existing office/s, and submit corresponding necessary documents, for proper validation.</li>
        
        <li>In case of change in contact number/s regardless if post-paid or registered mobile number or landline telephone, the Accredited Entity shall notify/update DepEd Central Office by submitting a Certification stating therein the changes on contact number/s that will be officially used in transacting with DepEd employees.</li>
        
        <li>The Accredited Entity shall make available to DepEd for inspection at any reasonable time all ATDs, Certificates of Membership, Policy Contracts, and other related documents in the course of periodic review.</li>
        
        <li>In case of a merger or consolidation involving the Accredited Entity, the Accredited Entity shall make sure that the surviving entity shall submit the following within three (3) months upon their availability, in addition to the documents required for accreditation:
            <ul>
                <li>Formal letter signifying their intention to maintain their APDS accreditation for insurance premia and/or membership dues/contributions under the same deduction code/s together with a board resolution or secretary's certificate;</li>
                <li>Certified true copy of the Articles of Merger or Consolidation; and</li>
                <li>Deed of Assignment, if any.</li>
            </ul>
        </li>
        
        <li>In case the Accredited Entity is put under Liquidation by the Insurance Commission (IC), the DepEd shall coordinate with the IC as to how the deductions for insurance premia and/or membership dues/contributions will be stopped in the payroll.</li>
        
        <li>The Accredited Entity shall not use the name of DepEd or the term "public school teacher" in its promotions or in any form of advertisement.</li>
    </ol>

    <!-- Necessary Attachments -->
    <div class="section-title">10. Necessary Attachments</div>
    
    <ol>
        <li>This TCAA shall include as integral parts the following attachments:
            <ol>
                <li><strong>Annex "A"</strong> -- Notarized Secretary's Certificate supported by a Board Resolution authorizing the Accredited Entity's representative to execute this TCAA.</li>
                <li><strong>Annex "B"</strong> -- List of Sub-Codes, if any, and the corresponding products and/or services under each Sub-Code, with proof of approval from their respective government regulatory agencies to offer such products and/or services as required in paragraph 30.1.5.e of the Revised Guidelines on Accreditation/Re-Accreditation of Private Entities under the APDS.</li>
                <li><strong>Annex "C-1 and C-2"</strong> -- Procedures for the Processing of DepEd Employees' Applications for Insurance Premia and/or Membership Dues/Contributions with the Accredited Entities Under the Department's APDS (on-site/manual and on-line process, respectively)</li>
                <li><strong>Annex "D"</strong> -- APDS Template/Standard Format of Authority to Deduct.</li>
                <li><strong>Annex "E"</strong> -- Sworn Statement regarding the documents submitted and full explanation of the terms and conditions to the Employees.</li>
                <li><strong>Annex "F"</strong> -- Procedures for the Online Process on the Submission of Monthly Billing Statements by the Accredited Entity Under the Department's Program on APDS</li>
                <li><strong>Annex "G"</strong> -- Provinces/Regions where the Accredited has office/s as validated by DepEd, with the main office per region identified, indicating therein the address/es, official contact numbers, and the name/s of manager/s and contact person/s</li>
                <li><strong>Annex "H"</strong> -- Grounds for Suspension or Revocation of Accreditation</li>
            </ol>
        </li>
    </ol>

    <!-- Grounds for Suspension or Revocation -->
    <div class="section-title">11. Grounds for Suspension or Revocation</div>
    
    <ol>
        <li>The Accredited Entity agrees that its Accreditation may be suspended or revoked by DepEd based on grounds enumerated in <strong>Annex "H"</strong>.</li>
        
        <li>Suspension, which involves the withholding of remittance for not less than one (1) month but not more than six (6) months, and the corresponding non-acceptance of new business or deduction billing for not less than one (1) month, shall be imposed upon repeated commission of grounds classified as "Simple".</li>
        
        <li>The Accreditation shall be revoked upon commission of grounds classified as "Serious". When the Accreditation is revoked, the Accredited Entity shall no longer be allowed to grant new business in the affected provinces/regions under the APDS. However, collection of deductions already incorporated in the APDS as of the date of revocation shall continue for the next three (3) months or until requested for stoppage by the concerned Employees, whichever comes earlier. Within sixty (60) calendar days from the said revocation, DepEd shall notify the concerned Employees of the stoppage of deductions, and the latter may transact and/or pay directly to the formerly accredited entity, or terminate their memberships therewith. Thereafter, the APDS Code and Sub-Codes, if any, are automatically cancelled.</li>
        
        <li>Any suspension or revocation imposed upon a particular office shall likewise be considered as sanction against all its other offices within the same region. If imposed on the Head Office, the same shall be imposed upon all its other offices in the national level; and</li>
        
        <li>Any complaint for the commission of any of the grounds for suspension or revocation should be made in writing. For the purposes of a formal investigation, the complaint must:
            <ul>
                <li>Contain the names and addresses of the complainant/s;</li>
                <li>Contain the entity or person subject of the complaint;</li>
                <li>Contain the acts or omissions complained of constituting the infraction, based on the personal knowledge of the complainant;</li>
                <li>Be accompanied with supporting documents, as needed; and</li>
                <li>Be notarized.</li>
            </ul>
            However, DepEd shall not be precluded from conducting an investigation/fact-finding on the basis of other information received or discovered.
        </li>
        
        <li>Commission of grounds for suspension or revocation shall be validated by the appropriate committee or task force designated by the Secretary. The APDS Task Forces in the CO and ROs may impose the suspension or revocation as a result of its investigation. The suspension or revocation may be appealed to the Office of the Secretary, through the Office of the Undersecretary for Finance, within a period of fifteen (15) days from notice. Pending the resolution by the Office of the Secretary, the suspension or revocation shall be held in abeyance. The suspension or revocation imposed by the APDS Task Force shall be reported to the Secretary, through the Undersecretary for Finance, for monitoring and records purposes.</li>
    </ol>

    <!-- Effectivity of the TCAA -->
    <div class="section-title">12. Effectivity of the TCAA</div>
    
    <ol>
        <li>This TCAA shall be valid upon signing and notarization, and shall be effective until <strong>December 31, 2025.</strong></li>
        
        <li>For purposes of renewal of this TCAA, the Accredited Entity shall submit its <strong>Letter of Intent</strong> for the APDS re-accreditation at least <strong>one (1) month</strong> prior to the date of expiration.</li>
    </ol>

    <!-- Final Provisions -->
    <div class="section-title">13. Final Provisions</div>
    
    <ol>
        <li>This TCAA, its annexes, and pertinent DepEd issuances shall be the governing documents with reference to the inclusion of the Accredited Entity in the APDS.</li>
        
        <li>The Accredited Entity shall conform to any APDS policy subsequently issued by DepEd in the form of DepEd Order, Memorandum, or other issuance. Any provision in this TCAA affected by such subsequent APDS policy is deemed automatically modified or repealed as applicable.</li>
    </ol>

    <!-- Signature Section -->
    <div class="signature-section">
        <p class="bold">CONFORME:</p>
        
        <div style="">
            <p class="bold">{{ $pli_name }}</p>
            <BR></BR>
            <div class="signature-line"></div>
            <p><em>REPRESENTATIVE NAME & DESIGNATION</em></p>
        </div>
        
        <div style="margin-top: 40px; text-align: center;">
            <p class="bold">ACKNOWLEDGEMENT</p>
            
        </div>
    </div>

</body>
</html>