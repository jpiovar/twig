var app = angular.module("mainModule", []);

app.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});

app.controller("MainCtrl", ['$scope','$http','$location', function($scope,$http,$location) {
	
    $scope.message = "angular ctrl loaded";
	
	
	$scope.processInput = function(name){ debugger;
		var formData = {
			'id': "",
			'name': $scope.name || name,
			'surname': $scope.surname,
			'info': $scope.info
		}
		
		$scope.postMethod(formData);
		
	}
	
	$scope.postMethod = function(formData1){debugger;
		
		$http.post("dblib_exec/showAll.php",JSON.stringify(formData1))
			.success(function(data, status){debugger;
				$scope.codeStatus = status;
				$scope.dataPost = data;
			})
			.error(function (data, status){debugger;
				$scope.codeStatus = status.status || 'chyba';
			});
		
	}
	
	
	
}]);


app.controller("Temp1Ctrl", ['$scope','$http','$location', function($scope,$http,$location) {
	

	_this = this;
	
    _this.message = "angular ctrl loaded";
	
	
	_this.processInputTemp1 = function(name){ debugger;
		var formData = {
			'id': "",
			'name': _this.name || name,
			'surname': _this.surname,
			'info': _this.info
		}
		
		_this.postMethod(formData);
		
	}
	
	_this.postMethod = function(formData1){debugger;
		
		$http.post("dblib_exec/showAll.php",JSON.stringify(formData1))
			.success(function(data, status){debugger;
				_this.codeStatus1 = status;
				_this.dataPost1 = data;
			})
			.error(function (data, status){debugger;
				_this.codeStatus1 = status.status || 'chyba';
			});
		
	}
	
	
	
}]);





