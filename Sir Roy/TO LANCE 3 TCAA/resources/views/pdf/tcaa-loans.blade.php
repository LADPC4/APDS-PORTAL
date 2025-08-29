<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCAA for Loans - {{ $pli_name }}</title>
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
            <strong>PLI:</strong> {{ $pli_name }} | <strong>Document:</strong> TCAA for Loans
        </div>
    </div>

    <!-- Header Section -->
    <div class="header">
        <div class="title">Terms and Conditions of the APDS Accreditation (TCAA)</div>
        <div class="subtitle">FOR LOANS</div>
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
        <li>Participation in the DepEd Automatic Payroll Deduction System (APDS) at the national, regional and school levels may be granted to private institutions authorized under specific law to be paid through salary deductions, and accredited by DepEd after fulfillment of requirements as provided in DepEd Order No. 999, s. 2021</li>
        
        <li>The accredited private institution shall subscribe to the following principles:
            <ol style="list-style-type: lower-alpha;">
                <li>Full transparency in reporting operations and financial status as evidenced by audited financial statements and appropriate disclosure statements; and</li>
                <li>Integrity of operations through proper and complete documentation of loans to DepEd personnel.</li>
            </ol>
        </li>
        
        <li>The DepEd shall ensure that the objectives and purposes of APDS are achieved through proper regulation, periodic review, and accreditation/re-accreditation.</li>
        
        <li>The APDS shall be implemented in accordance with the limitations imposed by existing and new laws, such as on monthly net take-home pay (NTHP) and order of preference of deductions.</li>
    </ol>

    <!-- Accreditation and Assignment of APDS Code -->
    <div class="section-title">2. Accreditation and Assignment of APDS Code</div>
    
    <ol>
        <li>Accredited entities shall be assigned APDS codes for their exclusive use.</li>
        
        <li><strong>APDS Code {{ $loan_code ?: '[TBD]' }}</strong> for lending business shall strictly be used for the collection of loan payments only<sup>1</sup>.</li>
        
        <li>The APDS Code is not transferable, for sale, or for assignment to any other entity, except in cases of acquisition, merger, and consolidation of entities. In the event that the Lender changes its corporate name or effects other corporate changes, the Lender shall furnish DepEd with duly certified copies of the amended Articles of Incorporation/Cooperation [as applicable to the entity] and by-laws approved by the SEC/CDA [as applicable to the entity] to enable the DepEd to update its records accordingly.</li>
    </ol>
    
    <!-- Granting of Loans -->
    <div class="section-title">3. Granting of Loans</div>
    
    <ol>
        <li>For loans intended to be serviced through the APDS, the Lender shall process loan applications and release loan proceeds in accordance with the terms and conditions herein.</li>
        
        <li><strong>Processing of online/digital applications may be allowed under APDS, provided DepEd is notified by the Lender in writing, duly supported with information on its detailed procedures/mechanics and online process flow in granting loans presented to the DepEd Central Office APDS Task Force, and acknowledged/authorized by DepEd.</strong></li>
        
        <li><strong>The Lender shall exert all efforts to examine the authenticity of documents submitted online by the applicant. In case of fraud, and/or misrepresentation thereof, it shall be solely responsible for the process of approving the membership applications of DepEd personnel.</strong></li>
        
        <li>The Lender may approve a loan only upon certification by the DepEd Verifier, secured by the Lender through the DepEd Borrower (hereinafter referred to as "Borrower"), stating that the monthly payments can be accommodated within the threshold of the monthly NTHP as required in the General Appropriations Act (GAA) at the time of approval of loan. Succeeding deductions shall conform to the monthly NTHP as provided by the GAA or other applicable laws at the time of the deduction.</li>
        
        <!-- Footnote -->
        <div style="margin-top: 40px; border-top: 1px solid #000; padding-top: 10px;">
            <p><sup>1</sup> The APDS Code issued in this TCAA shall not be used for deductions for insurance premia and/or membership dues/contributions.</p>
        </div>
        <div class="page-break"></div>

        <li>The Lender shall accept loan applications only from DepEd <strong>officials and</strong> personnel who have <strong>served at least six (6) months in DepEd and</strong> are incorporated in the regular payroll with issued employee number, whether assigned at the national, regional, schools division, or school level [implementing unit (IU) or non-IU].</li>

        <li>The Lender shall follow the procedure on the processing of loan application and approval as contained in <strong>Annex "B-1" (for on-site/manual processing) and Annex "B-2" (for online processing).</strong></li>
        
        <li>The Lender shall immediately release the loan proceeds to the Borrower upon approval.</li>
        
        <li>The Lender shall ensure that every loan is fully documented with a completely filled out Authority to Deduct (ATD), Promissory Note (PN), and Disclosure Statement (DS). These must be accomplished following the standard forms/templates as contained in Annexes "C-1" and "C-2", and with consistent information. The Lender shall furnish the Borrower copies of these documents free of charge, upon release of the loan, including a copy of the amortization schedule, in accordance with Annexes "D-1" to "D-3" of this TCAA.</li>
        
        <li>Except for existing loans at the time of execution of this TCAA, the Lender is authorized to grant only one (1) <strong>new</strong> loan per Borrower for inclusion in the APDS. <strong>However, the Lender may grant additional loan to Borrowers in the event there is a declaration of state of calamity in the particular province/s, subject to NTHP verification.</strong>
            <ol style="list-style-type: lower-alpha;">
                <li><strong>Availment of this additional loan shall be available within three (3) months after the declaration of state of calamity.</strong></li>
                <li><strong>Additional loan due to other forms of emergency situation shall also be allowed upon the approval of the DepEd Secretary through the Undersecretary for Finance</strong></li>
            </ol>
        </li>
        
        <li>In case of loan renewal, the Lender shall deduct the outstanding principal balance from the proceeds of the renewed loan and reflect such in the Disclosure Statement (DS). All loan renewals, regardless whether applied for by the <strong>Borrower</strong> before its end term, shall be treated as a new loan. <strong>Application for renewal of loan shall be allowed only once on existing loans granted under the previous TCAA of the Lender, as reflected in the pay slip of DepEd personnel.</strong></li>
        
        <li><strong>The Lender may be allowed to offer one-time restructuring of current and past due loans (Undeducted Obligations) to the Borrower, subject to the following conditions:</strong>
            <ol style="list-style-type: lower-roman;">
                <li><strong>Application for loan restructuring by the Borrower is voluntary;</strong></li>
                <li><strong>Only loans reflected on the pay slip of the Borrower shall be restructured;</strong></li>
                <li><strong>In case the Lender has granted more than one (1) loan to a Borrower as reflected on the Borrower's pay slip, the Lender shall consolidate these into one (1) loan during restructuring; and</strong></li>
                <li><strong>Penalties, if any, shall be waived (i.e., shall not be charged against the Borrower directly or indirectly)</strong></li>
            </ol>
        </li>
        
        <li><strong>Granting of additional, renewal and restructuring of loans shall be subject DepEd's verification process if the corresponding loan amortization can be accommodated in the payroll, and shall be with lower or the same loan terms based on the TCAA.</strong></li>
        
        <li>The Lender shall abide by the APDS policies on the terms and conditions of loans to be offered to Borrowers, including but not limited to the ceilings on interest rates and non-interest charges, and shall not impose any other charges except as provided in Annexes "D-1" to "D-3" of this enclosure.</li>
        
        <li>The Lender shall ensure that conditions on penalties and/or past due interest on loans, if any, shall be reflected in the DS to be signed by Borrowers, with a notation that the same shall not be collected through the APDS. The fully accomplished DS shall be an indispensable requirement for inclusion of the loan in the APDS.</li>
        
        <li>The Lender shall not compel any Borrower to take out any type of insurance contract as a condition to the loan agreement, except credit life insurance, the premium for which shall be included in the one-time other charges specified in Annexes "D-1" to "D-3".</li>
        
        <li>The Lender shall fully explain the terms and conditions of the loan to the Borrower. The Lender shall submit a Sworn Statement to this effect together with its billing. (See Annex "E" for the sample.)</li>
        
        <li>The Lender shall not require the surrender of an Automated Teller Machine (ATM) card as collateral from Borrowers for their loans.</li>
        
        <li>The Lender shall not deduct advance payments from the loan proceeds of the Borrowers.</li>
        
        <li>The Lender shall ensure that the venue of litigation in the event of legal suit against the Borrower or the Lender shall be within the location of the Borrower's work station only.</li>
    </ol>
    
    <div class="page-break"></div>

    <!-- Billing of Loans -->
    <div class="section-title">4. Billing of Loans</div>
    
    <ol>
        <li>The Lender shall consolidate all the loan accounts granted within a month into one billing.</li>
        
        <li>The Lender shall be responsible for submitting monthly billings to the PSU and IU, and checking and retrieving any returned billings <strong>(refer to Annex F for the procedure).</strong> Any billing for new loans granted by the Lender that will reduce the monthly minimum NTHP shall not be accommodated and shall be returned to the Lender.</li>
        
        <li>The Lender shall not bill new loans if the Borrower has existing Undeducted Obligations as reflected in his/her pay slip.</li>
        
        <li>For loan amortizations to be incorporated in the next payroll month, the Lender shall submit billings for all loans granted within the current month on or before the <strong>5th working</strong> day of the same month. Under no circumstance shall the Lender bill a Borrower for loans not yet granted.</li>
        
        <li>The Lender shall submit <strong>billing statement</strong> to DepEd in an electronic format as agreed with the PSU and IU. <strong>The</strong> billing must be duly supported <strong>with soft</strong> copies of the required ATD, PN, DS, proof of loan release (i.e. checks, loan vouchers, credit memos, remittance lists, and others) duly acknowledged by Borrowers and Sworn Statement mentioned in item 3.12 above.
            <ol style="list-style-type: lower-alpha;">
                <li><strong>Only billings certified by DepEd Verifier that such loan amortization could be accommodated in the payroll and with complete supporting documents shall be processed by the PSU. The Lender may opt to submit billing statement via email or direct to the PSU/IU secondary school's office.</strong></li>
                <li><strong>Notarization of the PN is optional. Unless it is notarized, notarial fee shall not be included under Other Charges.</strong></li>
                <li><strong>The Lender shall be solely responsible in case of misrepresentation in the submission of the said supporting documents.</strong></li>
            </ol>
        </li>
        
        <li>The Lender shall provide copies of the billings to the concerned Schools Division Offices within ten (10) days after the submission of its billing to the DepEd.</li>
        
        <li>The Lender shall not charge penalties/fines/surcharges due to delays of payments as a result of any of the following:
            <ol style="list-style-type: lower-alpha;">
                <li>Failure on the part of the Lender to pick up remittance checks;</li>
                <li>Non-remittance due to suspension or revocation of Accreditation;</li>
                <li>Failure of the DepEd to remit on time due to errors, inadvertence, force majeure, or any extreme circumstance;</li>
                <li>Non-existence of office <strong>or affiliate company</strong> in a particular province; and</li>
                <li>Other reasons/causes similar or analogous to the above.</li>
            </ol>
        </li>
        
        <li><strong>In case of Borrower's transfer of work station to other region, for purposes of collection only, the Lender may submit the corresponding billing to the concerned PSU/IU. Such billing shall be supported with new ATD signed by the Borrower and other requirements specified in item 4.5 above. The Lender shall not renew the Borrower's loan unless the former has established office or affiliate/partner duly acknowledged by DepEd in the region where the Borrower has transferred.</strong></li>
        
        <li><strong>In case the Borrower was temporarily removed from the regular payroll due to prolonged leave of absence, (or any other similar or analogous reasons), the loan deductions on his/her pay slip shall be retained and shall appear once he/she has reported back to office, and is integrated back to the regular payroll.</strong></li>
        
        <li><strong>The Lender shall be responsible for collecting the outstanding loans of its Borrowers outside APDS, in case of their retirement, resignation or termination of appointment.</strong></li>
    </ol>

    <!-- Over-the-Counter Payments -->
    <div class="section-title">5. Over-the-Counter Payments</div>
    
    <ol>
        <li>The Lender shall not refuse to accept tender of payment made in advance by Borrower, whether partial or in full. <strong>In case of full payment, the Lender shall immediately: a) inform the PSU/IU to delete the loan deductions; and b) submit the deletion file for the said deduction.</strong></li>
        
        <li>In case of advance payment, the Lender shall collect only the outstanding principal balance and shall charge interest only up to the date when the advance payment was made.</li>
        
        <li><strong>In case of full payment of loan by the Borrower, the Lender shall automatically include the Borrower's name in the list of loan amortizations for stoppage in the payroll and in the Deletion File to be effected immediately in the next payroll month.</strong></li>
        
        <li>The Lender shall request the PSU and IU the monthly list of payroll deductions that were stopped, and the corresponding supporting documents such as the Borrower's request for stoppage.</li>
    </ol>

    <!-- Over-deduction -->
    <div class="section-title">6. Over-deduction</div>
    
    <ol>
        <li>In case of over-deductions, the Lender shall refund the corresponding amount to the Borrower concerned within thirty (30) days from knowledge or notice thereof.</li>
        
        <li><strong>The Lender shall request DepEd for the adjustment of Service Fee in the next payroll month, corresponding to the amount refunded on over-deductions. The said request must be duly supported with proof of refund, duly acknowledged by the Borrower.</strong></li>
    </ol>

    <!-- Remittance -->
    <div class="section-title">7. Remittance</div>
    
    <ol>
        <li>The Lender shall pay DepEd a service fee of _____ percent (___%) of the total monthly collection, which shall be automatically deducted from their collection before remittance. [The rate shall be based on Title IV General Principles, paragraph 26, of the Revised Guidelines on Accreditation/Re-Accreditation of Private Entities under the APDS.]</li>
        
        <li>The Lender shall issue an OR to DepEd within fifteen (15) days after remittance of payments. Failure to do so will cause the suspension of the release of succeeding remittances until the issuance of the OR. The Lender may request DepEd to remit the payments through either of the following modes:
            <ol style="list-style-type: lower-alpha;">
                <li>Through intra- or interbank fund transfer: The Lender shall coordinate with the remitting DepEd office for the procedure in setting up the fund transfer. The Lender shall shoulder the service charge, if any.</li>
                <li>Through check: The Lender shall pick up the remittance check from DepEd within the succeeding month after the deductions were effected in the payroll. Otherwise, the preparation of succeeding checks will be suspended until the prepared check is picked up. Any request for replacement of stale checks shall be supported by written justification from the Lender.</li>
            </ol>
        </li>
        
        <li><strong>Loan amortizations shall be refunded to the Borrowers in case the corresponding remittance check became stale and not requested by the Lender for replacement after notification by the DepEd for three (3) times.</strong></li>
    </ol>

    <!-- Documentary Requirements -->
    <div class="section-title">8. Documentary Requirements</div>
    
    <ol>
        <li>The Lender shall ensure the issuance of a Statement of Account (SOA) for every loan granted to a Borrower, free of charge, annually and anytime upon request, preferably within the day that the request was made by DepEd or by the Borrower, but in no case after more than three (3) days from such request. The SOA shall include an up-to-date payment history.</li>
        
        <li>The Lender shall <strong>submit through email or electronic medium (USB), and other digital means,</strong> the following documents, <strong>duly certified as true copies by the concerned government regulatory agencies (i.e. SEC/CDA/IC),</strong> to the DepEd Central Office (CO), annually, through the APDS Secretariat, on or before September 30, except for business permit/s, the deadline for which is March 31 of the current year.
            <ul>
                <li>Audited Financial Statements for the previous year, duly filed and stamped received by the BIR</li>
                <li>Corporate income tax return for the previous year, duly filed and stamped received by the BIR</li>
                <li>Business Permit/s for the current year in the provinces where the Lender has its office/s</li>
            </ul>
            <em>[Additional documents as applicable to the entity:]</em>
            <ul>
                <li>SEC Certification that (i) the Lender has not been dissolved and (ii) that the Commission has not received any derogatory information that would prevent the entity from exercising its purpose/s as stated in its Articles of Incorporation. The Certification shall cover a period of one year immediately preceding its issuance.</li>
                <li>General Information Sheet for the current year stamped received by the SEC</li>
                <li>Certificate of Compliance issued by the CDA for the current year</li>
                <li>Cooperative Annual Progress Report (CAPR) for the current year</li>
                <li>PDIC Certificate of Good Standing covering the current year</li>
                <li>IC Certificate of Authority covering the current year</li>
            </ul>
        </li>

        <li>The Lender shall submit to the DepEd CO, copy furnished the concerned DepEd Regional Offices (ROs), reports on Outstanding Loan Receivables from Borrowers, duly certified by the Lender's Chief Accountant or his/her equivalent, on a semi-annual basis (in electronic-- <strong>MS Excel format</strong> and hard copies) scheduled as follows:
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Cut-off Period</th>
                        <th>Deadline</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>As of June 30 of the year</td>
                        <td>On or before September 30 of the year</td>
                    </tr>
                    <tr>
                        <td>As of December 31 of the year</td>
                        <td>On or before March 31 of the following year</td>
                    </tr>
                </tbody>
            </table>
        </li>
    </ol>

    <!-- Other Conditions -->
    <div class="section-title">9. Other Conditions</div>
    
    <ol>
        <li>The Lender shall not enter into any contract or agreement with DepEd offices other than the CO/RO regarding salary loans under APDS.</li>
        
        <li>The Lender shall limit its operation to provinces/<strong>regions</strong> where it has office/s <strong>affiliate companies</strong>. The office shall employ a full-time manager <strong>or authorized personnel,</strong> and staff who shall maintain the complete records/loan documents, accept payments, issue SOA, OR, and CFPL, and attend to other loan transactions and any queries/complaints of DepEd personnel. Annex <strong>"G",</strong> which forms an integral part of this TCAA, contains the provinces/<strong>regions</strong>, including the location of the main office per province/<strong>region,</strong> where the Lender is authorized to operate.</li>
        
        <li>In case of transfer of the Lender's office/s to another location or site, the Lender shall notify DepEd in writing regarding such transfer before the closure of the existing office/s, and submit corresponding necessary documents, for proper validation.</li>
        
        <li><strong>In case of change in contact number/s regardless if post-paid or registered mobile in the name of the Lender or landline telephone, the Lender shall notify/update DepEd Central Office by submitting a Certification stating therein the changes on contact number/s that will be officially used in transacting with DepEd employees</strong>.</li>
        
        <li>The Lender shall make available to DepEd for inspection at any reasonable time all ATDs, PNs, DS and other related documents in the course of periodic review of the loan portfolio.</li>
        
        <li>In case of a merger or consolidation involving the Lender, the Lender shall make sure that the surviving entity shall submit the following within three (3) months upon their availability, in addition to the documents required for accreditation:
            <ul>
                <li>Formal letter signifying their intention to maintain their APDS accreditation for lending under the same deduction code together with a board resolution or secretary's certificate;</li>
                <li>Certified true copy of the Articles of Merger or Consolidation; and</li>
                <li>Deed of Assignment, if any.</li>
            </ul>
        </li>
        
        <li><strong>In case the Lender is put under Receivership/Liquidation, the DepEd shall continue the payroll deduction from the monthly salary of the Borrower until full payment and the corresponding remittance to the appropriate government regulatory agency (PDIC for banks, CDA for cooperatives, Insurance Commission for insurance companies, etc.). However, the DepEd shall automatically stop the deductions of loan amortization in case of written request from the Borrower.</strong></li>
        
        <li>The Lender shall not use the name of DepEd or the term "public school teacher" in its promotions or in any form of advertisement.</li>
    </ol>

    <!-- Necessary Attachments -->
    <div class="section-title">10. Necessary Attachments</div>
    
    <ol>
        <li>This TCAA shall include as integral parts the following attachments:
            <ol>
                <li><strong>Annex "A"</strong> -- Notarized Secretary's Certificate supported by a Board Resolution authorizing the Lender's representative to execute this TCAA.</li>
                <li><strong>Annexes "B-1 and B-2"</strong> - Procedures for the Processing of Loan Applications of DepEd Borrowers Under the Department's APDS (on-site/manual and on-line process, respectively)</li>
                <li><strong>Annexes "C-1" and "C-2"</strong> -- APDS Templates/Standard Format of Authority to Deduct, Promissory Note, and Disclosure Statement.</li>
                <li><strong>Annexes "D-1" to "D-3"</strong> -- Effective Interest Rate Calculation Models for 1-, 2-, and 3-year loans using the DepEd ceilings for interest rates and other charges.</li>
                <li><strong>Annex "E"</strong> -- Sample Sworn Statement regarding the loan documents submitted and full explanation of the terms and conditions of the loans to the Borrowers.</li>
                <li><strong>Annex "F"</strong> -- <strong>Procedures for the Online Process on the Submission of Monthly Billing Statements by the Lender Under the Department's Program on APDS</strong></li>
                <li><strong>Annex "G"</strong> ---- Provinces/<strong>Regions</strong> where the Lender has office/s as validated by DepEd, with the main office per province/<strong>region</strong> identified, indicating therein the address/es<strong>, official contact numbers,</strong> and the name/s of manager/s and contact person/s.</li>
                <li><strong>Annex "H"</strong> -- Grounds for Suspension or Revocation of Accreditation.</li>
            </ol>
        </li>
    </ol>

    <!-- Grounds for Suspension or Revocation -->
    <div class="section-title">11. Grounds for Suspension or Revocation</div>
    
    <ol>
        <li>The Lender agrees that its Accreditation may be suspended or revoked by DepEd based on grounds enumerated in Annex <strong>"H".</strong></li>
        
        <li>Suspension, which involves the withholding of remittance for not less than one (1) month but not more than six (6) months, and the corresponding non-acceptance of new business or deduction billing for not less than one (1) month, shall be imposed upon repeated commission of grounds classified as "Simple".</li>
        
        <li>The Accreditation shall be revoked upon commission of grounds classified as "Serious". When the Accreditation is revoked, the Lender shall no longer be allowed to grant new business in the affected provinces/<strong>regions</strong> under the APDS. However, collection of deductions already incorporated in the APDS as of the date of revocation shall continue up to the termination dates reflected in the pay slip. Thereafter, the APDS Code is automatically cancelled.</li>
        
        <li>Any suspension or revocation imposed upon a particular office shall likewise be considered as sanction against all its other offices within the same province/<strong>region</strong>. If imposed on the Head Office, the same shall be imposed upon all its other offices in the national level; and</li>
        
        <li>Any complaint for the commission of any of the grounds for suspension or revocation should be made in writing and sufficient in form and substance. For the purposes of a formal investigation, the complaint must:
            <ul>
                <li>Contain the names and addresses of the complainant/s;</li>
                <li>Contain the entity or person subject of the complaint;</li>
                <li>Contain the acts or omissions complained of constituting the infraction, based on the personal knowledge of the complainant;</li>
                <li>Be accompanied with supporting documents, as needed; and</li>
                <li>Be notarized.</li>
            </ul>
            However, DepEd shall not be precluded from conducting an investigation/fact-finding on the basis of other information received or discovered.
        </li>
        
        <li>Commission of grounds for suspension or revocation shall be validated by the appropriate committee or task force designated by the Secretary. The APDS Task Forces in the CO and ROs may impose the suspension or revocation as a result of its investigation. The suspension or revocation may be appealed to the Office of the Secretary, through the Office of the Undersecretary for Finance -- DA, within a period of fifteen (15) days from notice. Pending the resolution by the Office of the Secretary, the suspension or revocation shall be held in abeyance. The suspension or revocation imposed by the APDS Task Force shall be reported to the Secretary, through the Undersecretary for Finance -- DA, for monitoring and records purposes.</li>
    </ol>

    <div class="page-break"></div>

    <!-- Effectivity of the TCAA -->
    <div class="section-title">12. Effectivity of the TCAA</div>
    
    <ol>
        <li>This TCAA shall be valid upon signing and notarization, and shall be effective until <strong>December 31, 2025.</strong></li>
        
        <li>For purposes of renewal of this TCAA, the Lender shall submit its <strong>Letter of Intent</strong> for the APDS re-accreditation at least <strong>one (1) month</strong> prior to the date of expiration</li>
    </ol>

    <!-- Final Provisions -->
    <div class="section-title">13. Final Provisions</div>
    
    <ol>
        <li>This TCAA, its annexes, and pertinent DepEd issuances shall be the governing documents with reference to the inclusion of the Lender in the APDS.</li>
        
        <li>The Lender shall conform to any APDS policy subsequently issued by DepEd in the form of DepEd Order, Memorandum, or other issuance. Any provision in this TCAA affected by such subsequent APDS policy is deemed automatically modified or repealed as applicable.</li>
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