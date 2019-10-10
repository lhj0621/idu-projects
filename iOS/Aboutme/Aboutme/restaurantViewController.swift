//
//  restaurantViewController.swift
//  Aboutme
//
//  Created by Lee Hyun Jun on 30/11/2018.
//  Copyright © 2018 Lee Hyun Jun. All rights reserved.
//

import UIKit
import MapKit
class restaurantViewController: UIViewController, CLLocationManagerDelegate , UIPickerViewDelegate, UIPickerViewDataSource{
    
    let MAX_ARRAY_NUM = 6
    let PICKER_VIEW_COLUMN = 1
    let PICKER_VIEW_HEIGHT:CGFloat = 80
    var restaurantName = [ "현재 위치","지로우 라멘", "부탄츄 신촌점", "기꾸스시 신촌점", "고메당", "공복 신촌점"]
    var data = 0;
    func numberOfComponents(in pickerView: UIPickerView) -> Int {
        return PICKER_VIEW_COLUMN
    }
    
    func pickerView(_ pickerView: UIPickerView, numberOfRowsInComponent component: Int) -> Int {
        return restaurantName.count
    }
    func pickerView(_ pickerView: UIPickerView, didSelectRow row: Int, inComponent component: Int){
         data = restaurantName.index(after: row)
        if(data == 1){
            locationManager.startUpdatingLocation()
        }
        else if(data == 2){
            setAnnotation(latitudeValue: 37.553669, longitudeValue: 126.925135, delta: 0.01, title: restaurantName[data-1], subtitle: "서울특별시 마포구 서교동 343-13")
        }
        else if(data == 3){
            setAnnotation(latitudeValue: 37.556664, longitudeValue: 126.935106, delta: 0.01, title: restaurantName[data-1], subtitle: "서울특별시 서대문구 창천동 62-10")
        }
        else if(data == 4){
            setAnnotation(latitudeValue: 37.556797, longitudeValue: 126.933534, delta: 0.01, title: restaurantName[data-1], subtitle: "서울특별시 서대문구 창천동 연세로5다길 35")
        }
        else if(data == 5){
            setAnnotation(latitudeValue: 37.634369, longitudeValue: 127.033523, delta: 0.01, title: restaurantName[data-1], subtitle: "서울특별시 강북구 번동 229-8번지 대명빌딩")
        }
        else if(data == 6){
            setAnnotation(latitudeValue: 37.559041, longitudeValue: 126.938301, delta: 0.01, title: restaurantName[data-1], subtitle: "서울특별시 서대문구 창천동 2-2")
        }
    }
    func pickerView(_ pickerView: UIPickerView, titleForRow row: Int, forComponent component: Int) -> String? {
        return restaurantName[row]
    }

    @IBOutlet weak var myMap: MKMapView!
    @IBOutlet var pickerMap: UIPickerView!
    
    
    let locationManager = CLLocationManager()
    override func viewDidLoad() {
        super.viewDidLoad()
        locationManager.delegate = self
        locationManager.desiredAccuracy = kCLLocationAccuracyBest
        locationManager.requestWhenInUseAuthorization()
        locationManager.startUpdatingLocation()
        myMap.showsUserLocation = true
        
        // Do any additional setup after loading the view.
    }
    func goLocation(latitudeValue: CLLocationDegrees, longitudeValue : CLLocationDegrees, delta span :Double) -> CLLocationCoordinate2D  {
        let pLocation = CLLocationCoordinate2DMake(latitudeValue, longitudeValue)
        let spanValue = MKCoordinateSpan(latitudeDelta: span, longitudeDelta: span)
        let pRegion = MKCoordinateRegion(center: pLocation, span: spanValue)
        myMap.setRegion(pRegion, animated: true)
        return pLocation
    }
    
    func setAnnotation(latitudeValue: CLLocationDegrees, longitudeValue : CLLocationDegrees, delta span :Double, title strTitle: String, subtitle strSubtitle:String) {
        let annotation = MKPointAnnotation()
        annotation.coordinate = goLocation(latitudeValue: latitudeValue, longitudeValue: longitudeValue, delta: span)
        annotation.title = strTitle
        annotation.subtitle = strSubtitle
        myMap.addAnnotation(annotation)
    }
    
    func locationManager(_ manager: CLLocationManager, didUpdateLocations locations: [CLLocation]) {
        let pLocation = locations.last
        _ = goLocation(latitudeValue: (pLocation?.coordinate.latitude)!, longitudeValue: (pLocation?.coordinate.longitude)!, delta: 0.01)
        CLGeocoder().reverseGeocodeLocation(pLocation!, completionHandler: {
            (placemarks, error) -> Void in
            let pm = placemarks!.first
            let country = pm!.country
            var address:String = country!
            if pm!.locality != nil {
                address += " "
                address += pm!.locality!
            }
            if pm!.thoroughfare != nil {
                address += " "
                address += pm!.thoroughfare!
            }
        })
        locationManager.stopUpdatingLocation()
    }
    
    
    
    
    /*
    // MARK: - Navigation

    // In a storyboard-based application, you will often want to do a little preparation before navigation
    override func prepare(for segue: UIStoryboardSegue, sender: Any?) {
        // Get the new view controller using segue.destination.
        // Pass the selected object to the new view controller.
    }
    */

}
