//
//  userViewController.swift
//  Aboutme
//
//  Created by Lee Hyun Jun on 04/12/2018.
//  Copyright © 2018 Lee Hyun Jun. All rights reserved.
//

import UIKit

class userViewController: UIViewController {

    override func viewDidLoad() {
        super.viewDidLoad()

        // Do any additional setup after loading the view.
    }
    
    @IBAction func btnNaver(_ sender: UIButton) {
    tabBarController?.selectedIndex=4
    }
    @IBAction func btnFacebook(_ sender: UIButton) {
        tabBarController?.selectedIndex=4
    }
    @IBAction func btnInstagram(_ sender: UIButton) {
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
