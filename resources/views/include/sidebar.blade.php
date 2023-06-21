<!--logo Start-->
<div id="logo">
    <span class="big-logo">
        <img src="{{ asset('admin/images/big-logo.png') }}" alt=""/> 
    </span>
    <span class="small-logo"><img src="{{ asset('admin/images/small-logo.png') }}" alt=""/></span>
</div>
<!--logo End-->
<div id="left-menu">
    @if($sidebar =='self-analyze-sidebar')
        <ul>
            <li class="active">
                <a href="self-analyze">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <span>Self Analyze</span>
                </a>
            </li>
        </ul>
        @if(isset($self_analyze_user_session))
            @php
                $json = json_decode($self_analyze_user_session->filter_data, true);
            @endphp
        @endif
        <div class="analysis">
            <div class="analysis-section">
                <h4>Product</h4>
                <div class="custom-select">
                 <select name="product" id="product">
                    <option value="Product 1" {{ isset($self_analyze_user_session) ? $json['product'] == 'Product 1' ? 'selected' : '' : '' }}>Product 1</option>
                    <option value="Product 2" {{ isset($self_analyze_user_session) ? $json['product'] == 'Product 2' ? 'selected' : '' : '' }}>Product 2</option>
                    <option value="Product 3" {{ isset($self_analyze_user_session) ? $json['product'] == 'Product 3' ? 'selected' : '' : '' }}>Product 3</option>
                  </select>   
                </div>
            </div>
            <div class="analysis-section">
                <h4><label for="startDate">From Date</label></h4>
                <div class="mb-3">
                    <input id="start_date" name="start_date" type="text" value="{{ isset($self_analyze_user_session) ? $json['start_date'] : '' }}" class="form-control" />
                </div>
                
            </div>
            <div class="analysis-section">
                <h4><label for="endDate">To Date</label></h4>
                <div class="mb-3">
                    <input id="end_date" name="end_date" type="text" value="{{ isset($self_analyze_user_session) ? $json['end_date'] : '' }}" class="form-control" />
                </div>
            </div>
            <div class="analysis-section">
                <h4>Demographic</h4>
                <div class="custom-select">
                    <select name="demographic" id="demographic">
                        <option value="Total TRx" {{ isset($self_analyze_user_session) ? $json['demographic'] == 'Total TRx' ? 'selected' : '' : '' }}>Total TRx</option>
                        <option value="Total NBRx" {{ isset($self_analyze_user_session) ? $json['demographic'] == 'Total NBRx' ? 'selected' : '' : '' }}>Total NBRx</option>
                        <option value="Product Sales" {{ isset($self_analyze_user_session) ? $json['demographic'] == 'Product Sales' ? 'selected' : '' : '' }}>Product Sales</option>
                    </select>  
                </div>
            </div>
            <div class="analysis-section">
                <h4>KPI - Primary</h4>
                <div class="custom-select">
                    <select name="kpi" id="kpi">
                        <option value="Daily" {{ isset($self_analyze_user_session) ? $json['kpi'] == 'Daily' ? 'selected' : '' : '' }}>Daily</option>
                        <option value="Weekly" {{ isset($self_analyze_user_session) ? $json['kpi'] == 'Weekly' ? 'selected' : '' : '' }}>Weekly</option>
                        <option value="Monthly" {{ isset($self_analyze_user_session) ? $json['kpi'] == 'Monthly' ? 'selected' : '' : '' }}>Monthly</option>
                        <option value="Quarterly" {{ isset($self_analyze_user_session) ? $json['kpi'] == 'Quarterly' ? 'selected' : '' : '' }}>Quarterly</option>
                        <option value="Semi Annually" {{ isset($self_analyze_user_session) ? $json['kpi'] == 'Semi Annually' ? 'selected' : '' : '' }}>Semi Annually</option>
                        <option value="Annually" {{ isset($self_analyze_user_session) ? $json['kpi'] == 'Annually' ? 'selected' : '' : '' }}>Annually</option>
                    </select>  
                </div>
            </div>
            <div class="analysis-section">
                <h4>Region</h4>
                <div class="custom-select">
                    <select name="region" id="region">
                        <option value="Midwest" {{ isset($self_analyze_user_session) ? $json['region'] == 'Midwest' ? 'selected' : '' : '' }}>Midwest</option>
                        <option value="Northeast" {{ isset($self_analyze_user_session) ? $json['region'] == 'Northeast' ? 'selected' : '' : '' }}>Northeast</option>
                        <option value="South Central" {{ isset($self_analyze_user_session) ? $json['region'] == 'South Central' ? 'selected' : '' : '' }}>South Central</option>
                        <option value="South East" {{ isset($self_analyze_user_session) ? $json['region'] == 'South East' ? 'selected' : '' : '' }}>South East</option>
                        <option value="West" {{ isset($self_analyze_user_session) ? $json['region'] == 'West' ? 'selected' : '' : '' }}>West</option>
                    </select>  
                </div>
            </div>
            
            <div class="analysis-section">
                <h4>Prescriber specialty</h4>
                <div class="custom-select">
                    <select name="prescriber_specialty" id="prescriber_specialty">
                        <option value="Commercial" {{ isset($self_analyze_user_session) ? $json['prescriber_specialty'] == 'West' ? 'selected' : '' : '' }}>Commercial</option>
                        <option value="Medicare" {{ isset($self_analyze_user_session) ? $json['prescriber_specialty'] == 'Medicare' ? 'selected' : '' : '' }}>Medicare</option>
                        <option value="Cash" {{ isset($self_analyze_user_session) ? $json['prescriber_specialty'] == 'Cash' ? 'selected' : '' : '' }}>Cash</option>
                        <option value="Medicaid" {{ isset($self_analyze_user_session) ? $json['prescriber_specialty'] == 'Medicaid' ? 'selected' : '' : '' }}>Medicaid</option>
                        <option value="LTC" {{ isset($self_analyze_user_session) ? $json['prescriber_specialty'] == 'LTC' ? 'selected' : '' : '' }}>LTC</option>
                        <option value="Health Exchange" {{ isset($self_analyze_user_session) ? $json['prescriber_specialty'] == 'Health Exchange' ? 'selected' : '' : '' }}>Health Exchange</option>
                    </select>  
                </div>
                <div class="save-button pt-3 d-flex justify-content-start"><a href="#"><span>Analyze</span></a></div>
            </div>
        </div> 
    @else
    <ul>
            <li class="active">
                <a href="dashboard">
                <i class="fa fa-home stroke-icon" aria-hidden="true"></i>
                    <span>Home</span>
                    <span class="indication">5</span>
                </a>
            </li>
            <li><a href="my-sessions">
                <i class="fa fa-tablet stroke-icon" aria-hidden="true"></i>
                <span>My Sessions</span>
                <span class="indication">3</span>
            </a></li>
            <li><a href="self-analyze">
                <i class="fa fa-pie-chart stroke-icon" aria-hidden="true"></i>
                <span>Self Analyze</span>
            </a></li>
            <li><a href="#">
                <i class="fa fa-pie-chart stroke-icon" aria-hidden="true"></i>
                <span>Smart Analyze</span>
            </a></li>
            <li><a href="#">
                <i class="fa fa-upload stroke-icon"></i>
                <span>Upload Data</span>
            </a></li>
        </ul>
    @endif
</div>