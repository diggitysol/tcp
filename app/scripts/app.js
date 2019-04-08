
// create our angular app and inject ngAnimate and ui-router 
// =============================================================================
angular.module('formApp', ['ngAnimate', 'ui.router','ngStorage'])

// configuring our routes 
// =============================================================================
.config(function($stateProvider, $urlRouterProvider) {
   $stateProvider
    
      // route to show our basic form (/form)
	  .state('form', {
			url: '/form',
			templateUrl: 'app/template/steplayout.html',
			controller: 'formController'
		})
	  
	  .state('form.section0', {
			url: '/section0',
			templateUrl: 'app/template/section-0.html'
		})
	  
	  .state('form.section1', {
			url: '/section1',
			templateUrl: 'app/template/section-1.html'
		})
	  
	  .state('form.section2', {
			url: '/section2',
			templateUrl: 'app/template/section-2.html'
		})
		
		.state('form.section3', {
			url: '/section3',
			templateUrl: 'app/template/section-3.html',
			
		})
		
		.state('form.section4', {
			url: '/section4',
			templateUrl: 'app/template/section-4.html'
		})
		
		.state('form.section5', {
			url: '/section5',
			templateUrl: 'app/template/section-5.html'
		})
		
		.state('form.section6', {
			url: '/section6',
			templateUrl: 'app/template/section-6.html'
		})
		
		.state('form.section7', {
			url: '/section7',
			templateUrl: 'app/template/section-7.html'
		})
		
		.state('form.preview', {
			url: '/preview',
			templateUrl: 'app/template/preview.html',
			controller: 'previewController'
		})
   // catch all route
   // send users to the form page 
   $urlRouterProvider.otherwise('/form/section0');
})

