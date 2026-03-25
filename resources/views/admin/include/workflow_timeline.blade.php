<style>
    /* Match theme specificity: .timeline-line .item-timeline .t-text p sets color */
    #timelineMinimal .timeline-line .item-timeline .t-text p.t-meta-return {
        font-size: 12px;
        color: #9611b1;
    }
</style>
<div id="timelineMinimal" class="layout-spacing mt-4">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Workflow</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area pb-1">
            <div class="mt-container mx-auto">
                <div class="timeline-line">
                    @foreach ($workflows as $row)
                        <div class="item-timeline">
                            <p class="t-time">{{ format_date_other($row->created_at) }}</p>

                            <div class="t-dot 
                                {{ $row->appl_status == 'RE' ? 't-dot-danger' : ($row->appl_status == 'A' ? 't-dot-success' : 't-dot-info') }}">
                            </div>

                            <div class="t-text">
                                @php
                                    $processedBy = $row->processed_by;
                                    $roleLabel = match ($processedBy) {
                                        'SE' => 'Secretary',
                                        'PR' => 'President',
                                        default => $processedBy,
                                    };
                                    $isApplicantResubmission = $row->appl_status == 'RE' && $processedBy === 'AP';
                                @endphp

                                @if ($isApplicantResubmission)
                                    <p>Resubmitted by Applicant</p>
                                @elseif ($row->appl_status == 'RE')
                                    <p>Returned by {{ $roleLabel }}</p>
                                @elseif ($row->appl_status == 'A')
                                    <p>Approved by {{ $roleLabel }}</p>
                                @elseif ($row->appl_status == 'RJ')
                                    <p class="text-danger">Rejected by {{ $roleLabel }}</p>
                                @else
                                    <p>Processed by {{ $roleLabel }}</p>
                                @endif

                                @if (!$isApplicantResubmission)
                                    <p class="t-meta-time">
                                        @if ($row->appl_status == 'RJ')
                                            Reason: {{ $row->reject_reason }}
                                        @else
                                            @if (!$row->name)
                                                @if (in_array($processedBy, ['SE', 'PR'], true) && strtoupper((string) ($row->appl_status ?? '')) === 'QU')
                                                    <span class="fw-semibold">Application returned to Applicant</span><br>
                                                @endif
                                            @else
                                                Forwarded to {{ $row->name }} <br>
                                                Remarks: {{ $row->remarks }}
                                            @endif
                                        @endif
                                    </p>
                                @endif

                                @if ($processedBy !== 'Accountant' && !$isApplicantResubmission)
                                    @if ($row->query_status == 'P')
                                        <p class="t-meta-return">
                                            Note: Query raised by {{ $roleLabel }}
                                            @php
                                                $queries = $row->queries;
                                                if (is_string($queries)) {
                                                    $queries = json_decode($queries, true);
                                                }
                                            @endphp
                                            @if (!empty($queries) && is_array($queries))
                                                ({{ implode(', ', $queries) }})
                                            @endif
                                        </p>
                                        <p class="t-meta-return">
                                            @if (!empty($row->remarks))
                                                Remarks: {{ $row->remarks }}
                                            @endif
                                        </p>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <div class="item-timeline">
                        <p class="t-time">{{ format_date_other($user_entry->created_at) }}</p>
                        <div class="t-dot t-dot-warning"></div>
                        <div class="t-text">
                            <p>Received from Applicant</p>
                            <p class="t-meta-time">Form: {{ $user_entry->form_name }}, License: {{ $user_entry->license_name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

