<div class="modal fade" id="show_additional_pricing_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px" style="max-width:750px !important">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5"
                                    transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                    x="0" y="7" width="16" height="2" rx="1" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--end:Form-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h3>Additional Pricing</h3>
                    <!--end::Title-asd -->
                </div>
                    <table class="table drawing_infoTable" style="border-collapse: collapse;background: none;">
                        <thead>
                            <tr style="padding-left: 10px;">
                                <th>No</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="extraPricingTable">
                            {{-- <input type="hidden" name="temporary_work_id" id="temp_id" value="">
                            @php
                                $i = 1;
                            @endphp
                            @if ($extraPricing !== null)
                                @foreach ($extraPricing as $pricing)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>£{{ $pricing->price }}</td>
                                        <td style="text-wrap: wrap;">{{ $pricing->description }}</td>
                                        @if($pricing->client_comment !== null)
                                        <td style="text-wrap: wrap;">
                                            {{$pricing->client_comment}}
                                        </td>
                                        @else
                                        <td>
                                            <textarea name="client_comment" id="clientPricingComment" cols="20" rows="5" placeholder="Please enter your reason why you will approve or reject this pricing" required></textarea>
                                        </td>
                                        @endif
                                        
                                        @if($pricing->status == '2')
                                        <td class="d-flex justify-content-center"><p class="green" style="color: white; border-radius: 10%; width: 75%; margin-bottom: 0px;">Approved</p></td>
                                        @elseif($pricing->status == '1')
                                        <td class="d-flex justify-content-center"><p class="red" style="color: white; border-radius: 10%; width: 75%; margin-bottom: 0px;">Rejected</p></td>
                                        @else
                                        <td>
                                            <select class="form-control" name="pricing_status" id="changeStatusValue" data="{{$pricing->id}}">
                                                <option value="">Update Status</option>
                                                <option value="approve">Approve Pricing</option>
                                                <option value="reject">Reject Pricing</option>
                                            </select>
                                        </td>
                                        @endif
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            @endif --}}

                        </tbody>
                    </table>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>