// our controller for the form
// =============================================================================
.controller('formController', function($scope,$rootScope, $state,$localStorage) {
   //$localStorage.$reset();
   // we will store all of our form data in this object
	$scope.formData={};
   
	//$scope.formData.section0.client_name="add";

	$scope.formData = $localStorage.formData || {};
	if($scope.formData.section2==undefined){
		$scope.formData.section2={'25':{client1:{},client2:{}}};
	}
	if($scope.formData.section3==undefined){
		$scope.formData.section3={'31':{client1:{},client2:{}},'34':{client1:{},client2:{}}};
	}
	
	if($scope.formData.section5==undefined){
		$scope.formData.section5={'51':{client1:{},client2:{}}};
	}
	if($scope.formData.section6==undefined){
		$scope.formData.section6={'61':
		{
			lifestyle:
			{
				home:{},
				home_content:{},
				holiday_home:{},
				motor_vechicle_1:{},
				motor_vechicle_2:{},
				boat:{},
				cash:{},
				other:{},
			},
			financial:
			{
				term_deposit:{},
				managed_funds:{},
				direct_shares:{},
				investiment_property_1:{},
				investiment_property_2:{},
				other1:{},
				other2:{},
			},
			liabilites:
			{
				home_loan:{},
				motor_vechicle:{},
				boat:{},
				credit_card:{},
				personal_loan:{},
				investment_loan:{},
				margin_loan:{},
				other:{},
			},
		}
		};
	}
	
	
	$scope.save=function(){
		
		$localStorage.formData = $scope.formData;
		
	}
	
	$scope.copyAddresses = function() {
        //console.log($scope.formData.section2[21].client1.postal_address);
		  if ($scope.formData.section2[21].client1.postal_address) {
            $scope.formData.section2[21].client1.postal = angular.copy($scope.formData.section2[21].client1.residential);
        }
		  else {
			$scope.formData.section2[21].client1.postal = {};
		 }
   }

   $scope.$watch('formData.section2[21].client1.residential', function(newValue) {
        if (newValue) {
            $scope.copyAddresses();
        }
   }, true);
	
	
	$scope.lifestyles = [
								{name:'Home',model:'home'},
								{name:'Home Contents',model:'home_content'},
								{name:'Holiday home',model:'holiday_home'},
								{name:'Motor vechile 1',model:'motor_vechicle_1'},
								{name:'Motor vechile 2',model:'motor_vechicle_2'},
								{name:'Boat/Caravan',model:'boat'},
								{name:'Cash(bank account)',model:'cash'},
								{name:'Other',model:'other'},
								
							];
	/*angular.forEach($scope.lifestyles,function(value,index){
      console.log($scope.formData.section6);
		model=value.model;
		if($scope.formData.section6==undefined){
			$scope.formData.section6={'61':{lifestyle:{model:{}}}};
		}		
	})*/
	console.log($scope.formData);
	$scope.financials = [
								{name:'Term deposite',model:'term_deposite'},
								{name:'Managed funds',model:'managed_funds'},
								{name:'Direct shares',model:'direct_shares'},
								{name:'Investment property 1',model:'investment_property_1'},
								{name:'Investment property 1',model:'investment_property_2'},
								{name:'Other',model:'other1'},
								{name:'Other',model:'other2'},
								
							];
	$scope.liabilites = [
								{name:'Home loan',model:'home_loan'},
								{name:'Motor vehicle(s)',model:'motor_vechicle'},
								{name:'Boat/Caravan',model:'boat'},
								{name:'Credit card(s)',model:'credit_card'},
								{name:'Personal loan',model:'personal_loan'},
								{name:'Investment loan(s)',model:'investment_loan'},
								{name:'Margin loan',model:'margin_loan'},
								{name:'Other',model:'other'},
							];
	$scope.concessionals  = [
								{name:'7.3 Concessional Superannuation Contributions',model:'73'},
								{name:'7.4 Non-Concessional Superannuation Contributions',model:'74'},
							];
	//calculation
	
	/*$scope.calc1=function() {
		//$scope.formData.section3[31].client1={};
		console.log($scope.formData);
		$scope.formData.section3[31].client1.centerlink_dva=$scope.formData.section2[25].client1.centerlink_dva;
		//$scope.formData.section3[31].client2.centerlink_dva=$scope.formData.section2[25].client2.centerlink_dva;
	}*/
	
	$scope.calc1=function() {
		//console.log("ok");
		$scope.formData.section3[31].client1.centerlink_dva=$scope.formData.section2[25].client1.centerlink_dva;
		$scope.formData.section3[31].client2.centerlink_dva=$scope.formData.section2[25].client2.centerlink_dva;
		$scope.formData.section3[31].client1.family_assistance=$scope.formData.section2[25].client1.family_assistance;
		$scope.formData.section3[31].client2.family_assistance=$scope.formData.section2[25].client2.family_assistance;
	}
	
	$scope.calculateclient1Total = function() {
		gross_salary = parseFloat($scope.formData.section3[31].client1.gross_salary) || 0;
		bonuses=parseFloat($scope.formData.section3[31].client1.bonuses) || 0;
		motor_cycle=parseFloat($scope.formData.section3[31].client1.motor_cycle) || 0;
		superannuation=parseFloat($scope.formData.section3[31].client1.superannuation) || 0;
		centerlink_dva=parseFloat($scope.formData.section3[31].client1.centerlink_dva) || 0;
		family_assistance=parseFloat($scope.formData.section3[31].client1.family_assistance) || 0;
		redundancy_amount=parseFloat($scope.formData.section3[31].client1.redundancy_amount) || 0;
		service_payment=parseFloat($scope.formData.section3[31].client1.service_payment) || 0;
		$scope.formData.section3[31].client1.subtotal =  gross_salary + bonuses + motor_cycle + superannuation + centerlink_dva + family_assistance + redundancy_amount + service_payment;
		$scope.formData.section3[34].client1.income = $scope.formData.section3[31].client1.subtotal ;
		$scope.client1totalincome();
	}
	
	$scope.calculateclient2Total = function() {
		gross_salary = parseFloat($scope.formData.section3[31].client2.gross_salary) || 0;
		bonuses=parseFloat($scope.formData.section3[31].client2.bonuses) || 0;
		motor_cycle=parseFloat($scope.formData.section3[31].client2.motor_cycle) || 0;
		superannuation=parseFloat($scope.formData.section3[31].client2.superannuation) || 0;
		centerlink_dva=parseFloat($scope.formData.section3[31].client2.centerlink_dva) || 0;
		family_assistance=parseFloat($scope.formData.section3[31].client2.family_assistance) || 0;
		redundancy_amount=parseFloat($scope.formData.section3[31].client2.redundancy_amount) || 0;
		service_payment=parseFloat($scope.formData.section3[31].client2.service_payment) || 0;
		$scope.formData.section3[31].client2.subtotal =  gross_salary + bonuses + motor_cycle + superannuation + centerlink_dva + family_assistance + redundancy_amount + service_payment;
		$scope.formData.section3[34].client2.income = $scope.formData.section3[31].client2.subtotal;
		$scope.client2totalincome();
	}
	
	$scope.investmentclient1Total = function() {
		cash = parseFloat($scope.formData.section3[32].client1.cash) || 0;
		term_deposit=parseFloat($scope.formData.section3[32].client1.term_deposit) || 0;
		managed_funds=parseFloat($scope.formData.section3[32].client1.managed_funds) || 0;
		direct_shares=parseFloat($scope.formData.section3[32].client1.direct_shares) || 0;
		holiday=parseFloat($scope.formData.section3[32].client1.holiday) || 0;
		investiment_property_1=parseFloat($scope.formData.section3[32].client1.investiment_property_1) || 0;
		investiment_property_2=parseFloat($scope.formData.section3[32].client1.investiment_property_2) || 0;
		other_income=parseFloat($scope.formData.section3[32].client1.other_income) || 0;
		$scope.formData.section3[32].client1.subtotal =  cash + term_deposit + managed_funds + direct_shares + holiday + investiment_property_1 + investiment_property_2 + other_income;
		$scope.formData.section3[34].client1.investiment_income = $scope.formData.section3[32].client1.subtotal;
		$scope.client1totalincome();
	}
	
	
	$scope.investmentclient2Total = function() {
		cash = parseFloat($scope.formData.section3[32].client2.cash) || 0;
		term_deposit=parseFloat($scope.formData.section3[32].client2.term_deposit) || 0;
		managed_funds=parseFloat($scope.formData.section3[32].client2.managed_funds) || 0;
		direct_shares=parseFloat($scope.formData.section3[32].client2.direct_shares) || 0;
		holiday=parseFloat($scope.formData.section3[32].client2.holiday) || 0;
		investiment_property_1=parseFloat($scope.formData.section3[32].client2.investiment_property_1) || 0;
		investiment_property_2=parseFloat($scope.formData.section3[32].client2.investiment_property_2) || 0;
		other_income=parseFloat($scope.formData.section3[32].client2.other_income) || 0;
		$scope.formData.section3[32].client2.subtotal =  cash + term_deposit + managed_funds + direct_shares + holiday + investiment_property_1 + investiment_property_2 + other_income;
		$scope.formData.section3[34].client2.investiment_income = $scope.formData.section3[32].client2.subtotal;
		$scope.client2totalincome();
	}
	
	$scope.pensionclient1total = function() {
		pension_income = parseFloat($scope.formData.section3[33].client1.pension_income) || 0;
		foreign_pension = parseFloat($scope.formData.section3[33].client1.foreign_pension) || 0;
		other = parseFloat($scope.formData.section3[33].client1.other) || 0;
		$scope.formData.section3[33].client1.subtotal =  pension_income + foreign_pension + other ;
		$scope.formData.section3[34].client1.pension_income = $scope.formData.section3[33].client1.subtotal;
		$scope.client1totalincome();
	}
	
	$scope.pensionclient2total = function() {
		pension_income = parseFloat($scope.formData.section3[33].client2.pension_income) || 0;
		foreign_pension = parseFloat($scope.formData.section3[33].client2.foreign_pension) || 0;
		other = parseFloat($scope.formData.section3[33].client2.other) || 0;
		$scope.formData.section3[33].client2.subtotal =  pension_income + foreign_pension + other ;
		$scope.formData.section3[34].client2.pension_income = $scope.formData.section3[33].client2.subtotal;
		$scope.client2totalincome();
	}
	
	$scope.client1totalincome = function() {
		income = parseFloat($scope.formData.section3[34].client1.income) || 0;
		investiment_income = parseFloat($scope.formData.section3[34].client1.investiment_income) || 0;
		pension_income = parseFloat($scope.formData.section3[34].client1.pension_income) || 0;
		$scope.formData.section3[34].client1.total =  income + investiment_income + pension_income ;
		//$scope.formData.section3[34].client2.pension_income = $scope.formData.section3[33].client2.subtotal;
	
	}
	
	$scope.client2totalincome = function() {
		income = parseFloat($scope.formData.section3[34].client2.income) || 0;
		investiment_income = parseFloat($scope.formData.section3[34].client2.investiment_income) || 0;
		pension_income = parseFloat($scope.formData.section3[34].client2.pension_income) || 0;
		$scope.formData.section3[34].client2.total =  income + investiment_income + pension_income ;
		//$scope.formData.section3[34].client2.pension_income = $scope.formData.section3[33].client2.subtotal;
	
	}
	
	$scope.calc2=function() {
		$scope.formData.section5[51].client1.total_gross=$scope.formData.section3[34].client1.total;
		$scope.formData.section5[51].client2.total_gross=$scope.formData.section3[34].client2.total;
		$scope.formData.section5[51].client1.total_annual_expenses=$scope.formData.section4[41].total;
		//$scope.formData.section5[51].client2.total_annual_expenses=$scope.formData.section4[41].total;
	}
	
	$scope.expensesummerytotal=function(){
		home_loan = parseFloat($scope.formData.section4[41].home_loan) || 0;
		credit_card_1 = parseFloat($scope.formData.section4[41].credit_card_1) || 0;
		credit_card_2 = parseFloat($scope.formData.section4[41].credit_card_2) || 0;
		personal_loan = parseFloat($scope.formData.section4[41].personal_loan) || 0;
		investiment_loan_1 = parseFloat($scope.formData.section4[41].investiment_loan_1) || 0;
		investiment_loan_2 = parseFloat($scope.formData.section4[41].investiment_loan_2) || 0;
		margin_loan = parseFloat($scope.formData.section4[41].margin_loan) || 0;
		living_expenses = parseFloat($scope.formData.section4[41].living_expenses) || 0;
		$scope.formData.section4[41].total =  home_loan + credit_card_1 + credit_card_2 + personal_loan + investiment_loan_1 + investiment_loan_2 + margin_loan + living_expenses;
	}
	
	
	$scope.assetstotal=function(){
		home = parseFloat($scope.formData.section6[61].lifestyle.home.current_value) || 0;
		home_content = parseFloat($scope.formData.section6[61].lifestyle.home_content.current_value) || 0;
		holiday_home = parseFloat($scope.formData.section6[61].lifestyle.holiday_home.current_value) || 0;
		motor_vechicle_1 = parseFloat($scope.formData.section6[61].lifestyle.motor_vechicle_1.current_value) || 0;
		motor_vechicle_2 = parseFloat($scope.formData.section6[61].lifestyle.motor_vechicle_2.current_value) || 0;
		boat = parseFloat($scope.formData.section6[61].lifestyle.boat.current_value) || 0;
		cash = parseFloat($scope.formData.section6[61].lifestyle.cash.current_value) || 0;
		other = parseFloat($scope.formData.section6[61].lifestyle.other.current_value) || 0;
		term_deposit = parseFloat($scope.formData.section6[61].financial.term_deposit.current_value) || 0;
		managed_funds = parseFloat($scope.formData.section6[61].financial.managed_funds.current_value) || 0;
		direct_shares = parseFloat($scope.formData.section6[61].financial.direct_shares.current_value) || 0;
		investiment_property_1 = parseFloat($scope.formData.section6[61].financial.investiment_property_1.current_value) || 0;
		investiment_property_2 = parseFloat($scope.formData.section6[61].financial.investiment_property_2.current_value) || 0;
		other1 = parseFloat($scope.formData.section6[61].financial.other1.current_value) || 0;
		other2 = parseFloat($scope.formData.section6[61].financial.other2.current_value) || 0;
		
		$scope.formData.section6[61].total_assets =  
		home + 
		home_content + 
		holiday_home + 
		motor_vechicle_1 + 
		motor_vechicle_2 + 
		boat + 
		cash + 
		other +
		term_deposit + managed_funds + direct_shares + investiment_property_1 +
		investiment_property_2 + other1 + other2;
		$scope.networth();
		
		/*var ltotal=0;
		console.log("ok");
		angular.forEach($scope.lifestyles,function(value,index){
         console.log(value.model);
			//model=value.model;
			console.log($scope.formData.section6[61].lifestyle['home'].current_value);
			ltotal += parseFloat($scope.formData.section6[61].lifestyle['home'].current_value) || 0;
      })
		angular.forEach($scope.financials,function(value,index){
         //ltotal += parseFloat($scope.formData.section6[61].lifestyle[value.model].current_value) || 0;
      })
		//$scope.formData.section6[61].total_assets=ltotal;*/
	}
	
	$scope.liabilitestotal=function(){
		home_loan = parseFloat($scope.formData.section6[61].liabilites.home_loan.balance) || 0;
		motor_vechicle = parseFloat($scope.formData.section6[61].liabilites.motor_vechicle.balance) || 0;
		boat = parseFloat($scope.formData.section6[61].liabilites.boat.balance) || 0;
		credit_card = parseFloat($scope.formData.section6[61].liabilites.credit_card.balance) || 0;
		personal_loan = parseFloat($scope.formData.section6[61].liabilites.personal_loan.balance) || 0;
		investment_loan = parseFloat($scope.formData.section6[61].liabilites.investment_loan.balance) || 0;
		margin_loan = parseFloat($scope.formData.section6[61].liabilites.margin_loan.balance) || 0;
		other = parseFloat($scope.formData.section6[61].liabilites.other.balance) || 0;
		$scope.formData.section6[61].total_liabilitess = home_loan + motor_vechicle + boat + 
		credit_card + personal_loan + investment_loan + margin_loan + other;
		$scope.networth();
	}
	
	$scope.networth=function(){
		$scope.formData.section6[61].net_worth=parseFloat($scope.formData.section6[61].total_assets)-parseFloat($scope.formData.section6[61].total_liabilitess);
	}
	
	

	// function to process the form
   $scope.processForm = function() {
     console.log($scope.formData);
   };
	
    
})

.controller('previewController', function($scope,$localStorage) {
	$scope.nobutton = true;
	
});

