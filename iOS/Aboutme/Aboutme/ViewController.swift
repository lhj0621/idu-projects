//
//  ViewController.swift
//  Aboutme
//
//  Created by Lee Hyun Jun on 29/11/2018.
//  Copyright © 2018 Lee Hyun Jun. All rights reserved.
//

import UIKit

class ViewController: UIViewController {

    override func viewDidLoad() {
        super.viewDidLoad()

        // Do any additional setup after loading the view.
    }
    
    @IBAction func btnMoveUserView(_ sender: UIButton) {
        tabBarController?.selectedIndex=1
    }
    @IBAction func btnMovePortfolioView(_ sender: UIButton) {
        tabBarController?.selectedIndex=2
    }
    @IBAction func btnMoveRestaurantView(_ sender: UIButton) {
        tabBarController?.selectedIndex=3
    }
    @IBAction func btnMoveBlogView(_ sender: UIButton) {
        tabBarController?.selectedIndex=4
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
